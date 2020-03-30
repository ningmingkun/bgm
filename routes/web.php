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
    return view('index');
});
Route::get('live/index','live\IndexController@index');//登陆视图
//Routt::get('/index','live\LiveController@index');

Route::get('live/reg','live\LiveController@reg');//注册视图
Route::post('live/reg_do','live\LiveController@reg_do');//注册
Route::get('live/login','live\LiveController@login');//登陆视图
Route::post('live/login_do','live\LiveController@login_do');//登陆视图
