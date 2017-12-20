<?php 
namespace App\Http\Models;
use DB;
use Validator;

class ContactModel {   

    protected $table = 'm_contact';
    protected $primaryKey   = 'contact_id';

   public function Rules()
    {
        return array(
            'contact_name'                      => 'required',
            'contact_email'                      => 'required',
        );
    }

    public function Messages()
    {
        return array(
           'contact_name.required'             => trans('validation.error_contact_name_required'),
           'contact_email.required'             => trans('validation.error_contact_email_required'),
           
        );
    }

    public function get_all()
    {
        return DB::table($this->table)->leftJoin('m_company', 'm_company.company_id', '=', 'm_contact.company_id')
                                     ->where('m_contact.last_kind', '<>', DELETE)->orderBy('contact_id', 'DESC')->paginate(LIMIT_PAGE);
    }

    public function contact_by_company($company_id=null)
    {
        return DB::table($this->table)
            ->where('last_kind', '<>', DELETE)
            ->where('company_id', '=', $company_id)
            ->select('contact_id', 'contact_name')
            ->orderBy('contact_name', 'ASC')
            ->get()->toArray();
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('contact_id', $id)->update($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->leftJoin('m_company', 'm_company.company_id', '=', 'm_contact.company_id')->where('contact_id', $id)->first();
    }

}
