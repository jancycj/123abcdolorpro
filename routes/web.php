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


Route::get('/', function () {
    return view('v1.company.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
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
Route::get('companies', function () {
   return view('v1.company.companies');
});
Route::get('branches', function () {
   return view('v1.company.branches');
});
Route::get('employees', function () {
   return view('v1.company.employees');
});
Route::get('departments', function () {
   return view('v1.company.departments');
});