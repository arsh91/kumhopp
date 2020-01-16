<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\DealerSale;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDealerSaleRequest;
use App\Http\Requests\UpdateDealerSaleRequest;

class DealerSaleController extends Controller
{
	/*Get all sales
	* @Params $dealer_id
	* @Return sales array
	*/
	public function getAllSales($dealer_id){
		
		$sales = DealerSale::where('dealer_id', $dealer_id)->get();
		//dd($sales);
        return view('dealerSales.index', compact('sales', 'dealer_id'));
	}
	
	/**
     * Show the form for creating new sale figure.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dealer_id)
    {
		return view('dealerSales.create', compact('dealer_id'));
    }
	
	/**
     * Store a newly created sale figure in storage.
     *
     * @param  \App\Http\Requests\StoreDealerSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDealerSaleRequest $request)
    {
		$requestData = $request->all();
        DealerSale::create($request->all());	
		
        //return redirect()->route('dealerSales.index', $requestData['dealer_id']);
		return redirect()->action(
			'DealerSaleController@getAllSales', ['dealer_id' => $requestData['dealer_id']]
		);
    }
	
	/**
     * Show the form for editing DealerSale.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales = DealerSale::findOrFail($id);

        return view('dealerSales.edit', compact('sales'));
    }

    /**
     * Update DealerSale in storage.
     *
     * @param  \App\Http\Requests\UpdateDealerSaleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDealerSaleRequest $request, $id)
    {
		$requestData = $request->all();
        $sales = DealerSale::findOrFail($id);
        $sales->update($request->all());
		
		//dd($request->all());
        //return redirect()->route('dealerSales.index');
		
		return redirect()->action(
			'DealerSaleController@getAllSales', ['dealer_id' => $requestData['dealer_id']]
		);
    }

    /**
     * Display sales.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = DealerSale::findOrFail($id);

        return view('dealerSales.show', compact('sales'));
    }
	
	 /**
     * Remove page from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $dealer_id )
    {
        $pages = DealerSale::findOrFail($id);
        $pages->delete();

        // return redirect()->route('pages.index');
		return redirect()->action(
			'DealerSaleController@getAllSales', ['dealer_id' => $dealer_id]
		);
    }

    /**
     * Delete all selected pages at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = DealerSale::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

	
}
?>