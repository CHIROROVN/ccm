<?php  namespace App\Http\Models;

use DB;
use Validator;

class MeetingModel {
    protected $table = 'm_meeting';
    protected $primaryKey   = 'meeting_id';

   public function Rules()
    {
        return array(
            'company_id'                        => 'required',
            'contact_id'                        => 'required',
            'meeting_title'                     => 'required',
            'meeting_detail'                    => 'required',
            'meeting_file_1'                    => 'nullable|mimes:csv,xls,xlsx,pdf,doc,docx,txt',
            'meeting_file_2'                    => 'nullable|mimes:csv,xls,xlsx,pdf,doc,docx,txt',
            'meeting_date'                      => 'required'
        );
    }

    public function Messages()
    {
        return array(
           'company_id.required'                => trans('validation.error_company_required'),
           'contact_id.required'                => trans('validation.error_contact_required'),
           'meeting_title.required'             => trans('validation.error_meeting_title_required'),
           'meeting_detail.required'            => trans('validation.error_meeting_detail_required'),
           'meeting_file_1.required'            => trans('validation.error_meeting_file_1_mimes'),
           'meeting_file_2.required'            => trans('validation.error_meeting_file_2_mimes'),
           'meeting_date.required'              => trans('validation.error_meeting_date_required')           
        );
    }

    public function get_all()
    {
        return DB::table($this->table)
            ->leftJoin('m_company', 'm_meeting.company_id', '=', 'm_company.company_id')
            ->leftJoin('m_contract', 'm_meeting.contact_id', '=', 'm_contract.contract_id')
            ->where('m_meeting.last_kind', '<>', DELETE)
            ->select('m_meeting.*', 'm_company.company_name', 'm_contract.contract_no')
            ->orderBy('meeting_id', 'DESC')->get();
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('meeting_id', $id)->update($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('meeting_id', $id)->first();
    }

}
