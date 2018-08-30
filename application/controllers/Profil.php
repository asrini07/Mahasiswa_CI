<?php
	class Profil extends CI_Controller{
		function __construct(){
	        parent::__construct();
	        $this->load->Model('Mlogin');
	        if (($this->session->userdata('username') == NULL)||($this->session->userdata('password') == NULL)){
	               redirect("login/logout","refresh");
	        }
    	}
    	function index(){
    		$data["title"] = "SIMAK UMC < Form Profil";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="profil";
		    $data["judul"] = '<h1 class="no-margin-bottom">Profil</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("profil").'>Profil</a>';
		    $data["content"]="vprofil";
	        $data["row"] = $this->Mlogin->getprofildetail();
	        $this->load->view('template',$data);
	    }
	    function simpanprofil($action){
	    	$this->load->library('upload');
	    	$file_name=($action=="simpan") ? $this->input->post("username") : $this->input->post("idlama");
       		$config['allowed_types'] = 'jpg|jpeg|png|gif';
       		$config['overwrite']  = TRUE;
       		$config['remove_spaces']  = TRUE;
       		$foto = array();
       		if (!empty($_FILES['foto']['name'])){
         		$config['upload_path'] = './img/foto/user/';
         		$config["file_name"] = $file_name;
         		$this->upload->initialize($config);
         		$this->upload->do_upload('foto');
         		$foto = $this->upload->data();
       		} 

	        $message = $this->Mlogin->simpanprofil($action,$foto);
	        $this->session->set_flashdata("message",$message);
	        redirect("login/logout","refresh");
	    }
	}
?>