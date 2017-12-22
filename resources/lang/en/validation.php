<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Model User
    |--------------------------------------------------------------------------
    */
    //Login
    'error_u_login_required'              => 'Please enter username.',
    'error_u_passwd_required'             => 'Please enter password.',

    //Users
    'error_u_name_required'               => 'Please enter name.',
    'error_u_login_required'              => 'Please enter username.',
    'error_u_passwd_required'             => 'Please enter password.',
    'error_u_passwd_min'                  => 'The password must be length least 6 characters.',

    'error_company_name_required'         => 'Please enter company name.',

    'error_contact_name_required'         => 'Please enter name.',
    'error_contact_email_required'        => 'Please enter email.',
    'error_contact_email_invalid'         => 'Email is invalid.',
    'error_contact_no_required'           => 'Please enter contract no.',
    'error_contract_detail_real_mimes'    => 'File upload is invalid (doc, pdf).',
    'error_contract_detail_mimes'         => 'File upload is invalid (doc, pdf).',

    //Meeting
    'error_compant_required'              => 'Please enter company name.',
    'error_contact_required'              => 'Please enter contact name.',
    'error_meeting_title_required'        => 'Please enter metting title.',
    'error_meeting_detail_required'       => 'Please enter metting detail.',
    'error_meeting_date_required'         => 'Please enter metting date.',
    'error_meeting_file_1_mimes'          => 'Please only upload file extension: csv,xls,xlsx,pdf,doc,docx.',
    'error_meeting_file_1_max'            => 'The file upload must be less than 10MB.',
    'error_meeting_file_2_mimes'          => 'Please only upload file extension: csv,xls,xlsx,pdf,doc,docx.',
    'error_meeting_file_2_max'            => 'The file upload must be less than 10MB.',

    //Contract
    'error_contract_no_required'          => 'Please enter Contract No.',
    'error_contract_detail_real_mimes'    => 'Please only upload file extension: csv,xls,xlsx,pdf,doc,docx.',
    'error_contract_detail_mimes'         => 'Please only upload file extension: csv,xls,xlsx,pdf,doc,docx.',
    'error_contract_term'                 => 'End date in contract term should be greater than Start date.',  
    
];
