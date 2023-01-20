<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_register extends MY_Model
{

    public function validationRule()
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|is_unique[user.email]'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required|min_length[4]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[4]|matches[password2]'
            ],
            [
                'field' => 'password2',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[4]|matches[password]'
            ]
        ];
    }
}

/* End of file .php */
