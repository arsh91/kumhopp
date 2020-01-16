<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Mail;
use App\User;
use App\Voucher;
use App\VoucherOrder;
use App\VoucherOrderItem;
use App\PointHistory;
use App\Http\Requests\StoreVoucherOrderRequest;
use App\Mail\sendOrderConfirmation;
use Illuminate\Http\Request;

class DealerVoucherController extends Controller
{
	public function getAllVouchers(){
		//Session::put('cart', []);
		// Get the currently authenticated user's ID...
        $id = Auth::id();
        $dealerCurrentPoints = user::where('id',$id)->get()->toArray();

		$userPoints = $dealerCurrentPoints[0]['points'];
		$vouchers = Voucher::all();
        
        return view('front.dealerVouchers.index', compact('vouchers', 'userPoints'));

	}

	public function addVoucherToCart($voucherId, Request $request){
		
		$currentUser = Auth::id();
		$dealerCurrentPoints = user::where('id',$currentUser)->get()->toArray();
		$userPoints = $dealerCurrentPoints[0]['points'];

		//dump($request->item_quantity);

		$voucherQuantity = $request->item_quantity;		
		$voucherToBuy = [];
		//get the voucher detail which is added into cart by dealer
		$voucherDetail = Voucher::where('id',$voucherId)->get();

		$voucherToBuy['voucher_name'] = $voucherDetail[0]->voucher_name;
		$voucherToBuy['voucher_description'] = $voucherDetail[0]->voucher_description;
		$voucherToBuy['points'] = $voucherDetail[0]->points;
		$voucherToBuy['voucher_image'] = $voucherDetail[0]->voucher_image;		
		$voucherToBuy['voucherQuantity'] = $voucherQuantity;

		$voucherPrice = $voucherQuantity * $voucherDetail[0]->points;

		$cart = Session::get('cart');
		
		$cartPointCheck = $voucherPrice;
		if(isset($cart['totalCartValue'])){
			$cartPointCheck =  $voucherPrice + $cart['totalCartValue'];	
		}

		if($userPoints >= $cartPointCheck){		
			$cartPrice = 0;
			$cart['items'][$voucherId] = $voucherToBuy;
			
			foreach ($cart['items'] as $key => $cartValue) {
				$cartPrice += $cartValue['points'] * $cartValue['voucherQuantity'];
			}

			$cart['totalCartValue'] = $cartPrice;
			/*if(isset($cart['totalCartValue'])){
				$cart['totalCartValue'] =  $voucherPrice + $cart['totalCartValue'];	
			}else{
				$cart['totalCartValue'] = $voucherPrice;
			}*/
			
			Session::put('cart', $cart);
			return redirect()->route('checkout');

			//echo "dealer has extra points";
		}else if($userPoints < $cartPointCheck){
			return redirect()->back()->with('message', 'Your current balance does not meets the purchase limit!');
		}

	}

	public function voucherCheckout(Request $request){
		
		
		if ($request->session()->has('cart')) {
		    $cart = Session::get('cart');
		}else{
			return redirect()->back()->with('message', 'There is no voucher in your cart!');
		}

		//dd(Session::get('cart'));
		
		//return view('front.dealerVouchers.checkout', compact('voucherToBuy','userPoints','voucherQuantity','voucherPrice'));
		return view('front.dealerVouchers.checkout', compact('cart'));
		
	}

	/*After filling shipping address the order will placed
	* @shipping address
	*
	*/
	public function placeVoucherOrder(StoreVoucherOrderRequest $request){
		$shippingAddress = $request;
		$dealerID = Auth::id();
		$cartItems = Session::get('cart');

		//Array to send in email
		$emailData = [];
		$shippingArray = [];
		
		if ($request->session()->has('cart')) {
		    $cartItems = Session::get('cart');
		    $emailData['cartItems'] = $cartItems;
		    
		    $shippingArray = array('shipping_street'=>$request->shipping_street, 'shipping_city'=>$request->shipping_city, 'shipping_state'=>$request->shipping_state, 'shipping_country'=>$request->shipping_country, 'shipping_zipcode'=>$request->shipping_zipcode, 'shipping_phoneno'=>$request->shipping_phoneno);

		    $emailData['shipping'] = $shippingArray;

		    //CASE I: save the orders in voucher_orders
		    $order = VoucherOrder::create(['dealer_id'=>$dealerID, 'point_amount'=>$cartItems['totalCartValue'], 'shipping_street'=>$request->shipping_street, 'shipping_city'=>$request->shipping_city, 'shipping_state'=>$request->shipping_state, 'shipping_country'=>$request->shipping_country, 'shipping_zipcode'=>$request->shipping_zipcode, 'shipping_phoneno'=>$request->shipping_phoneno, 'status'=>'1']);

		    
		    //CASE II:- insert the value to order_items table with order ids.
		    if(!empty($order)){
		    	$orderId = $order->id;
		    	foreach ($cartItems['items'] as $key => $items) {
					$order = VoucherOrderItem::create(['order_id'=>$orderId, 'dealer_id'=>$dealerID, 'vocuher_id'=>$key, 'status'=>'1']);
				}	    	
		    	
		    }

		    //CASE III:- Update the points in the user table for dealer after purchasing
		    $dealerInfo = user::where('id',$dealerID)->get()->toArray();
			$dealerPoints = $dealerInfo[0]['points'];
			$dealerLeftPoints = $dealerPoints - $cartItems['totalCartValue'];

		    $updateUserPoints = User::where('id', $dealerID)->update(['points'=>$dealerLeftPoints]);

		    //fill the array for email for order confirmation
		    $emailData['dealerInfo'] = $dealerInfo[0];
		    
		    //CASE IV:-	Add an entry in the point history table
		    foreach ($cartItems['items'] as $key => $items) {
		    	$order = PointHistory::create(['dealer_id'=>$dealerID, 'amount'=>$cartItems['totalCartValue'], 'type'=>'1', 'created_by'=> $dealerID, 'voucher_id'=>$key]);
			}

			//CASE V:- Sent email to dealers 
			//STEP II:- Shoot an email to DEALER with password
            $dealerEmail = $dealerInfo[0]['email'];
            $dealerName = $dealerInfo[0]['first_name'];
            //dd($emailData);
            
            Mail::to($dealerEmail)->send(new sendOrderConfirmation($emailData));
		}
		Session::put('cart', []);
		return view('front.dealerVouchers.orderConfirmation');

	}
}
?>