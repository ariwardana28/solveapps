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
    return view('user.index');
});

Route::get('/test','Auth\RegisterController@test');

Auth::routes();

Route::get('/home', 'viewController@index')->name('home');

Route::get('/homes', 'HomeController@index')->name('homes');

Route::resource('view','ViewController');
 Route::resource('lapor','PesanController');