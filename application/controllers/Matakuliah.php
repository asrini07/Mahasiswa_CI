<?php
	class Matakuliah extends CI_Controller{
		function __construct(){
	        parent::__construct();
	        $this->load->Model('Mmatakuliah');
	        if (($this->session->userdata('username') == NULL)||($this->session->userdata('password') == NULL)){
	               redirect("login/logout","refresh");
	        }
    	}
    	function index(){
	        $data["title"] = "SIMAK UMC < Matakuliah";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="matakuliah";
		    $data["content"]="matakuliah/vmatakuliah";
		    $data["judul"] = '<h1 class="no-margin-bottom">Matakuliah</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("matakuliah").'>Matakuliah</a>';
		    $cari = $this->input->post("cari");
	    	$data["cari"] = $cari;
		    $data["row"] = $this->Mmatakuliah->getmatakuliah($cari);
	        $this->load->view('template',$data);
    	} 
    	function formmatakuliah($id=0){
    		$data["title"] = "SIMAK UMC < Form Matakuliah";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="matakuliah";
		    $data["judul"] = '<h1 class="no-margin-bottom">Matakuliah</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("matakuliah").'>Matakuliah</a>';
		    $data["content"]="matakuliah/vformmatakuliah";
		    $data["id"]=$id;
	        $data["row"] = $this->Mmatakuliah->getmatakuliahdetail($id);
	        $this->load->view('template',$data);
	    }
    	function hapusmatakuliah($action){
	        $message = $this->Mmatakuliah->hapusmatakuliah($action);
	        $this->session->set_flashdata("message",$message);
	        redirect("matakuliah");
	    }
	    function simpanmatakuliah($action){
	        $message = $this->Mmatakuliah->simpanmatakuliah($action);
	        $this->session->set_flashdata("message",$message);
	        redirect("matakuliah");
	    }
	}
?>