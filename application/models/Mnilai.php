<?php
	class Mnilai extends CI_Model{
		function __construct(){
	        parent::__construct();
	   	}
	   	//untuk mengambil data di view data mahasiswa semua data mahasiswa akan ditampilkan
	   	function getnilai(){
	   		//$q=$this->db->query("SELECT * FROM mahasiswa");
	   		$q = $this->db->get('nilai');
	   		return $q;
	   	}
	   	//untuk mengambil data mahasiswa dengan nim tertentu yang di get dari view mahasiswa
	   	function getnilaidetail($id){
	   		//$q=$this->db->query("SELECT * FROM mahasiswa WHERE nim='$id'");
	   		$this->db->where('nim',$id);
	   		$q = $this->db->get('nilai');
	   		return $q->row();
	   	}

	   	//untuk menyimpan dan mengubah data dijadikan 1 function
	   	function simpan($aksi){
	   		//deklarasi array untuk field yang akan di simpan di table
	   		$data = array(
	   					'nim'	 => $this->input->post('nim'),
	   					'nama'  => $this->input->post('nama'), 
	   					'jk'  => $this->input->post('jk'), 
	   					'alamat'  => $this->input->post('alamat'), 
	   					'tempat_lahir'  => $this->input->post('tempat_lahir'), 
	   					'tanggal_lahir'  => $this->input->post('tanggal_lahir'), 
	   					'jurusan'  => $this->input->post('jurusan'), 
	   					'email'  => $this->input->post('email'), 
	   					'foto'  => $this->input->post('foto'), 
			);
			//jika aksinya bernilai simpan maka akan mengeksekusi query INSERT jika bernilai edit maka akan mengeksekusi query UPDATE
			switch ($aksi) {
				case 'simpan':
					//$q=$this->db->query("INSERT INTO mahasiswa VALUES 
							// ('$this->input->post('nim')',
							//  '$this->input->post('nama')',
							//  '$this->input->post('jk')',
							//  '$this->input->post('alamat')',
							//  '$this->input->post('tempat_lahir')',
							//  '$this->input->post('tanggal_lahir')',
							//  '$this->input->post('jurusan')',
							//  '$this->input->post('email')',
							//  '$this->input->post('foto')'  )
							//");
					$this->db->insert('mahasiswa', $data);
					break;
				case 'edit':
					//$q=$this->db->query("UPDATE mahasiswa SET
							//  nim 			='$this->input->post('nim')',
							//  nama 			='$this->input->post('nama')',
							//  jk 				='$this->input->post('jk')',
							//  alamat 			='$this->input->post('alamat')',
							//  tempat_lahir 	='$this->input->post('tempat_lahir')',
							//  tanggal_lahir 	='$this->input->post('tanggal_lahir')',
							//  jurusan 		='$this->input->post('jurusan')',
							//  email 			='$this->input->post('email')',
							//  foto 			='$this->input->post('foto')'  
							// WHERE nim='$this->input->post('idlama')'
							// ");
					$this->db->where('nim', $this->input->post('idlama'));
					$this->db->update('mahasiswa', $data);
					break;
			}
			return "success-Data Mahasiswa berhasil di simpan";
	   	}

	   	//untuk menghapus data mahasiswa
	   	function hapus_nilai($nim,$kode_mk){
	   		//$q=$this->db->query("DELETE FROM mahasiswa WHERE nim='$id'");
	   		$this->db->where('nim',$nim);
	   		$this->db->where('kode_mk',$kode_mk);
	   		$this->db->delete('nilai');
	   		return "danger-Data Nilai Mahasiswa berhasil di hapus";
	   	}
	   	function getmatakuliah(){
			$q = $this->db->get("matakuliah");
    	    $data = array();
    	    foreach ($q->result() as $row){
    	        $data[] = array(
    	              "kode_mk"=>$row->kode_mk,
    	              "nama_mk"=>$row->nama_mk,
    	              "sks"=>$row->sks,
    	              );
    	    }
    	    return $data;
	   	}
	   	function simpan_nilai($kode){
	   		$data = array(
						'nim'=> $kode,
						'kode_mk' => $this->input->post("kode_matakuliah"),
						'semester' => $this->input->post("semester"),
						'thn_akademik' => $this->input->post("thn_akademik"),
						'nilai' => $this->input->post("nilai"),
						);
	   		$this->db->insert('nilai', $data);
	   		return "success-Data Nilai berhasil di simpan";
	   	}
	   	function getnilaimahasiswa($id){
	   		$this->db->select("nilai.*, matakuliah.nama_mk, matakuliah.sks");
			$this->db->join("matakuliah","nilai.kode_mk=matakuliah.kode_mk");
	   		$this->db->where('nim',$id);
	   		$this->db->order_by("thn_akademik,semester");
	   		$q = $this->db->get('nilai');
	   		return $q;
	   	}
	   	function getlaporannilai($semester,$thn_akademik,$kode_mk){
	   		if ($semester!="all") {
				$this->db->where("semester",$semester);
			}
			if ($thn_akademik!="all") {
				$this->db->where("thn_akademik",$thn_akademik);
			}
			if ($kode_mk!="all") {
				$this->db->where("nilai.kode_mk",$kode_mk);
			}
	   		$this->db->select("nilai.*, matakuliah.nama_mk, matakuliah.sks, mahasiswa.nama");
			$this->db->join("matakuliah","nilai.kode_mk=matakuliah.kode_mk");
			$this->db->join("mahasiswa","nilai.nim=mahasiswa.nim");
	   		$this->db->order_by("thn_akademik,semester,nilai.kode_mk,nilai.nim");
	   		$q = $this->db->get('nilai');
	   		return $q;
	   	}
	}
?>