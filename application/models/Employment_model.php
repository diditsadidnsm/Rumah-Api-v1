<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employment_model extends MY_Model
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
                'label'    => 'Job Employment',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }
}

/* End of file Employment_model.php */