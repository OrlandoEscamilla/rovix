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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/perfil', function () {
    return view('profile');
});

Route::get('/recursos', function () {
    return view('recursos');
});

Route::get('/buscar', 'MainController@buscar');

Route::resource('resource', 'ResourceController');

Route::get('/login/{provider}', 'LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'LoginController@handleProviderCallback');
Route::get('/logout', 'LoginController@logout');

Route::post('/messages/close/signin', function () {
    session(['Sign-in' => false]);
    return response()->json('OK', 200);
});

Route::post('/star/fav', 'StarController@favHandler');

/*Route::get('sesiones', function (Request $request){
    $request->session()->forget('Sign-in');
});*/