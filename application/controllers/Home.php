<?php
	class Home extends CI_Controller{
		function __construct(){
	        parent::__construct();
	        $this->load->Model('Mhome');
	        if (($this->session->userdata('username') == NULL)||($this->session->userdata('password') == NULL))
	        {
	               redirect("login/logout","refresh");
	        }
    	}
    	function index(){
	        $data["title"] = "SIMAK UMC < Home";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="home";
		    $data["content"]="vhome";
		    $data["judul"] = '<h1 class="no-margin-bottom">Home</h1>';
		    $data["breadcrumb"] = '<li class="breadcrumb-item active">Home</li>';
		    $data["q1"] = $this->Mhome->jumlah_mahasiswa("all");
		    $data["q2"] = $this->Mhome->jumlah_mahasiswa("P");
		    $data["q3"] = $this->Mhome->jumlah_mahasiswa("L");
		    $data["q4"]=$this->Mhome->jumlah_mk();
		    $data["q5"]=$this->Mhome->data_mahasiswa();
	        $this->load->view('template',$data);
    	} 
	}
?>