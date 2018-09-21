<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});




Route::post('/voucher', 'VoucherController@create')->name('voucher.api.create');
Route::get('/voucher/{id}', 'VoucherController@show')->name('voucher.api.show');
Route::delete('/voucher/{id}', 'VoucherController@destroy')->name('voucher.api.remove');


Route::post('/product', 'ProductController@create')->name('product.api.create');
Route::get('/product/{id}', 'ProductController@show')->name('product.api.show');
Route::post('/product/buy', 'ProductController@buy')->name('product.api.buy');
