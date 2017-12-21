<?php 
namespace App\Http\Models;
use DB;
use Validator;

class ContractModel {   

    protected $table = 'm_contract';
    protected $primaryKey   = 'contract_id';

   public function Rules()
    {
        return array(
            'contract_no'                      => 'required',
            // 'contract_detail_real'             => 'mimes:pdf,doc', 
            // 'contract_detail'                  => 'mimes:pdf,doc',
            'contract_detail_real'             => 'mimes:csv,xls,xlsx,pdf,doc,docx|max:10000|nullable',
            'contract_detail'                  => 'mimes:csv,xls,xlsx,pdf,doc,docx:max:1000|nullable',
        );
    }

    public function Messages()
    {
        return array(
           'contract_no.required'             => trans('validation.error_contract_no_required'),
           'contract_detail_real.mimes'       => trans('validation.error_contract_detail_real_mimes'),
           'contract_detail_real.max'         => trans('validation.error_contract_detail_real_max'),
           'contract_detail.mimes'            => trans('validation.error_contract_detail_mimes'),
           'contract_detail.max'              => trans('validation.error_contract_detail_max'),
           
        );
    }

    public function get_all()
    {
        return DB::table($this->table)->leftJoin('m_company', 'm_company.company_id', '=', 'm_contract.company_id')
                                     ->where('m_contract.last_kind', '<>', DELETE)->orderBy('contract_id', 'DESC')->paginate(LIMIT_PAGE);
    }

    public function contract_by_company($company_id=null)
    {
        return DB::table($this->table)
            ->where('last_kind', '<>', DELETE)
            ->where('company_id', '=', $company_id)
            ->select('contract_id', 'contract_no')
            ->orderBy('contract_no', 'ASC')
            ->get()->toArray();
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('contract_id', $id)->update($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->leftJoin('m_company', 'm_company.company_id', '=', 'm_contract.company_id')->where('contract_id', $id)->first();
    }

}
