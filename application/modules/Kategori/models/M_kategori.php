<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

    public function get_kat()
    {
        $this->db->select('*');
        $this->db->from('tbkategori');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_all_kategori(){
		$hsl=$this->db->query("select * from tbkategori");
		return $hsl;
	}

    public function get_kat_by_id($kat)
    {
        $hsl=$this->db->query("select * from tbkategori where kategoriid='$kat'");
		return $hsl;
    }

    public function add_kat($data)
    {
        $this->db->insert('tbkategori', $data);
        return TRUE;
    }

    public function update_kat($data,$kondisi)
    {
        $this->db->update('tbkategori',$data,$kondisi);
        return TRUE;
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete('tb_kategori');
        return TRUE;
    }

}

/* End of file M_kategori.php */
