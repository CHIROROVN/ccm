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
		return view('backend.users.index');
	}

	public function login(){
		if(Auth::check()) return redirect()->route('backend.dashboard.index');
		return view('backend.users.login');
	}

	public function postLogin(){
		$clsUser            = new UserModel();
		$validator = Validator::make(Input::all(), $clsUser->RulesLogin(), $clsUser->MessagesLogin());

		if ($validator->fails()) {
			return redirect()->route('backend.users.login')->withErrors($validator)->withInput();
		}
		//last_kind insert
		$login1['u_login'] =  Input::get('u_login');
		$login1['password'] =  Input::get('u_passwd');
		$login1['last_kind'] =  INSERT;

		//last_kind update
		$login2['u_login'] =  Input::get('u_login');
		$login2['password'] =  Input::get('u_passwd');
		$login2['last_kind'] =  UPDATE;

		if (Auth::attempt($login1, false) || Auth::attempt($login2, false)) {
			return redirect()->route('backend.dashboard.index');
		}  else {
			Session::flash('danger', trans('common.msg_manage_login_danger'));
			return redirect()->route('backend.users.login')->withErrors($validator)->withInput();
		}
	}

	public function logout()
	{
		Auth::logout();
		Session::flush();
		return redirect()->route('backend.users.login');
	}


}