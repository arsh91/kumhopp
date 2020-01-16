<?php

namespace App\Http\Controllers;

use App\User;
use App\Dealer;
use App\Job;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

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
    public function index()
    {
        $jobs = Job::with([
            'dealers',
			'dealerCompany'
        ])->get();
//dd($jobs);
        return view('jobs.index', compact('jobs'));
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
            'dealers' => Dealer::whereNotNull('company_name')->get()->pluck('company_name', 'id')->prepend('Please select', ''),
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

    /**
     * Store a newly created job in storage.
     *
     * @param  \App\Http\Requests\StoreJobRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJobRequest $request)
    {
        $requestToSubmit = $request->all();
        //dd($requestToSubmit);

        Job::create($requestToSubmit);
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
            'dealers'
        ])->where('id',$id)->get();

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