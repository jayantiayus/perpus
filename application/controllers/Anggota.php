<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		
		$this->load->model('anggota_model');
		$data["anggota_list"] = $this->anggota_model->getDataAnggota();
		$this->load->view('view_anggota',$data);			
	
	}


	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nim', 'Nim');
		$this->form_validation->set_rules('nama', 'Nama');
		$this->form_validation->set_rules('alamat', 'Alamat');
		$this->form_validation->set_rules('notelp', 'Notelp');
		$this->form_validation->set_rules('tglLahir', 'TglLahir');
		
		$this->load->model('anggota_model');

		if($this->form_validation->run()==FALSE){
			
			$this->load->view('view_tambahAnggota');
			}else{
			
			$config['upload_path']          = './assets/upload/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 1000000000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
		
			if ( ! $this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					//$this->load->view('tambah_pegawai_view',$error);
			} else {
					$this->anggota_model->insertAnggota();
					$this->session->set_flashdata('pesan', 'Tambah Data Anggota Berhasil  ');
					redirect('anggota/index/');
			}
			
			
		}
	}

	public function update($nim)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nim', 'Nim', 'trim|required');	
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');	
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');	
		$this->form_validation->set_rules('notelp', 'Notelp', 'trim|required');	
		$this->form_validation->set_rules('tglLahir', 'TglLahir', 'trim|required');	
		
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('anggota_model');
		$data['anggota']=$this->anggota_model->getAnggota($nim);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('view_editAnggota',$data);

		}else{
			$config['upload_path']          = './assets/upload/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 1000000000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);
		
			if ( ! $this->upload->do_upload('foto')){
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					//$this->load->view('tambah_pegawai_view',$error);
				}else {
			$this->anggota_model->updateById($nim);				
			$this->session->set_flashdata('pesan', 'Tambah Data Kategori Berhasil  ');
			redirect('anggota/index/');
				}

		}
	}
	public function delete($nim)
	{
		$this->load->model('anggota_model');
		$this->anggota_model->deleteById($nim);
		redirect('anggota');
	}


}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */