<?php


defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{

    public function Validate($rule)
    {
        $this->form_validation->set_error_delimiters(
            '<small class="form-text text-danger">',
            '</small>'
        );
        $this->form_validation->set_rules($rule);
        return $this->form_validation->run();
    }
}

/* End of file MY_Model.php */
