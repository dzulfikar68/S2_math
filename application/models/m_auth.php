<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Auth extends CI_Model {
	public function cek_admin($username,$password)
	{
		$query = $this->db->get_where('db_admin', array('username' => $username, 'password' => $password));
		
		if($query){
			$date		= getdate();
			$tgl_login	= $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
			$data = array(
				'tgl_last_visit' => $tgl_login
			);
			$this->db->where('username', $username);
			$this->db->update('db_admin', $data); 
		}
		return $query->row();
	}
	
	public function get_data_admin($username)
	{
		$query = $this->db->get_where('db_admin', array('username' =>$username));
		return $query->row_array();
	}
	
	public function get_admin()
	{	
		$this->db->order_by('tgl_last_visit','DESC'); 		
		$query = $this->db->get('db_admin');
		return $query->result_array();
	}
}