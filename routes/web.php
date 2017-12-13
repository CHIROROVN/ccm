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
	
	Route::get('/company', ['as' => 'backend.company.index', 'uses' => 'CompanyController@index']);
	Route::get('/company/regist', ['as' => 'backend.company.regist', 'uses' => 'CompanyController@getRegist']);
    Route::post('/company/regist', ['as' => 'backend.company.regist', 'uses' => 'CompanyController@postRegist']);
	Route::get('/company/edit/{id}', ['as' => 'backend.company.edit', 'uses' => 'CompanyController@getEdit']);
	Route::post('/company/edit/{id}', ['as' => 'backend.company.edit', 'uses' => 'CompanyController@postEdit']);
	Route::get('/company/delete/{id}', ['as' => 'backend.company.delete', 'uses' => 'CompanyController@getDelete']);

	Route::get('/meeting', ['as' => 'backend.meeting.index', 'uses' => 'MeetingController@index']);
	Route::get('/contract', ['as' => 'backend.contract.index', 'uses' => 'ContractController@index']);

});
