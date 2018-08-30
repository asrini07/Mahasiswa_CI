<?php
	class Mhome extends CI_Model{
		function __construct(){
	        parent::__construct();
	   	}
	   	function jumlah_mahasiswa($status){
	   		if ($status!="all") {
				$this->db->where("jk",$status);
			}
	   		$this->db->select("count(nim) as jumlah");
	   		$q = $this->db->get('mahasiswa');
	   		return $q->row();
	   	}
	   	function jumlah_mk(){
	   		$this->db->select("count(kode_mk) as jumlah");
	   		$q = $this->db->get('matakuliah');
	   		return $q->row();
	   	}
	   	function data_mahasiswa(){
	   		$q = $this->db->get('mahasiswa', 0, 12);
	   		return $q->result();
	   	}
	   	
	}
?>