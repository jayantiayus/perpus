<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
		}else{
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$this->load->model('kategori_model');
		$data["kategori_list"] = $this->kategori_model->getDataKategori();
		$this->load->view('view_kategori',$data);			
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('id_kategori', 'Id_kategori', 'trim|required');	
		$this->form_validation->set_rules('nama_kategori', 'Nama_kategori', 'trim|required');	
		$this->load->model('Kategori_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('view_tambahKategori');
		}
			else
			{
				$this->Kategori_model->insertKategori();
				$this->session->set_flashdata('pesan', 'Tambah Data Kategori Berhasil  ');
				redirect('kategori/index/');

			}
	}

	public function update($id_kategori)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_kategori', 'Id_kategori', 'trim|required');	
		$this->form_validation->set_rules('nama_kategori', 'Nama_kategori', 'trim|required');
		
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('Kategori_model');
		$data['kategori']=$this->Kategori_model->getKategori($id_kategori);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('view_editKategori',$data);

		}else{
			$this->Kategori_model->updateById($id_kategori);
			$this->session->set_flashdata('pesan', 'Update Data Kategori Berhasil  ');
			redirect('kategori/index/');

		}
	}
	public function delete($id_kategori)
	{
		$this->load->model('kategori_model');
		$this->kategori_model->deleteById($id_kategori);
		redirect('kategori');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */