<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
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
        $data['kat'] = $this->M_kategori->get_kat();
        $this->template->load('template','v_kategori',$data);
    }

    public function tambah()
    {
        $nama = $this->input->post('nama');
        $data = array(
            'kategori_nama' => $nama
        );
        $this->M_kategori->add_kat($data);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success alert-dismissible show fade\">
                            <div class=\"alert-body\">
                            <button class=\"close\" data-dismiss=\"alert\">
                                <span>×</span>
                            </button>
                            Data Admin Berhasil Disimpan
                            </div>
                        </div>");
                    
        redirect(base_url('Kategori'));
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kondisi = array('kategori_id' => $id );
        $data = array(
            
            'kategori_nama' => $nama
        );
        $this->M_kategori->update_kat($data,$kondisi);
        $this->session->set_flashdata("pesan", "<div class=\"alert alert-success alert-dismissible show fade\">
                            <div class=\"alert-body\">
                            <button class=\"close\" data-dismiss=\"alert\">
                                <span>×</span>
                            </button>
                            Data Admin Berhasil Disimpan
                            </div>
                        </div>");
                    
        redirect(base_url('Kategori'));
    }

    public function del($id)
    {
        $where = array('kategori_id' => $id );
		$this->M_kategori->delete($where);
		$this->session->set_flashdata("pesan", "<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" id=\"alert\">
						<span class=\"badge badge-pill badge-success\"></span>
						Data Berhasil Dihapus
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
							<span aria-hidden=\"true\">×</span>
						</button>
					</div>");
		redirect(base_url('Kategori'));	
    }

}

/* End of file Kategori.php */
