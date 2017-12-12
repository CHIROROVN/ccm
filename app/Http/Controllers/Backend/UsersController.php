<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Models\UserModel;

use Input;
use Validator;
use Session;
use Hash;

class UsersController extends BackendController
{
	public function index(){
		return view('backend.users.index');
	}
}