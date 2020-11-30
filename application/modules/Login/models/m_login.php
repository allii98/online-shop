<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {

    function prosesLogin($username){
        $this->db->where('admin_username',$username);
        
        return $this->db->get('tbadmin')->row();
    }

    public function get($id = null)
	{
		$this->db->from('tbadmin');
		if($id != null) {
			$this->db->where('admin_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}


    function checkEmail($email){
        $this->db->where('admin_email',$email);
        
        return $this->db->get('tbadmin')->row();
    }
    
    function viewDataByID($username){
        $query = $this->db->where('admin_username',$username);
        $q = $this->db->get('tbadmin');
        $data = $q->result();
        
        return $data;
    }

    function viewDataByIDemail($email){
        $query = $this->db->where('admin_email',$email);
        $q = $this->db->get('tbadmin');
        $data = $q->result();
        
        return $data;
    }

    function checkDataUsrbyID($id,$pass){
        $this->db->where('admin_id',$id);
        $this->db->where('admin_pass',$pass);
        
        return $this->db->get('tbadmin')->row();
    }

    function changepassUser($id,$data){
        $this->db->where('admin_id', $id);
        $this->db->update('tbadmin', $data);

        return TRUE;
    }

    

}

/* End of file m_login.php */


?>