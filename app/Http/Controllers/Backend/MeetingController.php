<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\MeetingModel;
use App\Http\Models\CompanyModel;
use App\Http\Models\ContactModel;
use Respose;
use Input;
use Validator;
use Session;
use Route;
use Request;
use Auth;

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

	public function contact_ajax(){
		$company_id = Input::get('company_id');
		$clsContact = new ContactModel();
		$contact = $clsContact->contact_by_company($company_id);
		return response()->json($contact);

	}

	public function postRegist(){
		$clsMeeting = new MeetingModel();
		$validator = Validator::make(Input::all(), $clsMeeting->Rules(), $clsMeeting->Messages());

		if ($validator->fails()) {
			return redirect()->route('backend.meeting.regist')->withErrors($validator)->withInput();
		}

		$data['company_id']             = Input::get('company_id');
		$data['contact_id']             = Input::get('contact_id');
		$data['meeting_title']          = Input::get('meeting_title');
		$data['meeting_detail']         = Input::get('meeting_detail');
		$data['meeting_date']           = Input::get('meeting_date');

		if (Input::hasFile('meeting_file_1')) {
			$mf1 = Input::file('meeting_file_1');
			$mf1_path_name= $mf1->getPathName();
			$_mf1_ext = $mf1->extension();
			$name_mf1 = $mf1->getClientOriginalName();
			$arr_mf1 = explode('.', $name_mf1);
			$mf1_txt_name = $arr_mf1[0];			
			$meeting_file_1 = $mf1_txt_name . '_' . date('Ymd') . rand(time(), '999') . '.' . $_mf1_ext;

			move_uploaded_file($mf1_path_name, base_path() . '/public/uploads/meeting/file1/' . $meeting_file_1);

			$data['meeting_file_1'] = '/uploads/meeting/file1/' . $meeting_file_1;
		}

		if (Input::hasFile('meeting_file_2')) {
			$mf2 = Input::file('meeting_file_2');
			$mf2_path_name= $mf2->getPathName();
			$_mf2_ext = $mf2->extension();
			$name_mf2 = $mf2->getClientOriginalName();
			$arr_mf2 = explode('.', $name_mf2);
			$mf2_txt_name = $arr_mf2[0];			
			$meeting_file_2 = $mf2_txt_name . '_' . date('Ymd') . rand(time(), '888') . '.' . $_mf2_ext;

			move_uploaded_file($mf2_path_name, base_path() . '/public/uploads/meeting/file2/' . $meeting_file_2);

			$data['meeting_file_2'] = '/uploads/meeting/file2/' . $meeting_file_2;
		}

		$data['last_ipadrs']            = CLIENT_IP_ADRS;
		$data['last_date']              = date('Y-m-d H:i:s');
		$data['last_user']              = Auth::user()->u_id;
		$data['last_kind']              = INSERT;

		if ( $clsMeeting->insert($data) ) {
			Session::flash('success', trans('common.msg_regist_success'));
			return redirect()->route('backend.meeting.index');
		} else {
			Session::flash('danger', trans('common.msg_regist_danger'));
			return redirect()->route('backend.meeting.regist')->withInput(Input::all());
		}
	}

	public function edit($id){
		$clsCompany = new CompanyModel();
		$company = $clsCompany->get_list();

		$clsMeeting = new MeetingModel();
		$meeting = $clsMeeting->get_by_id($id);
		return view('backend.meeting.edit', compact('id', 'company', 'meeting'));
	}

	public function postEdit($id){
		$clsMeeting = new MeetingModel();
		$validator = Validator::make(Input::all(), $clsMeeting->Rules(), $clsMeeting->Messages());

		if ($validator->fails()) {
			return redirect()->route('backend.meeting.edit',$id)->withErrors($validator)->withInput();
		}

		$data['company_id']             = Input::get('company_id');
		$data['contact_id']             = Input::get('contact_id');
		$data['meeting_title']          = Input::get('meeting_title');
		$data['meeting_detail']         = Input::get('meeting_detail');
		$data['meeting_date']           = Input::get('meeting_date');

		if(!empty(Input::get('radio_meeting_file_1')) && Input::get('radio_meeting_file_1') == 2){
			if (Input::hasFile('meeting_file_1')) {
				$mf1 = Input::file('meeting_file_1');
				$mf1_path_name= $mf1->getPathName();
				$_mf1_ext = $mf1->extension();
				$name_mf1 = $mf1->getClientOriginalName();
				$arr_mf1 = explode('.', $name_mf1);
				$mf1_txt_name = $arr_mf1[0];			
				$meeting_file_1 = $mf1_txt_name . '_' . rand(time(), '9999') . '.' . $_mf1_ext;

				move_uploaded_file($mf1_path_name, base_path() . '/public/uploads/meeting/file1/' . $meeting_file_1);

				$data['meeting_file_1'] = '/uploads/meeting/file1/' . $meeting_file_1;
			}
		}elseif(!empty(Input::get('radio_meeting_file_1')) && Input::get('radio_meeting_file_1') == 3){
			$data['meeting_file_1'] = NULL;
		}

		if(!empty(Input::get('radio_meeting_file_2')) && Input::get('radio_meeting_file_2') == 2){
			if (Input::hasFile('meeting_file_2')) {
				$mf2 = Input::file('meeting_file_2');
				$mf2_path_name= $mf2->getPathName();
				$_mf2_ext = $mf2->extension();
				$name_mf2 = $mf2->getClientOriginalName();
				$arr_mf2 = explode('.', $name_mf2);
				$mf2_txt_name = $arr_mf2[0];			
				$meeting_file_2 = $mf2_txt_name . '_' . rand(time(), '8888') . '.' . $_mf2_ext;

				move_uploaded_file($mf2_path_name, base_path() . '/public/uploads/meeting/file2/' . $meeting_file_2);

				$data['meeting_file_2'] = '/uploads/meeting/file2/' . $meeting_file_2;
			}
		}elseif(!empty(Input::get('radio_meeting_file_2')) && Input::get('radio_meeting_file_2') == 3){
			$data['meeting_file_2'] = NULL;
		}

		$data['last_ipadrs']            = CLIENT_IP_ADRS;
		$data['last_date']              = date('Y-m-d H:i:s');
		$data['last_user']              = Auth::user()->u_id;
		$data['last_kind']              = UPDATE;

		if ( $clsMeeting->update($id, $data) ) {
			Session::flash('success', trans('common.msg_edit_success'));
			return redirect()->route('backend.meeting.index');
		} else {
			Session::flash('danger', trans('common.msg_edit_danger'));
			return redirect()->route('backend.meeting.edit',$id)->withInput(Input::all());
		}
	}

	public function detail($id){
		$clsMeeting = new MeetingModel();
		$meeting = $clsMeeting->get_by_id($id);
		return view('backend.meeting.detail', compact('meeting'));
	}

	public function delete($id){
		$clsMeeting = new MeetingModel();
		$meeting = $clsMeeting->get_by_id($id);
		return view('backend.meeting.delete', compact('id', 'meeting'));
	}

	public function save_delete($id){
		$clsMeeting = new MeetingModel();
		$data['last_ipadrs']            = CLIENT_IP_ADRS;
		$data['last_date']              = date('Y-m-d H:i:s');
		$data['last_user']              = Auth::user()->u_id;
		$data['last_kind']              = DELETE;

		if ( $clsMeeting->update($id, $data) ) {
			Session::flash('success', trans('common.msg_delete_success'));
			return redirect()->route('backend.meeting.index');
		} else {
			Session::flash('danger', trans('common.msg_delete_danger'));
			return redirect()->route('backend.meeting.delete',$id)->withInput(Input::all());
		}
	}
}