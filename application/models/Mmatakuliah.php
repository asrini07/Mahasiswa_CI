<?php
	class Mmatakuliah extends CI_Model{
		function __construct(){
	        parent::__construct();
	   	}
	   	
	   	//untuk mengambil data di view data matakuliah semua data matakuliah akan ditampilkan
	   	function getmatakuliah($cari){
	   		//$q=$this->db->query("SELECT * FROM matakuliah");
	   		if ($cari!="") {
				$this->db->like("kode_mk",$cari);
				$this->db->or_like("nama_mk",$cari);
			}
	   		$q = $this->db->get('matakuliah');
	   		return $q;
	   	}

	   	//untuk mengambil data matakuliah dengan nim tertentu yang di get dari view matakuliah
	   	function getmatakuliahdetail($id){
	   		//$q=$this->db->query("SELECT * FROM matakuliah WHERE nim='$id'");
	   		$this->db->where('kode_mk',$id);
	   		$q = $this->db->get('matakuliah');
	   		return $q->row();
	   	}

	   	//untuk menyimpan dan mengubah data dijadikan 1 function
	   	function simpanmatakuliah($aksi){
	   		//deklarasi array untuk field yang akan di simpan di table
	   		$data = array(
	   					'kode_mk'	 => $this->input->post('kode_mk'),
	   					'nama_mk'  => $this->input->post('nama_mk'), 
	   					'sks'  => $this->input->post('sks'), 
			);
			//jika aksinya bernilai simpan maka akan mengeksekusi query INSERT jika bernilai edit maka akan mengeksekusi query UPDATE
			switch ($aksi) {
				case 'simpan':
					//$q=$this->db->query("INSERT INTO matakuliah VALUES 
							// ('$this->input->post('kode_mk')',
							//  '$this->input->post('nama_mk')',
							//  '$this->input->post('sks')'  )
							//");
					$this->db->insert('matakuliah', $data);
					break;
				case 'ubah':
					//$q=$this->db->query("UPDATE matakuliah SET
							//  kode_mk 	='$this->input->post('kode_mk')',
							//  nama_mk 	='$this->input->post('nama_mk')',
							//  sks 		='$this->input->post('sks')'
							// WHERE nim='$this->input->post('idlama')'
							// ");
					$this->db->where('kode_mk', $this->input->post('idlama'));
					$this->db->update('matakuliah', $data);
					break;
			}
			return "success-Data Matakuliah berhasil di simpan";
	   	}

	   	//untuk menghapus data matakuliah
	   	function hapusmatakuliah($id){
	   		//$q=$this->db->query("DELETE FROM matakuliah WHERE nim='$id'");
	   		$this->db->where('kode_mk',$id);
	   		$this->db->delete('matakuliah');
	   		return "danger-Data Matakuliah berhasil di hapus";
	   	}
	}
?>