<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Models\UserModel;

use Input;
use Validator;
use Session;
use Hash;
use Route;
use Request;

class UsersController extends BackendController
{
	public function index(){
			echo '<pre>';
			print_r(Route::currentRouteNamed('users'));
			echo '</pre>';
			// echo '<pre>';
			// print_r(Route::getCurrentRoute()->getAction());
			// echo '</pre>';
			// 	echo '<pre>';
			// 	print_r(\Request::route()->getName());
			// 	echo '</pre>';
		return view('backend.users.index');
	}
}