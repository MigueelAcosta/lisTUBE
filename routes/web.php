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
//Rutas videos

Route::get('/','videosController@index');

Route::get('/reproducir',function (){
   return view('Videos.verVideo');
});

Route::get("verVideo/{nombre}",'videosController@verVideo');

Route::get('misVideos','videosController@buscarVideosUsuario')->middleware('auth.basic');

Route::get('/busqueda','videosController@buscarVideosNombre');

Route::get("subirVideo",function (){
    return view("subirvideos");
});

Route::get("/registroLote", function (){
    return view('auth.registarLoteUsuarios');
});

Route::post    ("validarxml", 'controller@validarxml');

Route::resource("video","videosController");

Route::get('getVideo/{video})','videosController@getVideo')->name('getVideo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

