<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('main', 'PaymentController@index');
// route for processing payment
Route::post('main/paypal', 'PaymentController@payWithpaypal');
// route for check status of the payment
Route::get('main/status', 'PaymentController@getPaymentStatus');
