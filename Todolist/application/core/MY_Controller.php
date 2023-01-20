<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function view($data){
        $this->load->view('layouts/app',$data);
    }

}

/* End of file MY_Controller.php */
