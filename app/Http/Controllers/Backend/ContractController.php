<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Auth;
use App\Http\Models\ContractModel;
use App\Http\Models\CompanyModel;
use Validator;
use Input;
use Session;
use Config;


class ContractController extends BackendController
{
	public function index(){
		$data =array();
		$clsContract          = new ContractModel();
        $data['contracts']    = $clsContract->get_all();               
		return view('backend.contract.index',$data);
	}

	public function getRegist(){
        $data =array();        
        $data['error']['error_contract_no_required']    = trans('validation.error_contract_no_required');        
        $clsCompany      = new CompanyModel();
        $data['companies'] = $clsCompany->get_all();
		return view('backend.contract.regist',$data);
	}

	public function postRegist()
    {
        $clsContract      = new ContractModel();
        $inputs         = Input::all();
        $validator      = Validator::make($inputs, $clsContract->Rules(), $clsContract->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.contract.regist')->withErrors($validator)->withInput();
        }       
        // insert        
        $dataInsert             = array(
            'contract_no'      => Input::get('contract_no'),
            'company_id'        => Input::get('company_id'),
            'contract_term'     => Input::get('contract_term'),           
            'contract_detail_real'       => Input::get('contract_detail_real'),
            'contract_detail'     => Input::get('contract_detail'),
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => INSERT,
            'last_ipadrs'       => CLIENT_IP_ADRS,
            'last_user'         => Auth::user()->u_id            
                        
        );
        
        if ( $clsContract->insert($dataInsert) ) {
            Session::flash('success', trans('common.msg_regist_success'));
        } else {
            Session::flash('danger', trans('common.msg_regist_danger'));
        }
        return redirect()->route('backend.contract.index');
    }

    /**
     * 
     */
    public function getEdit($id)
    {
        $clsContract          = new ContractModel();
        $clsCompany      = new CompanyModel();
        $data['companies'] = $clsCompany->get_all();
        $data['contract']     = $clsContract->get_by_id($id);
        $data['error']['error_contract_no_required']    = trans('validation.error_contract_no_required');       
        return view('backend.contract.edit', $data);
    }

    /**
     * 
     */
    public function postEdit($id)
    {
        $clsContract      = new ContractModel();
        $inputs         = Input::all();
        $validator      = Validator::make($inputs, $clsContract->Rules(), $clsContract->Messages());        
        if ($validator->fails()) {
            return redirect()->route('backend.contract.edit', [$id])->withErrors($validator)->withInput();
        }       
        // update
        $dataUpdate = array(
            'contract_no'      => Input::get('contract_no'),
            'company_id'        => Input::get('company_id'),
            'contract_term'     => Input::get('contract_term'),           
            'contract_detail_real'       => Input::get('contract_detail_real'),
            'contract_detail'     => Input::get('contract_detail'),
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => Auth::user()->u_id 
        );

        if ( $clsContract->update($id, $dataUpdate) ) {
            Session::flash('success', trans('common.msg_edit_success'));
        } else {
            Session::flash('danger', trans('common.msg_edit_danger'));
        }
        return redirect()->route('backend.contract.index');
    }

    /**
     * 
     */
    public function getDelete($id)
    {
        $clsContract              = new ContractModel();
        $dataUpdate             = array(
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => Auth::user()->u_id 
        );
        if ( $clsContract->update($id, $dataUpdate) ) {
            Session::flash('success', trans('common.msg_delete_success'));
        } else {
            Session::flash('danger', trans('common.msg_delete_danger'));
        }
        return redirect()->route('backend.contract.index');
    } 
}