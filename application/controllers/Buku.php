<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

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
		$this->load->model('buku_model');

		$data["buku_list"] = $this->buku_model->getDataBuku();
		$data["kategori_list"] = $this->buku_model->getKategori();
		$data["pengarang_list"] = $this->buku_model->getPengarang();
		$data["penerbit_list"] = $this->buku_model->getPenerbit();
		$this->load->view('view_buku',$data);
		
	}

	public function create()
	{
		$this->load->model('kategori_model');
		$data["kategori_list"] = $this->kategori_model->getDataKategori();
		$this->load->model('pengarang_model');
		$data["pengarang_list"] = $this->pengarang_model->getDataPengarang();
		$this->load->model('penerbit_model');
		$data["penerbit_list"] = $this->penerbit_model->getDataPenerbit();

		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode_buku', 'Kode_buku', 'trim|required');

		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');

		$this->load->model('buku_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('view_tambahBuku',$data);
		}
			else
			{
				$config['upload_path']          = './assets/upload/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 1000000000;
				$config['max_width']            = 3000;
				$config['max_height']           = 3000;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto')){
						$error = array('error' => $this->upload->display_errors());
						var_dump($error);
						//$this->load->view('tambah_pegawai_view',$error);
				} else {
						$this->buku_model->insertBuku();
						$this->session->set_flashdata('pesan', 'Tambah Data Buku Berhasil  ');
						redirect('buku/index/');
				}

			}
	}

	public function update($kode_buku)
	{
		//load library
		$this->load->model('kategori_model');
		$data["kategori_list"] = $this->kategori_model->getDataKategori();
		$this->load->model('pengarang_model');
		$data["pengarang_list"] = $this->pengarang_model->getDataPengarang();
		$this->load->model('penerbit_model');
		$data["penerbit_list"] = $this->penerbit_model->getDataPenerbit();
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kode_buku', 'Kode_buku', 'trim|required');

		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'trim|required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required');

		
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('buku_model');
		$data['buku']=$this->buku_model->getBuku($kode_buku);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('view_editBuku',$data);

		}else{
				$config['upload_path']          = './assets/upload/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_size']             = 1000000000;
				$config['max_width']            = 1024;
				$config['max_height']           = 768;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto')){
						$error = array('error' => $this->upload->display_errors());
						var_dump($error);
						//$this->load->view('tambah_pegawai_view',$error);
				} else {
						$this->buku_model->updateById($kode_buku);
						$this->session->set_flashdata('pesan', 'Ubah Data Kelas '.$kode_buku. ' Berhasil ');
						redirect('buku/index/'.$kode_buku);
				}

		}
	}

	public function delete($kode_buku)
 	{ 
 	 	$this->load->model('buku_model');
  		$this->buku_model->deleteById($kode_buku);
 	 	redirect('buku');
	 }

}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */