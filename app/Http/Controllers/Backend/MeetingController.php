<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;


class MeetingController extends BackendController
{
	public function index(){
		return view('backend.meeting.index');
	}
}