<?php 
	class Mlogin extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function ceklogin($username,$password){
			$this->db->where('username',$username);
			$this->db->where('password', md5($password));
	   		$q = $this->db->get('user');
	   		$row = $q->row();
            if ($q->num_rows() > 0){
                $userdata = array (
                        'username' => $username,
                        'password' => $password,
                        'foto' 		=> $row->foto,
						'nama_user' => $row->nama_user
                        );
                $q->free_result();
                $this->session->set_userdata($userdata);
                return TRUE;
            } else return FALSE;
		}
		function getprofildetail(){
			$this->db->where('username',$this->session->userdata('username'));
	   		$q = $this->db->get('user');
	   		return $q->row();
		}
		function simpanprofil($action,$foto){
	   		$data = array(
	   			'nama_user'	=> $this->input->post('nama_user'),
	   					
			);
			if($this->input->post('password')!=""){
				$f = array('password' => md5($this->input->post('password')));
   				$data = array_merge($data,$f);
			}
			if (!empty($foto)) {
   				$f = array('foto' => $foto["file_name"]);
   				$data = array_merge($data,$f);
   				$d = $this->db->get_where("user",array('username' => $this->session->userdata('username')))->row()->foto;
   				$this->session->unset_userdata('foto');
   				$this->session->set_userdata("foto",$d);
   				//unlink("./img/foto/".$d);
   			}
   			$this->db->where('username', $this->session->userdata('username'));
			$this->db->update('user', $data);
			
			return "success-Data berhasil di simpan";
	   	}
	}
?>