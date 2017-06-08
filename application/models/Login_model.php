<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function daftar($data)
       {
            $this->db->insert('admin',$data);
       }
       
	public function login($username,$password)
	{
		$this->db->select('id,username,password');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$query = $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}
	

}

/* End of file User.php */
/* Location: ./application/models/User.php */

 ?>