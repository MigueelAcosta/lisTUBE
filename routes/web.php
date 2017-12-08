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
    return view('welcome');
});

Route::get("fun","convertirVideoController@saludo");

Route::get("subirVideo",function (){
    return view("subirvideos");
});

Route::resource("video", "videosController");

Route::get("/guardar","convertirVideoController@subirVideo");

Route::post("/save","convertirVideoController@videoPost");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
