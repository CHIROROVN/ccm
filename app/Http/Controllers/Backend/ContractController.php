<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;


class ContractController extends BackendController
{
	public function index(){
		return view('backend.contract.index');
	}
}