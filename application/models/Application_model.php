<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Application_model extends MY_Model
{

    // protected $perPage = 5;

    public function getDefaultValues()
    {
        return [
            'first_name'    => '',
            'last_name'     => '',
            'email'         => '',
            'phone'         => '',
            'location'      => '',
            'resume'        => '',
            'cover'         => '',
            'linkedin'      => '',
            'based'         => '',
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'first_name',
                'label'    => 'First Name',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'last_name',
                'label'    => 'Last Name',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'email',
                'label'    => 'Email',
                'rules'    => 'trim|required|valid_email'
            ],
            [
                'field'    => 'phone',
                'label'    => 'Phone',
                'rules'    => 'trim|required|numeric'
            ],
            [
                'field'    => 'location',
                'label'    => 'Location',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'resume',
                'label'    => 'Resume / CV',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'cover',
                'label'    => 'Cover Letter',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'linkedin',
                'label'    => 'Linkedin Profile',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'based',
                'label'    => 'Besed Indonesian',
                'rules'    => 'trim|required'
            ],
        ];

        return $validationRules;
    }
}

/* End of file Application_model.php */