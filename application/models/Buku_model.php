<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getDataBuku()
		{
			$this->db->select("kode_buku, foto, judul,nama_kategori,nama_pengarang,nama_penerbit");
			$this->db->join('kategori', 'kategori.id_kategori = buku.kategori', 'left');
			$this->db->join('pengarang', 'pengarang.kode_pengarang = buku.pengarang', 'left');
			$this->db->join('penerbit', 'penerbit.kode_penerbit = buku.penerbit', 'left');
			$query = $this->db->get('buku');
			return $query->result();
		}
		
	public function getKategori()
	{
		$this->db->select('id_kategori,nama_kategori');
		$query=$this->db->get('kategori');
		return $query->result();
	}

	public function getPengarang()
	{
		$this->db->select('kode_pengarang,nama_pengarang');
		$query=$this->db->get('pengarang');
		return $query->result();
	}

	public function getPenerbit()
	{
		$this->db->select('kode_penerbit,nama_penerbit');
		$query=$this->db->get('penerbit');
		return $query->result();
	}

	public function insertBuku()
		{
			$object = array(
				'kode_buku' => $this->input->post('kode_buku'),
				'foto' => $this->upload->data('file_name'),
				'judul' => $this->input->post('judul'),
				'kategori' => $this->input->post('kategori'),
				'pengarang' => $this->input->post('pengarang'),
				'penerbit' => $this->input->post('penerbit'),
				
				);
			$this->db->insert('buku', $object);
		}

		public function getBuku($kode_buku)
		{
			$this->db->where('kode_buku', $kode_buku);	
			$query = $this->db->get('buku',1);
			return $query->result();

		}

		public function updateById($kode_buku)
		{
			$data = array(
				'kode_buku' => $this->input->post('kode_buku'),
				'foto' => $this->upload->data('file_name'),
				'judul' => $this->input->post('judul'),
				'kategori' => $this->input->post('kategori'),
				'pengarang' => $this->input->post('pengarang'),
				'penerbit' => $this->input->post('penerbit'),
			
				 );
			$this->db->where('', $kode_buku);
			$this->db->update('buku', $data);

		}

		public function deleteById($kode_buku) 
		{
			$this->db->where('kode_buku',$kode_buku);
			$this->db->delete('buku');
		}

}

/* End of file Buku_model.php */
/* Location: ./application/models/Buku_model.php */