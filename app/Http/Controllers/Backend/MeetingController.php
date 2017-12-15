<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\MeetingModel;
use App\Http\Models\CompanyModel;


class MeetingController extends BackendController
{
	public function index(){
		$clsMeeting = new MeetingModel();
		$meetings = $clsMeeting->get_all();
		return view('backend.meeting.index', compact('meetings'));
	}

	public function regist(){
		$clsCompany = new CompanyModel();
		$company = $clsCompany->get_list();
		return view('backend.meeting.regist', compact('company'));
	}

	public function postRegist(){
		
	}

	public function edit(){
		return view('backend.meeting.edit');
	}

	public function postEdit(){
		
	}

	public function detail(){
		return view('backend.meeting.detail');
	}

	public function delete(){
		return view('backend.meeting.delete');
	}
}