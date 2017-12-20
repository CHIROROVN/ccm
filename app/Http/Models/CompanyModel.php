<?php 
namespace App\Http\Models;
use DB;
use Validator;

class CompanyModel {   

    protected $table = 'm_company';
    protected $primaryKey   = 'company_id';

   public function Rules()
    {
        return array(
            'company_name'                      => 'required',
        );
    }

    public function Messages()
    {
        return array(
            'company_name.required'             => trans('validation.error_company_name_required'),
           
        );
    }

    public function get_all()
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('company_id', 'DESC')->paginate(LIMIT_PAGE);
    }

    public function get_list()
    {
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('company_id', 'ASC')->pluck('company_name', 'company_id')->toArray();
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('company_id', $id)->update($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('company_id', $id)->first();
    }

    public function get_list_contact($company_id)
    {
        return DB::table('m_contact')->where('company_id', $company_id)->get();
    }

    public function get_list_contract($company_id)
    {
        return DB::table('m_contract')->where('company_id', $company_id)->get();
    }

}
