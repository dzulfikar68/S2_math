<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Upload extends CI_Model {
	public function get_file($id=FALSE,$limit=false,$start=false)
	{	
		if($id===FALSE){
			$this->db->order_by('prioritas'); 
			//$this->db->limit($limit, $start);
			$query = $this->db->get('db_file',$limit,$start);
			return $query->result_array();
		}
		$query = $this->db->get_where('db_file', array('id_file' => $id));
		return $query->row_array();
	}
	private function slug_gen($string) 
	{
		//Lower case everything
		$string = strtolower($string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}
	public function add_file()
	{	
		$data_file	= $this->upload->data();//mengambil data dari file
		$date		= getdate();
		$tgl_input	= $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
		$data = array(
				'judul_file' 		=> $this->input->post('nama_file'),
				'nama_file' 		=> $data_file['file_name'],
				'url_file'			=> site_url('/assets/uploads/'.$data_file['file_name']),
				'tgl_insert_file'	=> $tgl_input,
				'tampil_file'		=> $this->input->post('tampil_file'),
				'prioritas'			=> $this->input->post('prioritas'),
				'slug'				=> $this->slug_gen($this->input->post('nama_file'))
		);
		
		return $this->db->insert('db_file', $data);
	}
	
	public function delete_file($file)
	{
		
		$this->db->where('nama_file', $file);
		$query = $this->db->delete('db_file'); 

		
		if($query){
			unlink('./assets/uploads/'.$file);
			echo 'oke';
		}
		
	}
	
	public function edit_file($id)
	{
		$date		= getdate();
		$tgl_update	= $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
		$data = array(
				'judul_file' 		=> $this->input->post('nama_file'),
				'tgl_update_file'	=> $tgl_update,
				'tampil_file'		=> $this->input->post('tampil_file'),
				'prioritas'			=> $this->input->post('prioritas')
		);

		$this->db->where('id_file', $id);
		$this->db->update('db_file', $data); 
	}
	
	public function record_count()
	{
		return $this->db->count_all("db_file");
	}
}