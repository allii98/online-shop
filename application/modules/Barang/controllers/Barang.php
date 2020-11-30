<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    
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
        $this->load->model('M_barang');
		$this->load->model('Kategori/M_kategori');
    }
    

    public function index()
    {
		$x['kat']=$this->M_barang->get_all_kategori();
        $x['brg']=$this->M_barang->get_brg();
        // print_r($x);
        // echo "<br>";        
        $this->template->load('template','barang/v_barang',$x);
    }

    public function tambah()
    {
        $data = [
            'tittle' 		 => 'Tambah Data Barang',
            'kat' 			 => $this->M_barang->get_all_kategori()
            ];
        $this->template->load('template','Barang/v_tambah',$data);

    }

    public function tambah_post()
    {
        $nama = $this->input->post('nama');
        $des = $this->input->post('des');
        $hrg = $this->input->post('hrg');
        $kat = $this->input->post('kat');


        $this->load->library('upload');
    $dataInfo = array();
    $files = $_FILES;
    $cpt = count($_FILES['userfile']['name']);
    for($i=0; $i<$cpt; $i++)
    {           
        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload();
        $dataInfo[] = $this->upload->data();
    }
        


        
                    $data = array(
                        'produk_nama' => $nama,
                        'produk_desk' => $des,
                        'produk_hargalama' => $hrg,
                        'produk_kategori' => $kat,
                        'produk_foto1'  =>  $dataInfo[0]['file_name'],
                        'produk_foto2'  =>  $dataInfo[1]['file_name'],
                        'produk_foto3'  =>  $dataInfo[2]['file_name'],
                        'produk_foto4'  =>  $dataInfo[3]['file_name'],

                    );
                    $this->M_barang->add_barang($data);
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success alert-dismissible show fade\">
                            <div class=\"alert-body\">
                            <button class=\"close\" data-dismiss=\"alert\">
                                <span>×</span>
                            </button>Data Admin Berhasil Disimpan</div></div>");
                    
                    redirect(base_url('Barang'));
                    
                
            
        

    }

    private function set_upload_options()
{   
    //upload an image options
    $config = array();
    $config['upload_path'] = './assets/uploads/barang/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '0';
    $config['overwrite']     = FALSE;

    return $config;
}

    public function edit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $des = $this->input->post('des');
        $hrg = $this->input->post('hrgb');
        $kat = $this->input->post('kat');
        $stok = $this->input->post('stok');
        
                $type = explode('.', $_FILES["image"]["name"]);
				$type = strtolower($type[count($type)-1]);
				$imgname = uniqid(rand()).'.'.$type;
				$url = "assets/uploads/barang/".$imgname;
				if(in_array($type, array("jpg", "jpeg", "gif", "png"))){
					if(is_uploaded_file($_FILES["image"]["tmp_name"])){
						if(move_uploaded_file($_FILES["image"]["tmp_name"],$url)){
                            $file = $this->input->post('img');
                            $path = "assets/uploads/barang/".$file;
    
                            if(file_exists($path)){
                                unlink($path);
                            }
                    $data = array(
                        'barang_nama' => $nama,
                        'barang_desk' => $des,
                        'barang_hargabaru' => $hrg,
                        'barang_kat_id' => $kat,
                        'barang_stok'  => $stok,
                        'barang_foto'  => $imgname
                    );
                    $this->M_barang->edit_barang($id,$data);
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success alert-dismissible show fade\"><div class=\"alert-body\"><button class=\"close\" data-dismiss=\"alert\"><span>×</span></button> Data Admin Berhasil Disimpan</div> </div>");
                    }
                }
            }else{
                $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Data gagal di simpan, ekstensi gambar salah</div>");
           
            }
            redirect(base_url('Barang'));
    }

    public function editpost()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $des = $this->input->post('des');
        $hrg = $this->input->post('hrgb');
        $kat = $this->input->post('kat');
        $stok = $this->input->post('stok');
        if($_FILES['image']['name']!="")
        {
            $config['upload_path'] = './assets/uploads/barang/';
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
                $path = './assets/uploads/barang/';
                @unlink($path.$this->input->post('old'));
            }
        }else{
                    $foto=$this->input->post('old');
                   
                }
                
                    $data = array(
                        'barang_nama' => $nama,
                        'barang_desk' => $des,
                        'barang_hargabaru' => $hrg,
                        'barang_kat_id' => $kat,
                        'barang_stok'  => $stok,
                        'barang_foto'  => $foto
                    );
                    $this->M_barang->edit_barang($id,$data);
                    $this->session->set_flashdata("pesan", "<div class=\"alert alert-success alert-dismissible show fade\"><div class=\"alert-body\"><button class=\"close\" data-dismiss=\"alert\"><span>×</span></button> Data Admin Berhasil Diubah</div> </div>");

            redirect(base_url('Barang'));
    }

    public function hapus($id,$foto)
    {
        $path = './assets/uploads/barang/';
	  	@unlink($path.$foto);
	  
      	$where = array('barang_id' => $id );
		$this->M_barang->delete($where);
		$this->session->set_flashdata("pesan", "<div class=\"sufee-alert alert with-close alert-success alert-dismissible fade show\" id=\"alert\">
			<span class=\"badge badge-pill badge-success\"></span>
			Data Berhasil Dihapus
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
				<span aria-hidden=\"true\">×</span>
			</button></div>");
		redirect(base_url('Barang'));	
    }

}

/* End of file Barang.php */
