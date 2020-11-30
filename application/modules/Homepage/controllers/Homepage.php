<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('userlogin'))
        {
            $pemberitahuan = "<div class='alert alert-warning'>Anda harus login dulu </div>"
            ;
            $this->session->set_flashdata('pesan', $pemberitahuan);
            redirect('Login');
        }
    }
    

    public function index()
    {
        $this->template->load('template','Homepage/dashboard');
    }

   
}

/* End of file Home.php */
