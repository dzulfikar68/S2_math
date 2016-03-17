<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Admin extends CI_Model {
	public function get_admin($id=FALSE)
	{
		if($id===FALSE){
			$query = $this->db->get('db_admin');
			return $query->result_array();
		}
		$query = $this->db->get_where('db_admin', array('id_admin' => $id));
		return $query->row_array();
	}
	
	public function add_admin()
	{
		$date		= getdate();
		$tgl_daftar	= $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
		$data = array(
				'nama_admin' 	=> $this->input->post('nama_admin'),
				'username'		=> $this->input->post('username'),
				'password'		=> $this->input->post('password'),
				'tgl_daftar_admin'=> $tgl_daftar
		);
		
		return $this->db->insert('db_admin', $data);
	}
	
	public function delete_admin($id)
	{
		$this->db->where('id_admin', $id);
		$query = $this->db->delete('db_admin');
		
		//jika admin pernah menulis artikel, maka akan dipindah ke administrator
		$data = array(
				'id_admin' 	=> 24,
            );

		$this->db->where('id_admin', $id);
		$this->db->update('db_artikel', $data);
		
		if($query){
			echo 'oke';
		}
	}
	
	public function edit_admin($id)
	{
		$data = array(
				'nama_admin' 	=> $this->input->post('nama_admin'),
				'username'		=> $this->input->post('username'),
				'password'		=> $this->input->post('password'),
            );

		$this->db->where('id_admin', $id);
		$this->db->update('db_admin', $data); 
	}
}