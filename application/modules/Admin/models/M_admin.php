<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function get_admin()
    {
        $this->db->select('*');
        $this->db->from('tbadmin');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function add_admin($data)
    {
        $this->db->insert('tbadmin', $data);
        return TRUE;
    }

    public function get_id($id)
    {
        $query = $this->db->where('admin_id',$id);
        $q = $this->db->get('tbadmin');
        $data = $q->result();
        
        return $data;
    }

    

    public function delete($id)
    {
        $this->db->where('admin_id', $id);
        $this->db->delete('tbadmin');
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function update($id,$data)
    {
        $this->db->where('admin_id', $id);
        $this->db->update('tbadmin', $data);

        return TRUE;
    }


}

/* End of file M_admin.php */

