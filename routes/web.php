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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@redirectHome');

Route::get('/login', 'Auth\LoginController@showForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::delete('/users/{user}', 'UsuarioController@destroy')->name('user.delete');
Route::post('/users', 'UsuarioController@store')->name('user.store');

Route::get('/view1', 'Views\DisplayController@renderFirstView')->name('view1');
Route::get('/view2', 'Views\DisplayController@renderSecondView')->name('view2');

Route::put('/encrypt/{user}', 'Auth\LoginController@encryptPassword')->name('encrypt');
