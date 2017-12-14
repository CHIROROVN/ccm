<?php 
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Auth;
use App\Http\Models\ContactModel;
use App\Http\Models\CompanyModel;
use Validator;
use Input;
use Session;
use Config;

class ContactController extends BackendController
{	
	
	public function index(){
		$data =array();
		$clsContact          = new ContactModel();
        $data['contacts']    = $clsContact->get_all();               
		return view('backend.contact.index',$data);
	}

	public function getRegist(){
        $data =array();        
        $data['error']['error_contact_name_required']    = trans('validation.error_contact_name_required');        
        $clsCompany      = new CompanyModel();
        $data['companies'] = $clsCompany->get_all();
		return view('backend.contact.regist',$data);
	}

	public function postRegist()
    {
        $clsContact      = new ContactModel();
        $inputs         = Input::all();
        $validator      = Validator::make($inputs, $clsContact->Rules(), $clsContact->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.contact.regist')->withErrors($validator)->withInput();
        }       
        // insert        
        $dataInsert             = array(
            'contact_name'      => Input::get('contact_name'),
            'contact_email'     => Input::get('contact_email'),           
            'contact_tel'       => Input::get('contact_tel'),
            'contact_title'     => Input::get('contact_title'),
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => INSERT,
            'last_ipadrs'       => CLIENT_IP_ADRS,
            'last_user'         => Auth::user()->u_id            
                        
        );
        
        if ( $clsContact->insert($dataInsert) ) {
            Session::flash('success', trans('common.msg_regist_success'));
        } else {
            Session::flash('danger', trans('common.msg_regist_danger'));
        }
        return redirect()->route('backend.contact.index');
    }

    /**
     * 
     */
    public function getEdit($id)
    {
        $clsContact          = new ContactModel();
        $data['contact']     = $clsContact->get_by_id($id);
        $data['error']['error_contact_name_required']    = trans('validation.error_contact_name_required');       
        return view('backend.contact.edit', $data);
    }

    /**
     * 
     */
    public function postEdit($id)
    {
        $clsContact      = new ContactModel();
        $inputs         = Input::all();
        $validator      = Validator::make($inputs, $clsContact->Rules(), $clsContact->Messages());        
        if ($validator->fails()) {
            return redirect()->route('backend.contact.edit', [$id])->withErrors($validator)->withInput();
        }       
        // update
        $dataUpdate = array(
            'contact_name'      => Input::get('contact_name'),
            'contact_email'     => Input::get('contact_email'),           
            'contact_tel'       => Input::get('contact_tel'),
            'contact_title'       => Input::get('contact_title'),
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => Auth::user()->u_id 
        );

        if ( $clsContact->update($id, $dataUpdate) ) {
            Session::flash('success', trans('common.msg_edit_success'));
        } else {
            Session::flash('danger', trans('common.msg_edit_danger'));
        }
        return redirect()->route('backend.contact.index');
    }

    /**
     * 
     */
    public function getDelete($id)
    {
        $clsContact              = new ContactModel();
        $dataUpdate             = array(
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => Auth::user()->u_id 
        );
        if ( $clsContact->update($id, $dataUpdate) ) {
            Session::flash('success', trans('common.msg_delete_success'));
        } else {
            Session::flash('danger', trans('common.msg_delete_danger'));
        }
        return redirect()->route('backend.contact.index');
    }   
    
}