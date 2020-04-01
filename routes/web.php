<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/privacy', 'PrivacyController@index')->name('privacy');
Route::get('/tos', 'TermsOfServiceController@index');
Route::resource ('/video', 'VideoController');
Route::get('/getChannels', 'GetChannels@index');
Route::get('/getPlaylist', 'VideoController@getPlaylist');
Route::get('/test','TestController');

    /*
    |--------------------------------------------------------------------------
    | Web API OAuth 2.0 Web Routes
    |--------------------------------------------------------------------------
    |
    | These are part of the Laravel/Socialite
    |
    */
    Route::get('/login', 'auth\AuthenticationController@getLogin')
        ->name('login')
        ->middleware('guest');
    Route::get( '/login/{social}', 'auth\AuthenticationController@getSocialRedirect' )
        ->middleware('guest');
    Route::get( '/login/{social}/callback', 'auth\AuthenticationController@getSocialCallback' )
        ->middleware('guest');
