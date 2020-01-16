<?php

namespace App\Http\Controllers;

use App\Voucher;
use File;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class VoucherController extends Controller
{
    use FileUploadTrait;
	
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
        $vouchers = Voucher::all();
		

        return view('vouchers.index', compact('vouchers'));
    }

    /**
     * Show the form for creating new voucher.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vouchers.create');
    }

    /**
     * Store a newly created voucher in storage.
     *
     * @param  \App\Http\Requests\StoreVoucherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVoucherRequest $request)
    {
        $requestToSubmit = $request->all(); 
        
        //$voucherImage = $request->voucher_image;
        //dump($voucherImage);

        $voucher_image = '';
        if ($request->hasFile('voucher_image')){            
            $voucher_image =  $this->saveFiles($request);            
            $voucher_image = $voucher_image->voucher_image;
            $requestToSubmit['voucher_image'] = $voucher_image;
        }

        
        //dd($requestToSubmit);
        Voucher::create($requestToSubmit);
        
        return redirect()->route('vouchers.index');
    }

    /**
     * Show the form for editing voucher.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vouchers = Voucher::findOrFail($id);

        return view('vouchers.edit', compact('vouchers'));
    }

    /**
     * Update voucher in storage.
     *
     * @param  \App\Http\Requests\UpdateVoucherRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVoucherRequest $request, $id)
    {
        $vouchers = Voucher::findOrFail($id);
        $requestToSubmit = $request->all();
         //if image is changed only then need to upload otherwise keep the same
        $voucher_image = '';
        if ($request->hasFile('voucher_image')){            
            $voucher_image =  $this->saveFiles($request);            
            $voucher_image = $voucher_image->voucher_image;
            $requestToSubmit['voucher_image'] = $voucher_image;
        }

        //dd($requestToSubmit);
        $vouchers->update($requestToSubmit);
        return redirect()->route('vouchers.index');
    }

    /**
     * Display vouchers.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vouchers = Voucher::findOrFail($id);

        return view('vouchers.show', compact('vouchers'));
    }


    /**
     * Remove voucher from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vouchers = Voucher::findOrFail($id);
        $vouchers->delete();

        return redirect()->route('vouchers.index');
    }

    /**
     * Delete all selected vouchers at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Voucher::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    // Show the requested voucher
    /*public function showVoucher(Voucher $voucher)
    {
        return view('vouchers.showVoucher', compact('voucher'));
    }*/



}

?>