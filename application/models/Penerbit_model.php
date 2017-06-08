<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getDataPenerbit()
		{
			$this->db->select("kode_penerbit,nama_penerbit");
			$query = $this->db->get('penerbit');
			return $query->result();
		}

	public function insertPenerbit()
		{
			$object = array(
				'kode_penerbit' => $this->input->post('kode_penerbit'),
				'nama_penerbit' => $this->input->post('nama_penerbit'),				 
				);
			$this->db->insert('penerbit', $object);
		}

		public function getPenerbit($kode_penerbit)
		{
			$this->db->where('kode_penerbit', $kode_penerbit);	
			$query = $this->db->get('penerbit',1);
			return $query->result();

		}

		public function updateById($kode_penerbit)
		{
			$data = array(
				'kode_penerbit' => $this->input->post('kode_penerbit'), 
				'nama_penerbit' => $this->input->post('nama_penerbit') );
			$this->db->where('kode_penerbit', $kode_penerbit);
			$this->db->update('penerbit', $data);

		}
		public function deleteById($kode_penerbit)
		{
			$this->db->where('kode_penerbit', $kode_penerbit);
			$this->db->delete('penerbit');
		}

	

}

/* End of file Penerbit_model.php */
/* Location: ./application/models/Penerbit_model.php */