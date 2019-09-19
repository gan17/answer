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

 Route::get('/info', function () {
     phpinfo();
 });

//ログイン
Auth::routes();

Route::get('system', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('system/login', 'Auth\LoginController@login');
Route::post('system/logout', 'Auth\LoginController@logout')->name('logout');

//アンケート一覧画面
Route::get('system/answers/', 'AnswersController@index');
Route::get('system/answers/', 'AnswersController@list');

//アンケート入力画面
Route::get('/', 'FrontController@index')->name('index');

//確認画面
Route::post('/confirm', 'FrontController@confirm')->name('confirm');

//アンケート保存
Route::post('/', 'FrontController@store')->name('save');

Route::get('home', 'HomeController@index')->name('home');
Route::get('system', 'HomeController@index')->name('home');
Route::post('/system/answers/', 'HomeController@index')->name('home');
