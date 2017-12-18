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
	Route::get('/users/login', ['as' => 'backend.users.login', 'uses' => 'UsersController@login']);
	Route::post('/users/login', ['as' => 'backend.users.login', 'uses' => 'UsersController@postLogin']);
	Route::get('/users/logout', ['as' => 'backend.users.logout', 'uses' => 'UsersController@logout']);

	Route::get('/users/regist', ['as' => 'backend.users.regist', 'uses' => 'UsersController@regist']);
	Route::post('/users/regist', ['as' => 'backend.users.regist', 'uses' => 'UsersController@postRegist']);
	Route::get('/users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UsersController@edit']);
	Route::post('/users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UsersController@postEdit']);
	Route::get('/users/delete/{id}', ['as' => 'backend.users.delete', 'uses' => 'UsersController@delete']);
	Route::get('/users/detail/{id}', ['as' => 'backend.users.detail', 'uses' => 'UsersController@detail']);
	
	Route::get('/company', ['as' => 'backend.company.index', 'uses' => 'CompanyController@index']);
	Route::get('/company/regist', ['as' => 'backend.company.regist', 'uses' => 'CompanyController@getRegist']);
    Route::post('/company/regist', ['as' => 'backend.company.regist', 'uses' => 'CompanyController@postRegist']);
	Route::get('/company/edit/{id}', ['as' => 'backend.company.edit', 'uses' => 'CompanyController@getEdit']);
	Route::post('/company/edit/{id}', ['as' => 'backend.company.edit', 'uses' => 'CompanyController@postEdit']);
	Route::get('/company/delete/{id}', ['as' => 'backend.company.delete', 'uses' => 'CompanyController@getDelete']);

	Route::get('/contact', ['as' => 'backend.contact.index', 'uses' => 'ContactController@index']);
	Route::get('/contact/regist', ['as' => 'backend.contact.regist', 'uses' => 'ContactController@getRegist']);
    Route::post('/contact/regist', ['as' => 'backend.contact.regist', 'uses' => 'ContactController@postRegist']);
	Route::get('/contact/edit/{id}', ['as' => 'backend.contact.edit', 'uses' => 'ContactController@getEdit']);
	Route::post('/contact/edit/{id}', ['as' => 'backend.contact.edit', 'uses' => 'ContactController@postEdit']);
	Route::get('/contact/delete/{id}', ['as' => 'backend.contact.delete', 'uses' => 'ContactController@getDelete']);

	Route::get('/contract', ['as' => 'backend.contract.index', 'uses' => 'ContractController@index']);
	Route::get('/contract/regist', ['as' => 'backend.contract.regist', 'uses' => 'ContractController@getRegist']);
    Route::post('/contract/regist', ['as' => 'backend.contract.regist', 'uses' => 'ContractController@postRegist']);
	Route::get('/contract/edit/{id}', ['as' => 'backend.contract.edit', 'uses' => 'ContractController@getEdit']);
	Route::post('/contract/edit/{id}', ['as' => 'backend.contract.edit', 'uses' => 'ContractController@postEdit']);
	Route::get('/contract/delete/{id}', ['as' => 'backend.contract.delete', 'uses' => 'ContractController@getDelete']);

	Route::get('/meeting', ['as' => 'backend.meeting.index', 'uses' => 'MeetingController@index']);
	Route::get('/meeting/regist', ['as' => 'backend.meeting.regist', 'uses' => 'MeetingController@regist']);
	Route::post('/meeting/regist', ['as' => 'backend.meeting.regist', 'uses' => 'MeetingController@postRegist']);
	Route::get('/meeting/edit/{id}', ['as' => 'backend.meeting.edit', 'uses' => 'MeetingController@edit']);
	Route::post('/meeting/edit/{id}', ['as' => 'backend.meeting.edit', 'uses' => 'MeetingController@postEdit']);
	Route::get('/meeting/detail/{id}', ['as' => 'backend.meeting.detail', 'uses' => 'MeetingController@detail']);
	Route::get('/meeting/delete/{id}', ['as' => 'backend.meeting.delete', 'uses' => 'MeetingController@delete']);
	Route::get('/meeting/save_delete/{id}', ['as' => 'backend.meeting.save_delete', 'uses' => 'MeetingController@save_delete']);
	Route::get('/meetings/contact_ajax', ['as' => 'backend.meeting.contact_ajax', 'uses' => 'MeetingController@contact_ajax']);
	

});

Route::get('/', function(){
	return redirect()->route('backend.users.login');
});

Route::get('/login', function(){
	return redirect()->route('backend.users.login');
});

Route::get('/manage', function(){
	return redirect()->route('backend.users.login');
});

Route::get('/manage/login', function(){
	return redirect()->route('backend.users.login');
});

Route::get('/users/login', function(){
	return redirect()->route('backend.users.login');
});

if(Auth::check()){
	return redirect()->route('backend.dashboard.index');
}else{
	return redirect()->route('backend.users.login');
}

Auth::routes();
