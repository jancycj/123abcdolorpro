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
      Route::resource('qc', 'QCPlanController');
      Route::get('/item', 'ItemController@company_item')->name('company.item');
      Route::get('/customer', 'CostomersController@company_customer_index')->name('company.customer');
      Route::post('/customer', 'CostomersController@create_company_customer')->name('company.customer.save');
      Route::get('/customer/create', 'CostomersController@company_customer_create')->name('company.customer.create');
      Route::get('/lookup', 'LookupMasterController@company_get_lookup')->name('company.lookup');
      Route::post('/lookup', 'LookupMasterController@company_post_lookup')->name('company.lookup.post');
      Route::get('/get_items', 'CompanyController@get_items')->name('company.get_item');
      Route::get('/get_rate/{id}', 'CompanyController@get_rate')->name('company.get_rate');
      Route::get('/order/reciept','CompanyController@get_order_reciept')->name('order.reciept');
      Route::get('/reciept/{id}', 'CompanyController@get_order')->name('company.reciept');
      Route::post('/accept_order', 'CompanyController@accept_order')->name('company.accept_order');

      
	});
	
});

Route::prefix('customer')->group(function() {

	Route::group(['middleware' => ['auth']],function() {
      Route::get('/order', 'CostomersController@order')->name('customer.order');
      Route::get('/customers', 'CostomersController@customers')->name('customer.order');
      Route::get('/order/{id}', 'CostomersController@get_order')->name('customer.get_order');
      Route::get('/qc', 'CostomersController@get_qc')->name('customer.get_qc');
      Route::resource('/OrderReceiptDetails', 'OrderReceiptDetailsController');
      
	});
	
});


Route::prefix('general')->group(function() {

	Route::group(['middleware' => ['auth']],function() {
      Route::get('/tax', 'GeneralController@get_taxes')->name('general.tax');
      Route::get('/department', 'GeneralController@get_departments')->name('general.department');
      Route::get('/currency', 'GeneralController@get_currency')->name('general.currency');
      Route::get('/lookup', 'GeneralController@get_lookup')->name('general.lookup');
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