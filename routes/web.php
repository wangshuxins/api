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
Route::get("test","TestController@test");
Route::get("test1","TestController@test1");
Route::get("test2","TestController@test2");
Route::post("test3","TestController@test3");
Route::get("test4","TestController@test4");
Route::get("test5","TestController@test5");
Route::any("dersa","TestController@dersa");
Route::any("/decrypt","TestController@decrypt");
//登陆
Route::post("/login","LoginController@login");
Route::post("/register","LoginController@register");
Route::get("/center","LoginController@center")->middleware("token");
Route::get("sign","SignController@sign");
Route::get("sign1","SignController@sign1");

