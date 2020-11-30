<?php

Class Fungsi {

	protected $ci;

	function __construct() {
		$this->ci =& get_instance();
	}

	function user_login() {
		$this->ci->load->model('M_login');
		$user_id = $this->ci->session->userdata('id_user');
		$user_data = $this->ci->M_login->get($user_id)->row();
		return $user_data;
	}
}

?>