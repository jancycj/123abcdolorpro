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


Route::get('/dash', function () {
    return view('v1.colorpro.customers');
});
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function() {

	Route::group(['middleware' => ['auth']],function() {
      Route::resource('companies', 'CompanyController');
      Route::resource('items', 'ItemController');
      Route::resource('process', 'ProcessController');
      Route::resource('customers', 'CostomersController');
      Route::resource('lookup', 'LookupMasterController');
      
	});
	
});

Route::prefix('company')->group(function() {

	Route::group(['middleware' => ['auth']],function() {
      Route::resource('stocks', 'StockController');
      Route::resource('transaction', 'MaterialTransferController');
      Route::resource('orders', 'OrderController');
      Route::resource('rates', 'RatesController');
      Route::get('/customer', 'CostomersController@company_customer_index')->name('company.customer');
      Route::post('/customer', 'CostomersController@create_company_customer')->name('company.customer.save');
      Route::get('/customer/create', 'CostomersController@company_customer_create')->name('company.customer.create');
      Route::get('/lookup', 'LookupMasterController@company_get_lookup')->name('company.lookup');
      Route::post('/lookup', 'LookupMasterController@company_post_lookup')->name('company.lookup.post');
      Route::get('/get_items', 'CompanyController@get_items')->name('company.get_item');
      Route::get('/get_rate/{id}', 'CompanyController@get_rate')->name('company.get_rate');


      
	});
	
});


Route::get('/testRedis', 'GeneralController@redis')->name('redis');
Route::get('/testMultiTenent', 'GeneralController@multi')->name('multi');
Route::get('get_pdf', function () {
    return view('pdf');
   
});

Route::get('eventss', function () {
   
    return 'good';
   
});

Route::get('notify', function () {
   return 'good';
});


Route::get('color', function () {
   return view('v1.home');
});
// Route::get('companies', function () {
//    return view('v1.company.companies');
// });
Route::get('branches', function () {
   return view('v1.company.branches');
});
Route::get('employees', function () {
   return view('v1.company.employees');
});
Route::get('departments', function () {
   return view('v1.company.departments');
});