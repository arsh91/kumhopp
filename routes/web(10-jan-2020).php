<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function() {
    return redirect('/login');
 });
 
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('login','AdminController@login')->name('login'); 
Route::post('login','AdminController@login');

Route::get('/forgot-password', function () {
	
	return view('forgot-password');
});

Route::post('forgot-password','DealerFrontController@sendForgotPasswordEmail')->name('forgot-password');
Route::get('reset-password/{token}','DealerFrontController@checkResetLinkValidity');	
Route::post('reset-password','DealerFrontController@resetPassword')->name('reset-password');

//Route::match(['post','get'],'/','AdminController@login');
//Route::match(['post','get'],'login','AdminController@login');


Route::match(['get'],'logout','AdminController@logout');
//Route::namespace('/')->group(function () {
//});
Route::get('/logout', 'AdminController@logout');

/*Frontend Route*/
Route::group(['middleware' => 'auth'], function () {
	Route::get('/dealerDashboard', 'DealerFrontController@dealerDashboard');

	/*static pages links*/
	Route::get('/suppliers', 'DealerFrontController@suppliers');
	Route::get('/marketing', 'DealerFrontController@marketing');
	Route::get('/downloads', 'DealerFrontController@downloads');
	Route::get('/news', 'DealerFrontController@news');
	Route::get('/dealerJobs', 'DealerFrontController@dealerJobs');
	Route::get('/getJobDetail/{id}', 'DealerFrontController@getJobDetail');
	Route::get('/dealer/vouchers','DealerVoucherController@getAllVouchers');
	Route::post('/dealer/vouchers/addtocart/{id}','DealerVoucherController@addVoucherToCart');
	Route::get('/dealer/vouchers/checkout','DealerVoucherController@voucherCheckout')->name('checkout');
	Route::post('/dealer/vouchers/place_order','DealerVoucherController@placeVoucherOrder');
	
	Route::get('readCSV', 'DealerController@readCSV');
});

/*Admin Route*/
Route::group(['middleware' => ['auth', 'admin']], function () {
	// Dashboard Controller
	Route::get('dashboard','AdminController@dashboard');
	//Route::get('dealers','DealerController@index');
	Route::get('dealers/status/{id}/{status}', 'DealerController@status');
	
	Route::resource('dealers', 'DealerController');

	Route::resource('pages','PageController');
	
	Route::resource('dealercontents','DealerContentController');

	Route::resource('jobs','JobController');

	Route::resource('vouchers','VoucherController');
	
	Route::get('dealers/sales/{id}', 'DealerSaleController@getAllSales')->name('dealersales.index');
	
	Route::get('dealers/sales/create/{id}', 'DealerSaleController@create')->name('dealersales.create');
	
	Route::post('/dealers/sales', 'DealerSaleController@store')->name('dealersales.store');
	
	Route::get('/dealers/sales/show/{id}', 'DealerSaleController@show')->name('dealersales.show');
	
	Route::get('/dealers/sales/{id}/edit', 'DealerSaleController@edit')->name('dealersales.edit');
	
	Route::put('/dealers/sales/{id}', 'DealerSaleController@update')->name('dealersales.update');
	
	Route::delete('/dealers/sales/{id}/{dealer_id}', 'DealerSaleController@destroy')->name('dealersales.destroy');
	
});

/*Access this URL without login*/
Route::get('/{page}', 'PageController@showPage');



// Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
	// Route::resource('topics', 'TopicsController');
	// Route::post('topics_mass_destroy', ['uses' => 'TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
// });