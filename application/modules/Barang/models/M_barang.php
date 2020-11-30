<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

    public function get_brg()
    {
        $this->db->select('*');
        $this->db->from('tbproduk');
        $this->db->join('tbkategori', 'tbkategori.kategori_id=tbproduk.produk_kategori', 'inner');
        // $this->db->join('tbalat', 'tbalat.id_devices=histori.id_devices', 'inner');
        $this->db->order_by('produk_id', 'desc');
        //$this->db->limit(20);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_all_kategori(){
		$hsl=$this->db->query("select * from tbkategori");
		return $hsl;
	}

   

    public function add_barang($data)
    {
        $this->db->insert('tbproduk', $data);
        return TRUE;
    }

    public function edit_barang($id,$data)
    {
        $this->db->where('produk_id', $id);
        $this->db->update('tbproduk', $data);

        return TRUE;
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete('tbproduk');
        return TRUE;
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/uploads/barang/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->produk_id;
        $config['overwrite']			= true;
       // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }
    

}

/* End of file M_barang.php */
