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

Route::get('/', 'HomeController@index');

Route::get('services/finished','ServicesController@finished');
Route::get('services/{id}/finish','ServicesController@finish')->name('services.finish');

Route::resource('services', 'ServicesController');

Route::post('customers/load', 'CustomersController@load')->name('customers.load');

Route::resource('customers', 'CustomersController');



Auth::routes();
