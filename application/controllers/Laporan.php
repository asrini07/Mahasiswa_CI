<?php
	class Laporan extends CI_Controller{
		function __construct(){
	        parent::__construct();
	        $this->load->Model('Mmahasiswa');
	        $this->load->Model('Mmatakuliah');
	        $this->load->Model('Mnilai');
	        if (($this->session->userdata('username') == NULL)||($this->session->userdata('password') == NULL)){
	               redirect("login/logout","refresh");
	        }
    	}
    	function index($semester="all",$thn_akademik="all",$kode_mk="all"){
	        $data["title"] = "SIMAK UMC < Laporan Nilai";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="laporan";
		    $data["content"]="laporan/vlaporan_nilai";
		    $data["judul"] = '<h1 class="no-margin-bottom">Laporan Nilai</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("laporan").'>Laporan Nilai</a>';
		    $data["semester"]=$semester;
		    $data["thn_akademik"]=$thn_akademik;
		    $data["kode_mk"]=$kode_mk;
		    $data["row"] = $this->Mmatakuliah->getmatakuliah("");
		    $data["row1"] = $this->Mnilai->getlaporannilai($semester,$thn_akademik,$kode_mk);
	        $this->load->view('template',$data);
    	} 
    	function laporannilai($semester="",$thn_akademik="",$kode_mk=""){
    		$data["title"] = "SIMAK UMC < Laporan Nilai";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="laporan";
		    $data["judul"] = '<h1 class="no-margin-bottom">Laporan Nilai</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("laporan").'>Laporan Nilai</a>';
		    $data["content"]="laporan/vlaporan_nilai";
		    $data["semester"]=$semester;
		    $data["thn_akademik"]=$thn_akademik;
		    $data["kode_mk"]=$kode_mk;
		    $data["row"] = $this->Mmatakuliah->getmatakuliah("");
		    $data["row1"] = $this->Mnilai->getlaporannilai($semester,$thn_akademik,$kode_mk);
	        $this->load->view('template',$data);
	    }
	    function export_laporannilai($semester="",$thn_akademik="",$kode_mk=""){
	    	$data["semester"]=$semester;
		    $data["thn_akademik"]=$thn_akademik;
		    $data["kode_mk"]=$kode_mk;
		    $data["row"] = $this->Mmatakuliah->getmatakuliah("");
		    $data["row1"] = $this->Mnilai->getlaporannilai($semester,$thn_akademik,$kode_mk);
	        $this->load->view('laporan/vlaporan_nilai_excel',$data);
	    }
	    function cetakpdf_laporannilai($semester="",$thn_akademik="",$kode_mk=""){
	    	$this->load->helper('pdf_helper');
	    	$data["title"] = "Laporan Mahasiswa";
		    $data["semester"]=$semester;
		    $data["thn_akademik"]=$thn_akademik;
		    $data["kode_mk"]=$kode_mk;
		    $data["row"] = $this->Mmatakuliah->getmatakuliah("");
		    $data["row1"] = $this->Mnilai->getlaporannilai($semester,$thn_akademik,$kode_mk);
		    $data["nama_user"] = $this->session->userdata('nama_user');
			echo $this->load->view('laporan/vcetakpdf_laporannilai',$data,true); 
	    }
	    function laporanmahasiswa(){
    		$data["title"] = "SIMAK UMC < Laporan Mahasiswa";
	        $data["nama_user"] = $this->session->userdata('nama_user');
		    $data["menu"]="laporan";
		    $data["judul"] = '<h1 class="no-margin-bottom">Laporan Nilai</h1>';
		    $data["breadcrumb"] = '<a href='.site_url("laporan").'>Laporan Nilai</a>';
		    $data["content"]="laporan/vlaporan_mahasiswa";
	        $data["row"] = $this->Mmahasiswa->getmahasiswa(0);
	        $this->load->view('template',$data);
	    }
	    function export_laporanmahasiswa(){
		    $data["row"] = $this->Mmahasiswa->getmahasiswa(0);
	        $this->load->view('laporan/vlaporan_mahasiswa_excel',$data);
	    }
	    function cetakpdf_laporanmahasiswa(){
	    	$this->load->helper('pdf_helper');
	    	$data["title"] = "Laporan Mahasiswa";
		    $data["row"] = $this->Mmahasiswa->getmahasiswa(0);
		    $data["nama_user"] = $this->session->userdata('nama_user');
			echo $this->load->view('laporan/vcetakpdf_laporanmahasiswa',$data,true); 
	    }
    	
	}
?>