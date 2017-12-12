<?php 
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Auth;
use App\Http\Models\CompanyModel;

use Session;
use Config;

class CompanyController extends BackendController
{
	
	public function __construct()
    {
      /*  parent::__construct();
        $this->middleware('auth');*/
    }
	
	public function index(){
		$data =array();
		$clsCompany          = new CompanyModel();
        $data['companies']    = $clsCompany->get_all();               
		return view('backend.company.index',$data);
	}

	public function getRegist(){
        $data =array();
        $data['error']['error_company_name_required']    = trans('validation.error_company_name_required');        
		return view('backend.company.regist',$data);
	}

	public function postRegist()
    {
        $clsCompany      = new CompanyModel();
        $inputs         = Input::all();
        $validator      = Validator::make($inputs, $clsCompany->Rules(), $clsCompany->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.company.regist')->withErrors($validator)->withInput();
        }       
        // insert
        $max = $clsCompany->get_max();
        $dataInsert             = array(
            'company_name'      => Input::get('company_name'),
            'company_address'   => Input::get('company_address'),          
            'company_mst'       => Input::get('company_mst'),
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => INSERT,
            'last_ipadrs'       => CLIENT_IP_ADRS,
            'last_user'         => Auth::user()->u_id            
        );
        
        if ( $clsCompany->insert($dataInsert) ) {
            Session::flash('success', trans('common.msg_regist_success'));
        } else {
            Session::flash('danger', trans('common.msg_regist_danger'));
        }
        return redirect()->route('backend.company.index');
    }

    /**
     * 
     */
    public function getEdit($id)
    {
        $clsCompany          = new CompanyModel();
        $data['belong']     = $clsCompany->get_by_id($id);
        $data['error']['error_company_name_required']    = trans('validation.error_company_name_required');
       
        return view('backend.company.edit', $data);
    }

    /**
     * 
     */
    public function postEdit($id)
    {
        $clsCompany      = new CompanyModel();
        $inputs         = Input::all();
        $validator      = Validator::make($inputs, $clsCompany->Rules(), $clsCompany->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.company.edit', [$id])->withErrors($validator)->withInput();
        }
        $belong = $clsCompany->get_by_belong_code(Input::get('belong_code'));
        if(isset($belong->belong_id) && $belong->belong_id != $id){
            $error['belong_code']      = trans('validation.error_belong_code_unique');  
            return redirect()->route('backend.company.edit', [$id])->withErrors($error)->withInput();
        }
        // update
        $dataUpdate = array(
            'company_name'      => Input::get('company_name'),
            'company_address'   => Input::get('company_address'),          
            'company_mst'       => Input::get('company_mst'),
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => Auth::user()->u_id 
        );

        if ( $clsCompany->update($id, $dataUpdate) ) {
            Session::flash('success', trans('common.msg_edit_success'));
        } else {
            Session::flash('danger', trans('common.msg_edit_danger'));
        }
        return redirect()->route('backend.company.index');
    }

    /**
     * 
     */
    public function getDelete($id)
    {
        $clsCompany              = new CompanyModel();
        $dataUpdate             = array(
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => Auth::user()->u_id 
        );
        if ( $clsCompany->delete($id, $dataUpdate) ) {
            Session::flash('success', trans('common.msg_delete_success'));
        } else {
            Session::flash('danger', trans('common.msg_delete_danger'));
        }
        return redirect()->route('backend.company.index');
    }   
    
}