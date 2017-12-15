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
            //'contact_email'                      => 'required',
        );
    }

    public function Messages()
    {
        return array(
           'contract_no.required'             => trans('validation.error_contract_no_required'),
           //'contact_email.required'             => trans('validation.error_contact_email_required'),
           
        );
    }

    public function get_all()
    {
        return DB::table($this->table)->leftJoin('m_company', 'm_company.company_id', '=', 'm_contract.company_id')
                                     ->where('m_contract.last_kind', '<>', DELETE)->orderBy('contract_id', 'DESC')->get();
    }

    public function contract_by_company($company_id=null)
    {
        return DB::table($this->table)
            ->where('last_kind', '<>', DELETE)
            ->where('company_id', '=', $company_id)
            ->orderBy('contract_no', 'ASC')
            ->pluck('contract_no', 'contract_id')
            ->toArray();
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
        return DB::table($this->table)->where('contract_id', $id)->first();
    }

}
