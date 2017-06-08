<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getDataKategori()
		{
			$this->db->select("id_kategori,nama_kategori");
			$query = $this->db->get('kategori');
			return $query->result();
		}

	public function insertKategori()
		{
			$object = array(
				'id_kategori' => $this->input->post('id_kategori'),
				'nama_kategori' => $this->input->post('nama_kategori'),				 
				);
			$this->db->insert('kategori', $object);
		}

		public function getKategori($id_kategori)
		{
			$this->db->where('id_kategori', $id_kategori);	
			$query = $this->db->get('kategori',1);
			return $query->result();

		}

		public function updateById($id_kategori)
		{
			$data = array('id_kategori' => $this->input->post('id_kategori'), 'nama_kategori' => $this->input->post('nama_kategori') );
			$this->db->where('id_kategori', $id_kategori);
			$this->db->update('kategori', $data);

		}
		public function deleteById($id_kategori)
		{
			$this->db->where('id_kategori', $id_kategori);
			$this->db->delete('kategori');
		}

}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */