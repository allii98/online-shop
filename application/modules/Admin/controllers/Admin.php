<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('bcrypt');

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
        $data['admin'] = $this->M_admin->get_admin();
        $this->template->load('template','admin/v_admin', $data);
    }

    public function tambah()
    {
        $this->template->load('template','admin/v_tambah');
    }

    public function tambah_post()
    {
        $users = $this->input->post('users');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no');
        $pass = $this->input->post('pass');
        $hash = $this->bcrypt->hash_password($pass);

        $type = explode('.', $_FILES["img"]["name"]);
        $type = strtolower($type[count($type)-1]);
        $imgname = uniqid(rand()).'.'.$type;
        $url = "assets/uploads/admin/".$imgname;
        if(in_array($type, array("jpg", "jpeg", "gif", "png"))){
            if(is_uploaded_file($_FILES["img"]["tmp_name"])){
                if(move_uploaded_file($_FILES["img"]["tmp_name"],$url)){
                    $data = array(
                            'admin_nama'    => $users,
                            'admin_email'   => $email,
                            'admin_username'=> $username,
                            'admin_nohp'   => $no_hp,
                            'admin_pass'=> $hash,
                            'admin_foto'  => $imgname
                    );
                    $this->M_admin->add_admin($data);
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success alert-dismissible show fade\">
                            <div class=\"alert-body\">
                            <button class=\"close\" data-dismiss=\"alert\">
                                <span>×</span>
                            </button>
                            Data Admin Berhasil Disimpan
                            </div>
                        </div>");
                    
                    redirect(base_url('Admin'));
                }
            }
        }
    }

    public function edit($id=null)
    {
        $data['isi'] = $this->M_admin->get_id($id);
        $this->template->load('template','admin/v_edit',$data);
    }

    public function edit_post()
    {
        $id = $this->input->post('id');
        $users = $this->input->post('users');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no');

        if($_FILES['image']['name']!="")
        {
            $config['upload_path'] = './assets/uploads/admin/';
            $config['allowed_types'] =     'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());
                // $path = './assets/uploads/barang/';
                // @unlink($path.$this->input->post('old'));
            }
            else
            {
                $upload_data=$this->upload->data();
                $foto=$upload_data['file_name'];
                $path = './assets/uploads/admin/';
                @unlink($path.$this->input->post('old'));
            }
        }else{
                    $foto=$this->input->post('old');
                   
                }

                    $data = array(
                        'admin_nama'    => $users,
                        'admin_email'   => $email,
                        'admin_username'=> $username,
                        'admin_nohp'   => $no_hp,
                        'admin_foto'  => $foto
                            
                    );
                    $this->M_admin->update($id,$data);
                    
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success alert-dismissible show fade\">
                            <div class=\"alert-body\"><button class=\"close\" data-dismiss=\"alert\"><span>×</span></button>
                            Data Admin Berhasil Di Update
                            </div>
                        </div>");
                    
                    redirect(base_url('Admin'));
                }

    public function hapus($id=null)
    {
        $path = "";
            $filename = $this->M_admin->get_id($id);
            foreach ($filename as $key) {
                $file = $key->admin_foto;
                $path = "assets/uploads/admin/".$file;
            }
            
            //echo $path;

            if(file_exists($path)){
                unlink($path);
                if($this->M_admin->delete($id)){
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success alert-dismissible show fade\"><div class=\"alert-body\"><button class=\"close\" data-dismiss=\"alert\"><span>×</span></button> Data Berhasil Dihapus</div> </div>");
                }else{
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger alert-dismissible show fade\"><div class=\"alert-body\"><button class=\"close\" data-dismiss=\"alert\"><span>×</span></button> Data Gagal Diubah</div> </div>");
                }
            }else{
                if($this->M_admin->delete($id)){
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success alert-dismissible show fade\"><div class=\"alert-body\"><button class=\"close\" data-dismiss=\"alert\"><span>×</span></button>Data berhasil di hapus image gagal dihapus</div> </div>");

                }else{
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger alert-dismissible show fade\"><div class=\"alert-body\"><button class=\"close\" data-dismiss=\"alert\"><span>×</span></button> Data Gagal Diubah</div> </div>");
                }
            }

            redirect(base_url().'Admin');	
    }

    

}

/* End of file Admin.php */
