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

Route::get('/', 'WelcomeController@index');

Route::get('/users/create', 'UsersController@create');
Route::post('/users', 'UsersController@store');
Route::get('/login', 'CustomLoginController@show')
    ->name('login');
Route::post('/login', 'CustomLoginController@login');
Route::get('/logout', 'CustomLoginController@logout');
Route::get('/tweets/create', 'TweetsController@create')
    ->middleware('auth');
Route::post('/tweets', 'TweetsController@store')
    ->middleware('auth');