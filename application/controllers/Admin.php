<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
       $data = array('title' => 'Admin' , 
                    'isi' => 'v_admin',
                );
            $this->load->view('layout/wrapper_admin', $data, FALSE);
            
    }

}

/* End of file Home.php */
