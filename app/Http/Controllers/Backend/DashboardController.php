<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;


class DashboardController extends BackendController
{
	public function index(){
		return view('backend.dashboard.index');
	}
}