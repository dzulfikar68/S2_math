<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Tautan extends CI_Model {
	public function get_tautan($id=FALSE)
	{
		if($id===FALSE){
			$this->db->order_by('prioritas'); 
			$query = $this->db->get('db_tautan');
			return $query->result_array();
		}
		$query = $this->db->get_where('db_tautan', array('id_tautan' => $id));
		return $query->row_array();
	}
	
	public function add_tautan()
	{
		$data = array(
				'nama_tautan' 	=> $this->input->post('nama_tautan'),
				'link_tautan'	=> $this->input->post('link_tautan'),
				'tampil_tautan'	=> $this->input->post('tampil_tautan'),
				'prioritas'		=> $this->input->post('prioritas')
		);
		
		return $this->db->insert('db_tautan', $data);
	}
	
	public function delete_tautan($id)
	{
		$this->db->where('id_tautan', $id);
		$query = $this->db->delete('db_tautan'); 
		
		if($query){
			echo 'oke';
		}
		
	}
	
	public function edit_tautan($id)
	{
		$data = array(
				'nama_tautan' 	=> $this->input->post('nama_tautan'),
				'link_tautan'	=> $this->input->post('link_tautan'),
				'tampil_tautan'	=> $this->input->post('tampil_tautan'),
				'prioritas'		=> $this->input->post('prioritas')
		);

		$this->db->where('id_tautan', $id);
		$this->db->update('db_tautan', $data); 
	}
}