<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends MY_Model
{

    protected $table = 'user';

    public function validationRule()
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[4]'
            ],
        ];
    }

    public function run($input)
    {

        $user = $this->db->get_where($this->table, ['email' => $input->email])->row_array();

        if ($user) {
            if (password_verify($input->password, $user['password'])) {
                $sess_data = [
                    'name' => $user['nama'],
                    'email' => $user['email'],
                    'user_id' => $user['id'],
                    'is_login' => true
                ];
                $this->session->set_userdata($sess_data);
                return true;
            }
        }
    }
}

/* End of file .php */
