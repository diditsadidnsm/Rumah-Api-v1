<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Departments_model extends MY_Model
{

    protected $perPage = 5;

    public function getDefaultValues()
    {
        return [
            'id'     => '',
            'title'  => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'title',
                'label'    => 'Job Departments',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }
}

/* End of file Departments_model.php */