<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Dealer;
use App\SalePerson;
use App\Job;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Helpers\CustomHelper;
use Mail;
use App\Mail\sendJobNotification;



class SalesPersonFrontController extends Controller
{
	
    /*Dealer Dashboard for front end user*/
    public function salesPersonDashboard(Request $request){     
        return view('front.salesperson.welcome');
    }
	
	/*Where sales person create jobs for the selected dealers*/
	public function index(){
		// Get the currently authenticated user's ID...
        $authID = Auth::id();
		//$jobs = Job::where('job_created_by', $authID)->get();
		//dump($jobs);
		
		$jobs = Job::with(['dealers','dealerCompany'])->where('job_created_by', $authID)->get();

        //return view('jobs.index', compact('jobs'));
		
		
        return view('front.salesperson.index', compact('jobs'));
		
	}
	
	/*A job creation form
	* Show a list of dealers which are assigned to logged-in sales person
	*
	*/
	public function create(){
		
		// Get the currently authenticated user's ID...
        $authID = Auth::id();
		
		//fetch the list of dealers which are associated with this sales person
		$dealerList = SalePerson::with(['salesDealerUsers'])->where('user_id', $authID)->get()->toArray();
		
		//create the options for these dealers
		$dealers = array();		
		foreach($dealerList as $row ){
			$dealers[$row['sales_dealer_users']['id']] = $row['sales_dealer_users']['company_name'];
		
		}
		
		$relations = [
            'dealers' => collect($dealers)->prepend('Please select', ''),
        ];
		
		
		$correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4',
            'option5' => 'Option #5'
        ];
		
		return view('front.salesperson.create', compact('correct_options') + $relations);
	}
	
	
	/**
    * Store a newly created job in storage.
    * By sales person and assign it to a selected dealer.
    * @param  \App\Http\Requests\StoreJobRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreJobRequest $request)
    {
		$salesPerson = Auth::user();
		$fromEmail = $salesPerson['email'];
		
        $requestToSubmit = $request->all();
        //dd($requestToSubmit);

        $jobCreated = Job::create($requestToSubmit);
		
		if($jobCreated->id){
			//shoot an email to all the admins
			//sent an email to all admin's
			$adminData = CustomHelper::getAllAdminEmails();
			if(count($adminData) > 0 ){
				foreach($adminData as $admin){
					$email = $admin->email; 
									
					$emailContent = array('user_name'=>$salesPerson['first_name'], 'job_name'=>$requestToSubmit['title'], 'job_id'=>$jobCreated->id, 'user_email'=>$salesPerson['email']);
					
					$mailToAdmin = Mail::to($email)->send(new sendJobNotification($emailContent));
					if($mailToAdmin){
						dump('Email sent!');
					}
					
				}
			}
			//dump($adminData);			
		}
		
        return redirect()->route('salespersonjobs.index');
    }
	
	
	
	 /**
     * Display jobs in sales person dashboard.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobs1 = array();
        /*$relations = [
            'dealers' => User::where('role','2')->get()->pluck('first_name', 'id')->prepend('Please select', ''),
        ];*/
		
		$relations = [
            'dealers' => Dealer::whereNotNull('company_name')->get()->pluck('company_name', 'id')->prepend('Please select', ''),
        ];

        //$jobs = Job::findOrFail($id);

        $jobs = Job::with([
            'dealers'
        ])->where('id',$id)->get();
		//dump($jobs);

        return view('front.salesperson.show', compact('jobs') + $relations);
    }
	
	
	
	/**
     * Show the form for editing job.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		// Get the currently authenticated user's ID...
        $authID = Auth::id();
		
		$relations = [
            'dealers' => Dealer::whereNotNull('company_name')->get()->pluck('company_name', 'id')->prepend('Please select', ''),
        ];
		
        $jobs = Job::findOrFail($id);

        return view('front.salesperson.edit', compact('jobs') + $relations);
    }
	
	
	 /**
     * Update job in storage.
     *
     * @param  \App\Http\Requests\UpdateJobRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJobRequest $request, $id)
    {
        $jobs = Job::findOrFail($id);
        $jobs->update($request->all());

        return redirect()->route('salespersonjobs.index');
    }
	
	
	/*Method runs on the "Dealer" menu in sales person dashboard
	*
	*Show list of associated delears
	*/
	public function salespersondealers(){
		
		// Get the currently authenticated user's ID...
        $authID = Auth::id();
		$dealers = array();
		
		//fetch the list of dealers which are associated with this sales person
		$dealerList = SalePerson::with(['salesDealerUsers'])->where('user_id', $authID)->get();
		//dd($dealerList);
				
		return view('front.salesperson.dealersList', compact( 'dealerList' ));
	}
	
	
}