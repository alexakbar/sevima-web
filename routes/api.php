<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
  Route::post('login', 'API\AUTH\AuthController@Login');
  Route::post('register', 'API\AUTH\AuthController@Register');
  Route::group([
        'middleware' => 'auth:api'
    ], function () {
      Route::group(['as' => 'post.', 'prefix' => '/post'], function () {
        Route::get('/', 'API\Post\PostController@index')->name('index');
        Route::post('/store', 'API\Post\PostController@store')->name('created');
        Route::post('/edit/{id}', 'API\Post\PostController@edit')->name('edit');
        Route::post('/update/{id}', 'API\Post\PostController@update')->name('update');
        Route::post('/destroy/{id}', 'API\Post\PostController@destroy')->name('destroy');
        Route::post('/like','API\Post\PostController@Like')->name('like');
        Route::post('/unlike','API\Post\PostController@UnLike')->name('unlike');
        Route::post('/comment','API\Post\PostController@Comment')->name('comment');
      });

      Route::group(['as' => 'profile.', 'prefix' => '/profile'], function () {
        Route::get('/', 'API\Profile\ProfileController@Profile')->name('profile');
        Route::get('/gallery', 'API\Profile\ProfileController@Gallery')->name('gallery');
      });
  });
});
