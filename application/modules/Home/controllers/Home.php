<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->template->load('v_home','v_produk');
        
    }

}

/* End of file Home.php */


?>