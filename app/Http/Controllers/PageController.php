<?php

namespace App\Http\Controllers;

//use App\Dealer;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;

class PageController extends Controller
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
        $pages = Page::all();
		

        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating new page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $slug = str_slug($request->name, '-');  //create the slug with page name        
        $requestToSubmit = $request->all(); 
        $requestToSubmit['slug'] = $slug;

        Page::create($requestToSubmit);
        return redirect()->route('pages.index');
    }

    /**
     * Show the form for editing page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = Page::findOrFail($id);

        return view('pages.edit', compact('pages'));
    }

    /**
     * Update page in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, $id)
    {
        $pages = Page::findOrFail($id);
        $pages->update($request->all());

        return redirect()->route('pages.index');
    }

    /**
     * Display pages.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = Page::findOrFail($id);

        return view('pages.show', compact('pages'));
    }


    /**
     * Remove page from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = Page::findOrFail($id);
        $pages->delete();

        return redirect()->route('pages.index');
    }

    /**
     * Delete all selected pages at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Page::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    // Show the requested page
    public function showPage(Page $page)
    {
        return view('pages.showPage', compact('page'));
    }



}

?>