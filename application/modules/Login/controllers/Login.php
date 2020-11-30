<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
		$this->load->library('bcrypt');
		
    }

	public function index()
	{
		$data = [
            'tittle' 		 => 'Administrator',
            
			];
			check_already_login();
		$this->load->view('v_login',$data);
	
	}

	public function logincheck(){
		if (isset($_POST['username']) && isset($_POST['pass'])) {
			
			$username = $this->input->post('username');
			$pass = $this->input->post('pass');
			$hash = $this->bcrypt->hash_password($pass);	//encrypt password

			if(isset($_POST["remember"])){
	        	$hour = time() + 3600 * 24 * 30;
	        	setcookie('admin_username', $username, $hour);
	            setcookie('admin_pass', $pass, $hour);
	        }

			//ambil data dari database
			$check = $this->m_login->prosesLogin($username);
			$hasil = 0;
			if(isset($check)){
				$hasil++;
			}

			//echo $pass;
			//echo "<br>";
			if($hasil > 0){
				$data = $this->m_login->viewDataByID($username); 
				foreach ($data as $dkey) {
					$passDB = $dkey->admin_pass;
					//$role = $dkey->role;
					$foto = $dkey->admin_foto;
					//$idusr = $dkey->id;
				}
				//echo $this->bcrypt->check_password($pass, $passDB);
				if ($this->bcrypt->check_password($pass, $passDB))
				{
					// Password match
					$this->session->set_userdata('userlogin',$username);
					$this->session->set_userdata('admin_foto',$foto);

					redirect(base_url().'Homepage');
					
				}else{
					// Password does not match
					$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Gagal Login, password salah</div>");
					redirect(base_url().'Login');
				}
			}else {
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Gagal Login, username tidak ditemukan</div>");
				redirect(base_url().'Login');
			}
		}
	}

	public function logout()
	{
		$params = array('userlogin', 'admin_id');
		$this->session->unset_userdata($params);
		redirect('Login');
	}

}

/* End of file Login.php */
