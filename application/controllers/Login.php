<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('view_login');		
	}

	public function cekLogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_cekDb');
		if($this->form_validation->run()==false){
			$this->load->view('view_login');
		}else{
			redirect('home_admin','refresh');
		}
	}

	public function cekDb($password)
	{
		$this->load->model('Login_model');
		$username = $this->input->post('username');
		$result = $this->Login_model->login($username,$password);
		if($result){
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
					'id'=>$row->id,
					'username'=> $row->username
				);
				$this->session->set_userdata('logged_in',$sess_array);
			}
			return true;
		}else{
			$this->form_validation->set_message('cekDb',"Login Gagal Username dan Password tidak valid");
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */

 ?>