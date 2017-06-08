<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->load->model('pengarang_model');
		$data["pengarang_list"] = $this->pengarang_model->getDataPengarang();
		$this->load->view('view_pengarang',$data);	
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode_pengarang', 'Kode_pengarang', 'trim|required');
		$this->form_validation->set_rules('nama_pengarang', 'Nama_pengarang', 'trim|required');	
		$this->load->model('pengarang_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('view_tambahPengarang');
		}
			else
			{
				$this->pengarang_model->insertPengarang();
				$this->session->set_flashdata('pesan', 'Tambah Data pengarang Berhasil  ');
				redirect('pengarang/index/');

			}
	}

	public function update($kode_pengarang)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode_pengarang', 'Kode_pengarang', 'trim|required');
		$this->form_validation->set_rules('nama_pengarang', 'Nama_pengarang', 'trim|required');
		
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('pengarang_model');
		$data['pengarang']=$this->pengarang_model->getPengarang($kode_pengarang);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('view_editPengarang',$data);

		}else{
			$this->pengarang_model->updateById($kode_pengarang);
			$this->session->set_flashdata('pesan', 'Update Data pengarang Berhasil  ');
			redirect('pengarang/index/');

		}
	}
	public function delete($kode_pengarang)
	{
		$this->load->model('pengarang_model');
		$this->pengarang_model->deleteById($kode_pengarang);
		redirect('pengarang');
	}
}

/* End of file Pengarang.php */
/* Location: ./application/controllers/Pengarang.php */