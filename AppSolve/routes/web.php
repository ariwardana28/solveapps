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
    return view('');
});

Route::get('/test','Auth\RegisterController@test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('view','ViewController');
<<<<<<< HEAD

=======
>>>>>>> e3e73b8232195b02d177c39ebd941bf1614e3450
