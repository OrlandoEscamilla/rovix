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

use App\Type;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/recursos', function(){
    return view('recursos');
});

Route::get('/perfil', function(){
    return view('profile');
});

Route::get('/buscar', 'MainController@buscar');

Route::get('/types', function (){
    $tipos = Type::all();
    dd($tipos);
});

