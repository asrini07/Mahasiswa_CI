<?php
	class Mmahasiswa extends CI_Model{
		function __construct(){
	        parent::__construct();
	   	}
	   	//untuk mengambil data di view data mahasiswa semua data mahasiswa akan ditampilkan
	   	function getmahasiswa($cari){
	   		//$q=$this->db->query("SELECT * FROM mahasiswa");
	   		if ($cari!="") {
				$this->db->like("nim",$cari);
				$this->db->or_like("nama",$cari);
			}
	   		$q = $this->db->get('mahasiswa');
	   		return $q;
	   	}
	   	//untuk mengambil data mahasiswa dengan nim tertentu yang di get dari view mahasiswa
	   	function getmahasiswadetail($id){
	   		//$q=$this->db->query("SELECT * FROM mahasiswa WHERE nim='$id'");
	   		$this->db->where('nim',$id);
	   		$q = $this->db->get('mahasiswa');
	   		return $q->row();
	   	}

	   	//untuk menyimpan dan mengubah data dijadikan 1 function
	   	function simpanmahasiswa($aksi,$foto){
	   		//deklarasi array untuk field yang akan di simpan di table
	   		$data = array(
	   					'nim'	 => $this->input->post('nim'),
	   					'nama'  => $this->input->post('nama'), 
	   					'jk'  => $this->input->post('jk'), 
	   					'alamat'  => $this->input->post('alamat'), 
	   					'tempat_lahir'  => $this->input->post('tempat_lahir'), 
	   					'tanggal_lahir'  => date("Y-m-d",strtotime($this->input->post('tanggal_lahir'))), 
	   					'jurusan'  => $this->input->post('jurusan'), 
	   					'email'  => $this->input->post('email')
	   			);
			if (!empty($foto)) {
   				$f = array('foto' => $foto["file_name"]);
   				$data = array_merge($data,$f);
   				$d = $this->db->get_where("mahasiswa",array('nim' => $this->input->post('idlama')))->row()->foto;
   			}
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
				case 'ubah':
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
	   	function hapusmahasiswa($id){
	   		//$q=$this->db->query("DELETE FROM mahasiswa WHERE nim='$id'");
	   		$this->db->where('nim',$id);
	   		$this->db->delete('mahasiswa');
	   		return "danger-Data Mahasiswa berhasil di hapus";
	   	}
	}
?>