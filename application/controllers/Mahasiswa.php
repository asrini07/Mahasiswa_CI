<?php
	class Mahasiswa extends CI_Controller{
		function __construct(){
	        parent::__construct();
	        $this->load->Model('Mmahasiswa');
	        if (($this->session->userdata('username') == NULL)||($this->session->userdata('password') == NULL)){
	               redirect("login/logout","refresh");
	        }
    	}
    	function index(){
	        $data["title"] = "SIMAK UMC < Mahasiswa";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="mahasiswa";
		    $data["content"]="mahasiswa/vmahasiswa";
		    $data["judul"] = '<h1 class="no-margin-bottom">Mahasiswa</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("mahasiswa").'>Mahasiswa</a>';
		    $cari = $this->input->post("cari");
	    	$data["cari"] = $cari;
		    $data["row"] = $this->Mmahasiswa->getmahasiswa($cari);
	        $this->load->view('template',$data);
    	} 
    	function formmahasiswa($id=0){
    		$data["title"] = "SIMAK UMC < Form Mahasiswa";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="mahasiswa";
		    $data["judul"] = '<h1 class="no-margin-bottom">Mahasiswa</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("mahasiswa").'>Mahasiswa</a>';
		    $data["content"]="mahasiswa/vformmahasiswa";
		    $data["id"]=$id;
	        $data["row"] = $this->Mmahasiswa->getmahasiswadetail($id);
	        $this->load->view('template',$data);
	    }
    	function hapusmahasiswa($action){
	        $message = $this->Mmahasiswa->hapusmahasiswa($action);
	        $this->session->set_flashdata("message",$message);
	        redirect("mahasiswa");
	    }
	    function simpanmahasiswa($action){
	    	$this->load->library('upload');
	    	$file_name=($action=="simpan") ? $this->input->post("nim") : $this->input->post("idlama");
       		$config['allowed_types'] = 'jpg|jpeg|png|gif';
       		$config['overwrite']  = TRUE;
       		$config['remove_spaces']  = TRUE;
       		$foto = array();
       		if (!empty($_FILES['foto']['name'])){
         		$config['upload_path'] = './img/foto/mahasiswa/';
         		$config["file_name"] = $file_name;
         		$this->upload->initialize($config);
         		$this->upload->do_upload('foto');
         		$foto = $this->upload->data();
       		} 

	        $message = $this->Mmahasiswa->simpanmahasiswa($action,$foto);
	        $this->session->set_flashdata("message",$message);
	        redirect("mahasiswa");
	    }
	}
?>