<?php

namespace App\Http\Controllers;

//use App\Dealer;
use Auth;
use App\User;
use App\SalePerson;
use App\Dealer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSalesPersonRequest;
use App\Http\Requests\UpdateSalesPersonRequest;
use App\Mail\sendSalesPersonPassword;
use Mail;

class SalePersonController extends Controller
{
	
	public function __construct()
    {
       // $this->middleware('admin');
    }


    /**
     * Display a listing of Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $salesperson = User::with([
        //        'salespersons'])->where('role', '3')->get();
		//dd($salesperson);	

		$salesperson = SalePerson::with(['salesUsers','salesDealerUsers'])->get()->toArray();
		//dd($salesperson);		

        return view('salesperson.index', compact('salesperson'));
    }
	

	
	/**
     * Show the form for creating new sales person
     *
     * @return \Illuminate\Http\Response
     */
	public function create(){
		//$dealerList = Dealer::whereNotNull('company_name')->whereNotNull('account_no')->get();

		$dealerList = Dealer::select('*')->whereNotNull('company_name')->whereNotNull('account_no')->whereNotIn('id',function($query) {

		   $query->select('dealer_id')->from('sales_persons');

		})->get();
		
		
		return view('salesperson.create', compact('dealerList'));
	}
	
	/**
     * Store a newly created sales person in storage.
     *
     * @param  \App\Http\Requests\StoreSalesPersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesPersonRequest $request)
    {
		//dump($request->dealer_id);
		$last_inserted_sales_user_id = $last_SP_table_id = '';
		//made insertion to 'user table'
		$dealer_ids = $request->dealer_id;
		
		//password generation
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $SP_password = substr(str_shuffle($chars), 0, 8);
		
		
		$userTableData = array('first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'password' => $SP_password, 'phone' => '', 'points'=>0, 'role' => 3, 'status' => '1');
		//dump($userTableData);
		$createUserData = User::create($userTableData);

		$last_inserted_sales_user_id = $createUserData->id;
		
		/*STEP II :- insert data to sales_persons table with relation to account_no
		* Shoot an email to Sales person with password
		*/
		if($last_inserted_sales_user_id) {
			
			//STEP II:- Shoot an email to DEALER with password
			
			$emailContent = array('name'=>$request->first_name, 'password'=>$SP_password);
			
			Mail::to($request->email)->send(new sendSalesPersonPassword($emailContent));
			
			if(count($dealer_ids) > 0)
			{				
				foreach($dealer_ids as $dealer_id)
				{				
					$dealer_account_no = $this->getDealerAccountByID($dealer_id);
					$salesPersonTableData = array('user_id'=>$last_inserted_sales_user_id, 'dealer_id'=>$dealer_id, 'account_no'=>$dealer_account_no);
					$createSalesPersonData = SalePerson::create($salesPersonTableData);
					$last_SP_table_id = $createSalesPersonData->id;
					//dump('insrted the sales person with id ---> '.$last_SP_table_id);
				}
			}
		}
		//return redirect()->route('salesperson.index');
		return redirect()->route('allsalesperson');
		
		//then insert the enteries in the sales person table
	}
	

	
	/**
     * Show the form for editing sales person.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$alreadySeleDealer = array();
		$dealerList = Dealer::whereNotNull('company_name')->whereNotNull('account_no')->get();
		$salesPersonData = User::with(['salespersons'])->where('id', $id)->where('role', '3')->get();
		
		$dealerForSP = SalePerson::with(['salesUsers','salesDealerUsers'])->where('user_id', $id)->get()->toArray();
		$salesPersonData = $salesPersonData[0];
		//dump($dealerForSP);
		if(count($salesPersonData->salespersons) > 0){
			foreach($salesPersonData->salespersons as $SProw){				
				$alreadySeleDealer[] = $SProw->dealer_id;	
				
			}
		}
		$alreadySeleDealer = json_encode($alreadySeleDealer);
		
		//dump($salesPersonData);
		//dump($alreadySeleDealer);
		
		
		//dd($salesPersonData->salespersons);
		
        return view('salesperson.edit', compact('salesPersonData', 'dealerList', 'alreadySeleDealer'));
		
	}
	
	 public function update(UpdateSalesPersonRequest $request, $id)
    {
		$last_inserted_sales_user_id = $last_SP_table_id = '';
		//dd($request);
		$dealer_ids = $request['dealer_id'];
		
		
		//update user table for user with role_id = 3		
		$userDataToUpdate = array('first_name'=>$request['first_name'], 'last_name'=>$request['last_name']);		
		$userUpdate = User::where('id', $id)->update($userDataToUpdate);
				
		//if above update is successfull then below code runs
		if($userUpdate){			
			if(count($dealer_ids) > 0)
			{				
				//CASE I : delete the previous all dealers that are linked with this sales person
				$prevSalesPersonRec = SalePerson::where('user_id', $id);
				$deletePrevRec = $prevSalesPersonRec->forceDelete();

				foreach($dealer_ids as $dealer_id)
				{
					
					//CASE II: insert the new dealers in sales_persons table 				
					$dealer_account_no = $this->getDealerAccountByID($dealer_id);
					$salesPersonTableData = array('user_id'=>$id, 'dealer_id'=>$dealer_id, 'account_no'=>$dealer_account_no);
					$createSalesPersonData = SalePerson::create($salesPersonTableData);
					$last_SP_table_id = $createSalesPersonData->id;
					
					//dump('sales person created with id --->');
					//dump($last_SP_table_id);
				}
			}
		}
				
		
		return redirect()->route('allsalesperson');
		
		
		
		
        //$jobs = Job::findOrFail($id);
        //$jobs->update($request->all());

       // 
    }
	
	public function show($id)
    {
		dd('show method');
	}
	
		/**
     * Display a listing of Category.
     *
     * @return \Illuminate\Http\Response
    */
	public function getSalesPersonList()
	{
		$allSalesPerson = User::where('role', '3')->get();
		//dd($allSalesPerson);
		return view('salesperson.allSalesPerson', compact('allSalesPerson'));
		
	}
	
	/*get account_no from dealer_id*/
	public static function getDealerAccountByID($dealer_id){
		if($dealer_id)
		{
			$dealerData = Dealer::select('account_no')->whereNotNull('account_no')->where('id', $dealer_id)->get()->first();
			$dealerAcc = $dealerData['account_no'];
			return $dealerAcc;
		}
	}

}

?>