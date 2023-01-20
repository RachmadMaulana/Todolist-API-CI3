<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

    public function index()
    {

        if ($this->session->userdata('is_login')) {
            redirect('todolist');
        }

        $rule = $this->login->validationRule();
        $validate = $this->login->Validate($rule);

        if (!$validate) {
            $data['judul'] = 'Login';
            $data['page'] = 'auth/v_login';
            $this->view($data);
        } else {
            $input = (object)$this->input->post(null, true);
            $login = $this->login->run($input);

            if ($login) {
                redirect('todolist');
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah');
                redirect('auth');
            }
        }
    }

    public function register()
    {
        $rule = $this->register->validationRule();
        $validate = $this->register->Validate($rule);

        if ($validate) {

            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->db->insert('user', $data);

            $this->session->set_flashdata('success', 'Berhasil Registrasi');
            redirect('auth');
        }

        $data['judul'] = 'Register';
        $data['page'] = 'auth/v_register';
        $this->view($data);
    }
}

/* End of file Login.php */
