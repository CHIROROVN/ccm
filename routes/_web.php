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
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'manage', 'namespace' => 'Backend'], function () {
	Route::get('/dashboard', ['as' => 'backend.dashboard.index', 'uses' => 'DashboardController@index']);
	Route::get('/users', ['as' => 'backend.users.index', 'uses' => 'UsersController@index']);

});