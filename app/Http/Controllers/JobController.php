<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Dealer;
use App\Job;
use App\SalePerson;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Helpers\CustomHelper;
use Mail;
use App\Mail\sendJobNotification;


class JobController extends Controller
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
    public function index(Request $request)
    {
		
		//Get List of Sales person (with role = 3) for filtering the jobs
		$salesPerson = User::select('first_name', 'email', 'id')->where('role', '3')->get();
		//dump($salesPerson);
		
        $jobs = Job::with([
            'dealers',
			'dealerCompany',
			'getSalesPerson'
        ]);

		//if any search is submitted
		if(isset($request->sales_person) && $request->sales_person != ''){
			$jobs = $jobs->where('job_created_by', $request->sales_person);
			
		}
		
		$jobs = $jobs->get();
		
//dd($jobs);
        return view('jobs.index', compact('jobs', 'salesPerson'));
    }

    /**
     * Show the form for creating new job.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$dealers = User::select('id','first_name', 'last_name')->where('role','2')->get();
        /*$relations = [
            'dealers' => User::where('role','2')->get()->pluck('first_name', 'id')->prepend('Please select', ''),
        ]; */
		
		$relations = [
            'dealers' => Dealer::whereNotNull('company_name')->orderBy('company_name', 'ASC')->get()->pluck('company_name', 'id')->prepend('Please select', ''),
        ];
//dd($relations);
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4',
            'option5' => 'Option #5'
        ];

        //dd($dealers);

        return view('jobs.create', compact('correct_options') + $relations);
    }
	
	/*get the jobs fields details by dealer_id / company name
	* An ajax request
	* @Return fields val 
	*/
	public function getJobRecordByDealerId(Request $request){
		$dealerID = $request->dealer_id;
		$jobData = Job::where('dealer_id', $dealerID)->get()->first();
		
		if(!empty($jobData))
		{
			return response()->json(['status' => 1, 'data'=>$jobData->toArray()]);
		}else
		{
			return response()->json(['status' => 0, 'data'=>[]]);
		}
	}

    /**
     * Store a newly created job in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
		$adminDetail = Auth::user();
		
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
									
					$emailContent = array('user_name'=>$adminDetail['first_name'], 'job_name'=>$requestToSubmit['title'], 'job_id'=>$jobCreated->id, 'user_email'=>$adminDetail['email']);
					
					$mailToAdmin = Mail::to($email)->send(new sendJobNotification($emailContent));
					if($mailToAdmin){
						dump('Email sent!');
					}
					
				}
			}		
		}
		
		
        return redirect()->route('jobs.index');
    }

    /**
     * Show the form for editing job.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$relations = [
            'dealers' => User::where('role','2')->get()->pluck('first_name', 'id')->prepend('Please select', ''),
        ]; */

		$relations = [
            'dealers' => Dealer::whereNotNull('company_name')->get()->pluck('company_name', 'id')->prepend('Please select', ''),
        ];
		
        $jobs = Job::findOrFail($id);

        return view('jobs.edit', compact('jobs') + $relations);
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

        return redirect()->route('jobs.index');
    }

    /**
     * Display jobs.
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
            'dealers',
			'getSalesPerson'
        ])->where('id',$id)->get();
		//dump($jobs);

        return view('jobs.show', compact('jobs') + $relations);
    }


    /**
     * Remove job from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobs = Job::findOrFail($id);
        $jobs->delete();

        return redirect()->route('jobs.index');
    }

    /**
     * Delete all selected jobs at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Job::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    // Show the requested job
    public function showJob(Job $job)
    {
        return view('jobs.showJob', compact('job'));
    }
	
	
}

?>