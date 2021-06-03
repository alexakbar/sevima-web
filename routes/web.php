<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'Website\Auth\AuthController@index')->name('auth.index');
Route::post('/auth', 'Website\Auth\AuthController@dologin')->name('dologin');
Route::get('/logout', 'Website\Auth\AuthController@logout')->name('logout');
