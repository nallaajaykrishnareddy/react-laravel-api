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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');
Route::post('/details', 'API\AuthController@details');

Route::apiResource('/products','API\ProductsController');

Route::group(['prefix' => 'products'], function () {
    Route::apiResource('/{product}/reviews','API\ReviewsController');
});