<?php

namespace App\Http\Controllers;

use App\DealerContent;
use Illuminate\Http\Request;
use App\Mail\sendEmailNotification;
use App\Http\Requests\StoreDealerContentRequest;
use App\Http\Requests\UpdateDealerContentRequest;
use Mail;

class DealerContentController extends Controller
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
        //echo "this is index page";

        $dealerContents = DealerContent::where('status','1')->get();
		//dump($dealerContents);
        return view('dealerContent.index', compact('dealerContents'));
    }

    /**
     * Show the form for creating new dealerContents.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        return view('dealerContent.create');
    }

    /**
     * Store a newly created dealerContent in storage.
     *
     * @param  \App\Http\Requests\StoreCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDealerContentRequest $request)
    {
        DealerContent::create($request->all());		

        return redirect()->route('dealercontents.index');
    }


    /**
     * Show the form for editing dealerContent.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dealercontents = DealerContent::findOrFail($id);

        return view('dealerContent.edit', compact('dealercontents'));
    }

    /**
     * Update dealerContent in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDealerContentRequest $request, $id)
    {
        $dealerContents = DealerContent::findOrFail($id);
        $dealerContents->update($request->all());

        return redirect()->route('dealercontents.index');
    }


    /**
     * Display dealerContents.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dealerContents = DealerContent::findOrFail($id);

        return view('dealerContents.show', compact('dealerContents'));
    }


    /**
     * Remove dealerContents from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dealerContents = DealerContent::findOrFail($id);
        $dealerContents->delete();

        return redirect()->route('dealercontents.index');
    }

    /**
     * Delete all selected dealerContents at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = DealerContent::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
	
}
