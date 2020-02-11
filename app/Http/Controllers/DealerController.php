<?php

namespace App\Http\Controllers;


use Auth;
use App\User;
use App\Dealer;
use App\DealerSale;
use App\SalePerson;
use App\PointHistory;
use App\PasswordReset;
use Illuminate\Http\Request;
use App\Mail\sendEmailNotification;
use App\Mail\sendDealerPassword;
use App\Http\Requests\StoreDealerRequest;
use App\Http\Requests\UpdateDealerRequest;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DealerController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$dealers1 = User::where('role','2')->get();	//old query
		$dealers = User::with([
            'dealers'])->where('role','2')->orderBy('id', 'ASC')->get();			

        return view('dealers.index', compact('dealers', 'dealers1'));
    }

    /**
     * Show the form for creating new dealers.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dummyID = '1'; 		
		
        return view('dealers.create');
    }

	public function createTestingPasswords($pass){
		
		$dealers = User::with([
                'dealers'])->where('role','2')->where('id','21')->get()->toArray();		
		dd($dealers);		
		/* if(isset($pass)){
			$password =	Hash::make($pass);
			dd($password);
		} */
		
	}

    /**
     * Store a newly created dealers in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDealerRequest $request)
    {
        $user = Auth::user();

        // Get the currently authenticated user's ID...
        $adminID = Auth::id();

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
        $password = substr(str_shuffle($chars), 0, 8);
        $requestToSubmit = $request->all(); 
        $requestToSubmit['password'] = $password;
        $contactEmail = $requestToSubmit['email'];
        $contactName = $requestToSubmit['first_name'];

        //STEP I:- Create dealer with default password
        $dealer = User::create($requestToSubmit);

        $lastInsertedDealerID = $dealer->id;
        
        if($dealer->id > 0){

            //save the other info into dealer's table
            Dealer::create([
                    'dealer_id' => $dealer->id,
                    'account_no' => $requestToSubmit['account_no'],
					'company_name'=>$requestToSubmit['company_name'],
                    'contact'=>$requestToSubmit['contact'],
                    'address1'=> $requestToSubmit['address1'],
                    'address2'=> $requestToSubmit['address2'],
                    'address3'=> $requestToSubmit['address3'],
                    'town'=> $requestToSubmit['town'],
                    'county'=> $requestToSubmit['county'],
                    'post_code'=> $requestToSubmit['post_code'],
                    'website'=> $requestToSubmit['website'],
                    'category'=> $requestToSubmit['category'],
                    'group'=> $requestToSubmit['group'],

                ]);
            //STEP II:- Shoot an email to DEALER with password
            $data = array('name'=>$contactName, 'password'=>$password);
			
			$emailContent = array('name'=>$contactName, 'email'=>$contactEmail, 'password'=>$password);
			
			Mail::to($contactEmail)->send(new sendDealerPassword($emailContent));
			
            /*Mail::send('mail', $data, function($message) use ($contactEmail, $contactName) {         
                $message->to($contactEmail, $contactName)->subject
                ('Kumhopp: Password for you account!');
                $message->from('noreply@kumhopp.pineapple.uk.net','Kumhopp'); 
            }); */
           

            //STEP I:- Insert the enteries to Voucher Points 
            PointHistory::create(
                [
                'dealer_id' => $lastInsertedDealerID,
                'amount' => $requestToSubmit['points'],
                'type'=>'1',
                'created_by'=>$adminID
                ]
            );
        }

        return redirect()->route('dealers.index');
    }


    /**
     * Show the form for editing dealers.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dealers = User::findOrFail($id);
        $dealerUsers = Dealer::where('dealer_id',$id);

        //dump($dealers);
        /*$dealersData = Dealer::with([
               'dealerUsers'])->where(['dealer_id'=> $id])->first();*/

        $dealersData = User::with([
                'dealers'])->where(['id'=> $id])->first();

        if(is_null($dealersData->dealers)){
            echo "value is empty";
            $dealersData->dealers = $dealerUsers;
        }
        //dd($dealerUsers);

        return view('dealers.edit', compact('dealers', 'dealersData'));
    }

    /**
     * Update categories in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDealerRequest $request, $id)
    {
        $dealers = User::findOrFail($id); 

        $dealerUsers = Dealer::where('dealer_id',$id);

        // Get the currently authenticated user's ID...
        $adminID = Auth::id();

        $prevPoints = $dealers->points; //from database using ID as WHERE cond
        
        $request = $request->all();

        //echo $id;
        //dump($dealerUsers);
        //dd($request);

        $newPoints = $request['points'];

        //current value = 600
        if($prevPoints < $newPoints){  //600 < 700 then credited
            PointHistory::create(
                [
                'dealer_id' => $id,
                'amount' => $newPoints,
                'type'=>env('TYPE_CREDIT'),
                'created_by'=>$adminID
                ]
            );

        }else if($prevPoints > $newPoints){ // 600 > 500 then debit 
            PointHistory::create(
                [
                'dealer_id' => $id,
                'amount' => $newPoints,
                'type'=>env('TYPE_DEBIT'),
                'created_by'=>$adminID
                ]
            );            
        }else{ //nothing is changed
            //echo "no need to change";
        }

        //UPDATE THE dealer
        $dealers->update($request);

        //After updating user, udate the dealer's table


        $dealerUsers->update(['account_no' => $request['account_no'],
								'company_name'=>$request['company_name'],
                                'contact'=>$request['contact'],
                                'address1'=> $request['address1'],
                                'address2'=> $request['address2'],
                                'address3'=> $request['address3'],
                                'town'=> $request['town'],
                                'county'=> $request['county'],
                                'post_code'=> $request['post_code'],
                                'region'=> $request['region'],
                                'website'=> $request['website'],
								'category'=> $request['category'],
								'group'=> $request['group']
                            ]);

        return redirect()->route('dealers.index');
    }


    /**
     * Display dealers.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$salesPersonEmail = '';
        //$dealers = User::findOrFail($id);
		$dealers = User::with([
                'dealers'])->where(['id'=> $id])->first();

		
		//get the dealer_id and then query over sales_persons table
		$dealer_id = $dealers->dealers->id;

		$salesPerson = SalePerson::with(['salesUsers'])->where('dealer_id', $dealer_id)->get();


		if($salesPerson->isNotEmpty()){
			$salesPersonEmail = $salesPerson[0]->salesUsers->email;
				
		}
		
        return view('dealers.show', compact('dealers', 'salesPersonEmail'));
    }


    /**
     * Remove dealers from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dealers = User::findOrFail($id);
        $dealers->delete();

        return redirect()->route('dealers.index');
    }

    /**
     * Delete all selected dealers at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
	
	
	//read Customer-dealer.csv to create and update new dealers with acc_no
	public function customer_dealer_readCSV() { 
	
		$newDealerWithoutAccNo = array();
		$dealerWithOneAccNo = array();
		$dealersWithMultipleAccNo = array();
		
		$array = array('delimiter' => ',');
		$csvFileName = "customer-dealers.csv";
		$csvFile = public_path($csvFileName);
		$file_handle = fopen($csvFile, 'r');
		while (!feof($file_handle)) {
			$dealers[] = fgetcsv($file_handle, 0, $array['delimiter']);
		}
		fclose($file_handle);
		
		$adminID = Auth::id();
		unset($dealers[0]);
		$insertCount = 0;
		//dump($dealers);
		//die('---');
	//	echo "Company Name						Account No <br/>";
		echo '<table  border="1"><thead>';
		echo '<th>Company Name</th>';
		echo '<th>Account No</th>';
		echo '</thead></tbody>';
		foreach($dealers as $k=>$val) {
			$dealer_account_no = $val[1];
			if(trim($dealer_account_no) != '') {
				$firstName = $lastName = '';
				$dealerWithAccNo = Dealer::where('account_no', $dealer_account_no)->get();
				
				$dealerRecordFoundCount = $dealerWithAccNo->count();
				
				/*CASE I :- if count is 0 then we need to maintian a array with account no 
				*/
				
				if($dealerRecordFoundCount == 0)
				{
					//echo '<tr>';
					//echo '<td>'.$val[2].'</td>';
					//echo '<td>'.$dealer_account_no.'</td>';
					//echo '</tr>';
					//echo $val[2].'				'.$dealer_account_no;
					//echo '<br/>';
					//dump('found 0 record with this'.$dealer_account_no.' and company_name -->'.);
					$newDealerWithoutAccNo[] = $dealer_account_no;
					
					
				}else if($dealerRecordFoundCount == 1)
				{
					
					
				}else if($dealerRecordFoundCount > 1)
				{
					echo '<tr>';
					echo '<td>'.$val[2].'</td>';
					echo '<td>'.$dealer_account_no.'</td>';
					echo '</tr>';
					//dump($dealer_account_no.'---'.$dealerRecordFoundCount.'---records exists with this delaer id');
					$dealersWithMultipleAccNo[] = $dealer_account_no;
					
					
				}
				
			}
						
		}
		echo '</tbody>';
		echo '</table>';
		
		
	//	dump($newDealerWithoutAccNo);
		
	//	dump($dealerWithOneAccNo);
		
	//	dump($dealersWithMultipleAccNo); 
				
		
	}
	
	public function readCSV() { die;
		$array = array('delimiter' => ',');
		$csvFileName = "dealers.csv";
		$csvFile = public_path($csvFileName);
		$file_handle = fopen($csvFile, 'r');
		while (!feof($file_handle)) {
			$dealers[] = fgetcsv($file_handle, 0, $array['delimiter']);
		}
		fclose($file_handle);
		
		$adminID = Auth::id();
		unset($dealers[0]);
		$insertCount = 0;
		foreach($dealers as $k=>$val) {
			if(trim($val[11]) != '') {
				$firstName = $lastName = '';
				if($val[2] != '') {
					$names = explode(" ", $val[2]);
					$firstName = $names[0];
					$lastName = isset($names[1]) ? $names[1] : '';
				}
				$userTableData = array('first_name' => $firstName, 'last_name' => $lastName, 'email' => $val[11], 'password' => '123456789', 'phone' => $val[10], 'points'=>0, 'status' => '0');
				//print_r($userTableData); die;
				$dealer = User::create($userTableData);
				
				//CASE : - update the company name, first get the user_id and then update it in dealer table
				/*$existingDealer = User::where('email',$val[11])->get();
				if($existingDealer[0]['id']){ //if user exists 
					$valLower = strtolower($val[1]);
					$compName = ucwords($valLower);
					//update the company name into the dealer table
					$updateDealer = Dealer::where('dealer_id', $existingDealer[0]['id'])->update(['company_name' => $compName]);
				}*/
				
				if($dealer->id) {
					
					$dealersTableData = array('dealer_id' => $dealer->id,
											'account_no' => $val[0],
											'contact'=>$val[2],
											'address1'=> $val[3],
											'address2'=> $val[4],
											'address3'=> $val[5],
											'town'=> $val[6],
											'county'=> $val[7],
											'post_code'=> $val[8],
											'region'=> $val[9],
											'website'=> $val[12],
										);
					Dealer::create($dealersTableData);
					
					echo '<br />'.$firstName.' '.$lastName.' Dealer Created ID : '.$dealer->id;
					$insertCount++;
				}
			}
		}
		echo "Total Dealers Inserted : ".$insertCount;
		exit;
	}
	
	/*Update the status of user in `users table`*/
	public function status($id, $status)
	{
        //$statusDeclined = false;
		$user = User::findOrFail($id);        
		$user->status = $status;
        if(!$status) {
			//$statusDeclined = true;
			$comment = 'Your account has been declined, please contact admin for more information.';

        } else {
            //$user->approved = 1;
			$comment = 'Your account has been approved.';
            
        }
        
        $user->save();
			
		//STEP II:- Shoot an email to DEALER with activation info
		$contactEmail = $user->email;
		$contactName = $user->first_name;
		$data = array('name'=>$contactName, 'comment'=>$comment);
		Mail::send('email.accountActivation', $data, function($message) use ($contactEmail, $contactName) {         
			$message->to($contactEmail, $contactName)->subject
			('Kumho: Account Activation!');
			$message->from('noreply@kumhopartner.co.uk');
		});
        
        return redirect()->route('dealers.index');
	}
	
}
