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

 Route::get('/', 'FrontController@index')->name('index');
 Route::post('/confirm', 'FrontController@confirm')->name('confirm');
 Route::get('/create', 'FrontController@create');
 Route::post('/', 'FrontController@store')->name('save');

//ログイン
Auth::routes();

Route::get('system', 'Auth\LoginController@showLoginForm')->name('system');
Route::post('system/login', 'Auth\LoginController@login');
Route::post('system/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/system/answers', 'AnswersController@index');
Route::get('/system/answers/{id}', 'AnswersController@show');
Route::delete('/system/answers/{id}', 'AnswersController@destroy');
Route::delete('answersDeleteAll', 'AnswersController@deleteAll');

Route::resource('/system/answers','AnswersController');
