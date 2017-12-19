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
        $data['error']['error_contact_no_required']    = trans('validation.error_contact_no_required');        
        $clsCompany      = new CompanyModel();
        $data['companies'] = $clsCompany->get_all();
		return view('backend.contract.regist',$data);
	}

	public function postRegist()
    {
        $clsContract      = new ContractModel();
        $inputs         = Input::all();        
        $path           ='/uploads/contracts/'; 
        $rules                  = $clsContract->Rules();
        if(!Input::hasFile('contract_detail_real')){
            unset($rules['contract_detail_real']);                        
        }else{
            $upload_file = Input::file('contract_detail_real');
            $extFile  = $upload_file->getClientOriginalExtension();
            if($extFile == 'pdf' || $extFile == 'doc'){
                unset($rules['contract_detail_real']);
            }
            $fn = 'contract_detail_real_'.date("y_m_d_his").'.'.$extFile;
            $upload_file->move(public_path().$path, $fn);
            $contract_detail_real = $path.$fn;
        } 
        if(!Input::hasFile('contract_detail')){
            unset($rules['contract_detail']);                        
        }else{
            $upload_file = Input::file('contract_detail_real');
            $extFile  = $upload_file->getClientOriginalExtension();
            if($extFile == 'pdf' || $extFile == 'doc'){
                unset($rules['contract_detail']);
            }
            $fn = 'contract_detail_'.date("y_m_d_his").'.'.$extFile;
            $upload_file->move(public_path().$path, $fn);
            $contract_detail = $path.$fn;
        } 
        $validator      = Validator::make($inputs, $rules, $clsContract->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.contract.regist')->withErrors($validator)->withInput();
        }       
        // insert        
        $dataInsert                 = array(
            'contract_no'           => Input::get('contract_no'),
            'company_id'            => Input::get('company_id'),
            'contract_term_from'    => Input::get('contract_term_from'), 
            'contract_term_to'      => Input::get('contract_term_to'),           
            'contract_detail_real'  => (isset($contract_detail_real) && !empty($contract_detail_real))?$contract_detail_real:NULL,
            'contract_detail'       => (isset($contract_detail) && !empty($contract_detail))?$contract_detail:NULL,
            'contract_price'        => Input::get('contract_price'), 
            'contract_vat'          => Input::get('contract_vat'), 
            'bill_received_date'    => Input::get('bill_received_date'), 
            'bill_date'             => Input::get('bill_date'), 
            'bill_no'               => Input::get('bill_no'),
            'last_date'             => date('Y-m-d H:i:s'),
            'last_kind'             => INSERT,
            'last_ipadrs'           => CLIENT_IP_ADRS,
            'last_user'             => Auth::user()->u_id            
                        
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
        $clsContract            = new ContractModel();
        $clsCompany             = new CompanyModel();
        $data['companies']      = $clsCompany->get_all();
        $data['contract']       = $clsContract->get_by_id($id);
        $data['error']['error_contract_no_required']    = trans('validation.error_contract_no_required');       
        return view('backend.contract.edit', $data);
    }

    /**
     * 
     */
    public function postEdit($id)
    {
        $clsContract        = new ContractModel();
        $inputs             = Input::all();
        $path               ='/uploads/contracts/'; 
        $rules              = $clsContract->Rules();
        
        if(!Input::hasFile('contract_detail_real')){
            unset($rules['contract_detail_real']);                        
        }else{
            $upload_file = Input::file('contract_detail_real');
            $extFile  = $upload_file->getClientOriginalExtension();
            if($extFile == 'pdf' || $extFile == 'doc'){
                unset($rules['contract_detail_real']);
            }
            $fn = 'contract_detail_real_'.date("y_m_d_his").'.'.$extFile;
            $upload_file->move(public_path().$path, $fn);
            $contract_detail_real = $path.$fn;
        } 
        if(!Input::hasFile('contract_detail')){
            unset($rules['contract_detail']);                        
        }else{
            $upload_file = Input::file('contract_detail_real');
            $extFile  = $upload_file->getClientOriginalExtension();
            if($extFile == 'pdf' || $extFile == 'doc'){
                unset($rules['contract_detail']);
            }
            $fn = 'contract_detail_'.date("y_m_d_his").'.'.$extFile;
            $upload_file->move(public_path().$path, $fn);
            $contract_detail = $path.$fn;
        } 
        $validator      = Validator::make($inputs, $rules, $clsContract->Messages());      
        if ($validator->fails()) {
            return redirect()->route('backend.contract.edit', [$id])->withErrors($validator)->withInput();
        }       
        // update
        $dataUpdate = array(
            'contract_no'           => Input::get('contract_no'),
            'company_id'            => Input::get('company_id'),
            'contract_term_from'    => Input::get('contract_term_from'), 
            'contract_term_to'      => Input::get('contract_term_to'),            
            'contract_detail_real'  => Input::get('contract_detail_real'),
            'contract_detail'       => Input::get('contract_detail'),
            'contract_price'        => Input::get('contract_price'), 
            'contract_vat'          => Input::get('contract_vat'), 
            'bill_received_date'    => Input::get('bill_received_date'), 
            'bill_date'             => Input::get('bill_date'), 
            'bill_no'               => Input::get('bill_no'),
            'last_date'             => date('Y-m-d H:i:s'),
            'last_kind'             => UPDATE,
            'last_ipadrs'           => $_SERVER['REMOTE_ADDR'],
            'last_user'             => Auth::user()->u_id 
        );
       

        if ( $clsContract->update($id, $dataUpdate) ) {
          Session::flash('success', trans('common.msg_edit_success'));
        } else {
          Session::flash('danger', trans('common.msg_edit_danger'));
        }
        return redirect()->route('backend.contract.index');
    }

    public function detail($id){
        $clsContract         = new ContractModel();
        $contract             = $clsContract->get_by_id($id);
        return view('backend.contract.detail', compact('contract'));
    }

    /**
     * 
     */
    public function getDelete($id)
    {
        $clsContract            = new ContractModel();
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