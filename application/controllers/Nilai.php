<?php
	class Nilai extends CI_Controller{
		function __construct(){
	        parent::__construct();
	        $this->load->Model('Mnilai');
	        $this->load->Model('Mmahasiswa');
	        if (($this->session->userdata('username') == NULL)||($this->session->userdata('password') == NULL)){
	               redirect("login/logout","refresh");
	        }
    	}
    	function index(){
	        $data["title"] = "SIMAK UMC < Nilai";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="nilai";
		    $data["content"]="nilai/vnilai";
		    $data["judul"] = '<h1 class="no-margin-bottom">Nilai</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("nilai").'>Nilai</a>';
		    $cari = $this->input->post("cari");
	    	$data["cari"] = $cari;
		    $data["row"] = $this->Mmahasiswa->getmahasiswa($cari);
	        $this->load->view('template',$data);
    	} 
    	function formnilai($id=0){
    		$data["title"] = "SIMAK UMC < Form Nilai";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="nilai";
		    $data["judul"] = '<h1 class="no-margin-bottom">Nilai</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("nilai").'>Nilai</a>';
		    $data["content"]="nilai/vformnilai";
		    $data["id"]=$id;
	        $data["row"] = $this->Mmahasiswa->getmahasiswadetail($id);
	        $data["row1"] = $this->Mnilai->getmatakuliah();
	        $data["row2"] = $this->Mnilai->getnilaimahasiswa($id);
	        $this->load->view('template',$data);
	    }
    	function hapus_nilai($nim,$kode_mk){
	        $message = $this->Mnilai->hapus_nilai($nim,$kode_mk);
	        $this->session->set_flashdata("message",$message);
	        redirect("nilai/formnilai/".$nim);
	    }
	    function simpan_nilai($kode){
	        $message = $this->Mnilai->simpan_nilai($kode);
	        $this->session->set_flashdata("message",$message);
	        redirect("nilai/formnilai/".$kode);
	    }
	    function cetakkhs($nim){
			$data["user"]=$this->session->userdata('nama_user');
			$data["row"]=$this->Mmahasiswa->getmahasiswadetail($nim);
			$data["row1"] = $this->Mnilai->getnilaimahasiswa($nim);
			$this->load->view('nilai/vcetakkhs',$data);	
		}
	}
?>