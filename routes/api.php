<?php

use App\User;
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

Route::resource('condition', 'ConditionController');
Route::resource('country', 'CountryController');
Route::resource('image', 'ImageController');
Route::resource('media_type', 'MediaTypeController');
Route::resource('user', 'UserController');
Route::resource('video', 'VideoController');


/**
 * For test
 */
Route::get('test', function (){
    return view('test');
});