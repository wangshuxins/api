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
Route::get("hide","SignController@hide");
//h5
Route::any("/log","Index\LoginController@login");
Route::any("/reg","Index\LoginController@register");
Route::get("/error","Index\ErrorController@error");
Route::get("/setting","Index\SettingController@setting");
Route::get("/about","Index\AboutController@about");
Route::get("/contact","Index\ContactController@contact");
Route::get("/order/{goods_total}","Index\OrderController@order");
Route::get("/pay","Index\OrderController@pay");
Route::get("/car","Index\CarController@car");
Route::get("/detail/{goods_id}","Index\DetailController@detail");
Route::get("/oauth/github","Index\GithubController@git");
Route::get("/","Index\IndexController@index");



