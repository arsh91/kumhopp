<?php

namespace App\Http\Controllers;

//use App\Dealer;
use App\User;
use App\SalePerson;
use Illuminate\Http\Request;

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


}

?>