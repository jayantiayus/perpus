<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->load->model('penerbit_model');
		$data["penerbit_list"] = $this->penerbit_model->getDataPenerbit();
		$this->load->view('view_penerbit',$data);	
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode_penerbit', 'Kode_penerbit', 'trim|required');
		$this->form_validation->set_rules('nama_penerbit', 'Nama_penerbit', 'trim|required');	
		$this->load->model('penerbit_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('view_tambahPenerbit');
		}
			else
			{
				$this->penerbit_model->insertPenerbit();
				$this->session->set_flashdata('pesan', 'Tambah Data penerbit Berhasil  ');
				redirect('penerbit/index/');

			}
	}

	public function update($kode_penerbit)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode_penerbit', 'Kode_penerbit', 'trim|required');
		$this->form_validation->set_rules('nama_penerbit', 'Nama_penerbit', 'trim|required');
		
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('penerbit_model');
		$data['penerbit']=$this->penerbit_model->getPenerbit($kode_penerbit);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('view_editPenerbit',$data);

		}else{
			$this->penerbit_model->updateById($kode_penerbit);
			$this->session->set_flashdata('pesan', 'Update Data penerbit Berhasil  ');
			redirect('penerbit/index/');

		}
	}
	public function delete($kode_penerbit)
	{
		$this->load->model('penerbit_model');
		$this->penerbit_model->deleteById($kode_penerbit);
		redirect('penerbit');
	}

}

/* End of file Penerbit.php */
/* Location: ./application/controllers/Penerbit.php */