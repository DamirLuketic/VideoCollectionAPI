<?php

use App\User;
use App\Video;
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
Route::get('video/collection', 'VideoController@video_collection')->name('video.collection');

Route::resource('condition', 'ConditionController');
Route::resource('country', 'CountryController');
Route::resource('image', 'ImageController');
Route::resource('media_type', 'MediaTypeController');
Route::resource('user', 'UserController');
Route::resource('video', 'VideoController');
Route::resource('genre', 'GenreController');

Route::post('user/login', 'UserController@login')->name('user.login');
Route::get('user/email_confirmation/{email}/{key}', 'UserController@email_confirmation')->name('email_confirmation');
Route::post('video/personal', 'VideoController@video_personal')->name('video.personal');
Route::get('video/catch/{mediaId}', 'VideoController@video_catch')->name('video.catch');

/**
 * For test
 */
//Route::get('test', function (Request $request){
//    $user = User::find(1);
//    $videos = $user->videos;
//    foreach ($videos as $video) {
//        $genres = $video->genres;
//        $video['genres'] = $genres;
//
//            if (isset($genres[0]))
//            {
//                unset ($video['genres']);
//                foreach ($genres as $genre)
//                {
//                    $video['genres'] .= $genre->pivot->genre_id;
//                }
//            }
//
//    }
//    return $videos;
//})->name('test');
