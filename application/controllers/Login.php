<?php
	class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Mlogin');
        	if (($this->session->userdata('username') != NULL)||($this->session->userdata('password') != NULL)){
                    $this->session->sess_destroy();
            }
		}
		function index(){
			$this->load->view('vlogin');
		}
		function login_process(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if ($this->Mlogin->ceklogin($username,$password)) {
                redirect('home','refresh');
	        }
	        else {
                $message = "danger-Gagal login bro...";
                $this->session->set_flashdata("message", $message);
                redirect('login');
	        }
		}
		function logout(){
            $this->session->sess_destroy();
            redirect('login');
    	}
	}
?>