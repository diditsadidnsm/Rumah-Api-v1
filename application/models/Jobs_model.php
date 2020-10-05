<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jobs_model extends MY_Model
{

    // protected $perPage = 5;

    public function getDefaultValues()
    {
        return [
            'id_departments' => '',
            'id_employment'  => '',
            'slug'           => '',
            'title'          => '',
            'code'           => '',
            'description'    => '',
            'location'       => '',
            'quotes'         => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'id_departments',
                'label'    => 'Jobs Departments',
                'rules'    => 'required'
            ],
            [
                'field'    => 'id_employment',
                'label'    => 'Jobs Employment',
                'rules'    => 'required'
            ],
            [
                'field'    => 'slug',
                'label'    => 'Slug',
                'rules'    => 'trim|required|callback_unique_slug'
            ],
            [
                'field'    => 'title',
                'label'    => 'Jobs Title',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'code',
                'label'    => 'Jobs Code',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'description',
                'label'    => 'Jobs Description',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'location',
                'label'    => 'Jobs Location',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'quotes',
                'label'    => 'Jobs Quotes',
                'rules'    => 'trim|required'
            ],
        ];

        return $validationRules;
    }
}

/* End of file Jobs_model.php */