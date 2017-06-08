<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang_model extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

	public function getDataPengarang()
		{
			$this->db->select("kode_pengarang,nama_pengarang");
			$query = $this->db->get('pengarang');
			return $query->result();
		}

	public function insertPengarang()
		{
			$object = array(
				'kode_pengarang' => $this->input->post('kode_pengarang'),
				'nama_pengarang' => $this->input->post('nama_pengarang'),				 
				);
			$this->db->insert('pengarang', $object);
		}

		public function getPengarang($kode_pengarang)
		{
			$this->db->where('kode_pengarang', $kode_pengarang);	
			$query = $this->db->get('pengarang',1);
			return $query->result();

		}

		public function updateById($kode_pengarang)
		{
			$data = array(
				'kode_pengarang' => $this->input->post('kode_pengarang'), 
				'nama_pengarang' => $this->input->post('nama_pengarang') );
			$this->db->where('kode_pengarang', $kode_pengarang);
			$this->db->update('pengarang', $data);

		}
		public function deleteById($kode_pengarang)
		{
			$this->db->where('kode_pengarang', $kode_pengarang);
			$this->db->delete('pengarang');
		}

}

/* End of file Pengarang_model.php */
/* Location: ./application/models/Pengarang_model.php */