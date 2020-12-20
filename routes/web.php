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
      Route::resource('shade', 'ShadeController');
      Route::resource('article', 'ArticleController');
      Route::resource('assortment', 'AssortmentController');
      Route::resource('indent', 'IndentController');
      Route::get('/item', 'ItemController@company_item')->name('company.item');
      Route::get('/item_import', 'ItemController@import')->name('company.item.import');
      Route::post('/item_import', 'ItemController@importPost')->name('company.item.import.post');
      Route::get('/customer', 'CostomersController@company_customer_index')->name('company.customer');
      Route::get('/get_customer/{id}', 'CostomersController@show')->name('company.show');
      Route::post('/customer', 'CostomersController@create_company_customer')->name('company.customer.save');
      Route::get('/customer/create', 'CostomersController@company_customer_create')->name('company.customer.create');
      Route::get('/lookup', 'LookupMasterController@company_get_lookup')->name('company.lookup');
      Route::post('/lookup', 'LookupMasterController@company_post_lookup')->name('company.lookup.post');
      Route::get('/get_items', 'CompanyController@get_items')->name('company.get_item');
      Route::get('/get_rate/{id}', 'CompanyController@get_rate')->name('company.get_rate');
      Route::get('/order/reciept','CompanyController@get_order_reciept')->name('order.reciept');
      Route::get('/reciept/{id}', 'OrderController@get_order_reciept')->name('company.reciept');
      Route::get('/order/completed/{id}', 'OrderController@get_order_update')->name('company.reciept');
      Route::post('/order/completed/', 'OrderController@post_order_update')->name('company.reciept');
      Route::post('/reciept/update', 'OrderReceiptDetailsController@get_order')->name('order.reciept_update');
      Route::post('/accept_order', 'OrderController@accept_order')->name('company.accept_order');
      Route::get('/search_order', 'OrderController@search_order')->name('order.search');
      Route::post('/order/pdf', 'OrderController@exportPdf')->name('order.pdf');

      
        Route::prefix('report')->group(function() {

            Route::get('/stock', 'ReportController@stock')->name('report.stock');
            Route::get('/stock_pdf', 'ReportController@stock_pdf')->name('report.stock.pdf');
            Route::get('/po', 'ReportController@po_orders')->name('report.po');
            Route::get('/po_pdf', 'ReportController@po_pdf')->name('report.po.pdf');
            Route::get('/register_pdf', 'ReportController@register_pdf')->name('report.register.pdf');
            Route::get('/register', 'ReportController@register_orders')->name('report.register');
            Route::get('/mir', 'ReportController@mir')->name('report.mir');
            Route::get('/mir_pdf', 'ReportController@mir_pdf')->name('report.mir.pdf');

           
            
            
        });
	});
	
});

Route::prefix('customer')->group(function() {

	Route::group(['middleware' => ['auth']],function() {
      Route::get('/order', 'CostomersController@order')->name('customer.order');
      Route::get('/customers', 'CostomersController@customers')->name('customer.order');
      Route::get('/order/{id}', 'CostomersController@get_order')->name('customer.get_order');
      Route::get('/qc', 'CostomersController@get_qc')->name('customer.get_qc');
      Route::resource('/OrderReceiptDetails', 'OrderReceiptDetailsController');
      
      Route::prefix('report')->group(function() {

            Route::get('/po', 'VendorReportController@po_orders')->name('vendor.report.po');
            Route::get('/po_pdf', 'VendorReportController@po_pdf')->name('vendor.report.po.pdf');
            Route::get('/register_pdf', 'VendorReportController@register_pdf')->name('vendor.report.register.pdf');
            Route::get('/register', 'VendorReportController@register_orders')->name('vendor.report.register');
            Route::get('/mir', 'VendorReportController@mir')->name('vendor.report.mir');
            Route::get('/mir_pdf', 'VendorReportController@mir_pdf')->name('vendor.report.mir.pdf');

        
            
            
        });
    });
    
	
});

Route::prefix('quick')->group(function() {

	Route::group(['middleware' => ['auth']],function() {
      Route::get('/customers', 'QuickController@customers')->name('quick.customers');
      Route::get('/items', 'QuickController@items')->name('quick.items');
      Route::post('/general', 'QuickController@general')->name('quick.general');
      
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