<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

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


	public function getDataAnggota()
	{
		$this->db->select("nim,nama,alamat,notelp, DATE_FORMAT(tglLahir,'%d-%m-%Y') as tglLahir, foto");
			$query = $this->db->get('anggota');
			return $query->result();
	}

	public function insertAnggota()
		{
			$object = array(
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'notelp' => $this->input->post('notelp'),
				'tglLahir' => $this->input->post('tglLahir'),
				'foto' => $this->upload->data('file_name')
				 
				);
			$this->db->insert('user', $object);
		}

		public function getAnggota($nim)
		{
			$this->db->where('nim', $nim);	
			$query = $this->db->get('anggota',1);
			return $query->result();

		}

		public function updateById($nim)
		{
			$data = array(
				'nim' => $this->input->post('nim'),
				'nama' => $this->input->post('nama'),	
				'alamat' => $this->input->post('alamat'),
				'notelp' => $this->input->post('notelp'),
				'tglLahir' => $this->input->post('tglLahir'),
				'foto' => $this->upload->data('file_name'),					 
				);
			$this->db->where('anggota', $nim);
			$this->db->update('anggota', $data);

		}
		public function deleteById($nim)
		{
			$this->db->where('nim', $nim);
			$this->db->delete('anggota');
		}


}

/* End of file Anggota_model.php */
/* Location: ./application/models/Anggota_model.php */