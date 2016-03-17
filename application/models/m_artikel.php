<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Artikel extends CI_Model {
	public function get_artikel($id=FALSE,$limit=false,$start=false)
	{
		if($id===FALSE){
			$this->db->select('*');
			$this->db->from('db_artikel a');
			$this->db->join('db_admin ad','a.id_admin = ad.id_admin');
			$this->db->join('db_kategori k','a.id_kategori = k.id_kategori');
			$this->db->order_by("tgl_insert_artikel","DESC"); 
			$this->db->limit($limit, $start);
			$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->select('*');
		$this->db->from('db_artikel a');
		$this->db->join('db_admin ad','a.id_admin = ad.id_admin');
		$this->db->join('db_kategori k','a.id_kategori = k.id_kategori');
		$this->db->where('id_artikel',$id);
		$query = $this->db->get();
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
	public function add_artikel()
	{
		$date		= getdate();
		$tgl_input	= $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
		$data = array(
				'id_kategori' 		=> $this->input->post('kategori'),
				'judul_artikel' 	=> $this->input->post('judul'),
				'isi_artikel'		=> $this->input->post('isi_artikel'),
				'tgl_insert_artikel'=> $tgl_input,
				'tampil_artikel'	=> $this->input->post('tampil_artikel'),
				'id_admin'			=> $this->session->userdata['id_admin'],
				'slug'				=> $this->slug_gen($this->input->post('judul'))
		);
		
		return $this->db->insert('db_artikel', $data);
	}
	
	public function delete_artikel($id)
	{
		$this->db->where('id_artikel', $id);
		$query = $this->db->delete('db_artikel'); 
		
		return $query;
		
	}
	
	public function edit_artikel($id)
	{
		$date		= getdate();
		$tgl_update	= $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
		$data = array(
				'id_kategori' 		=> $this->input->post('kategori'),
				'judul_artikel' 	=> $this->input->post('judul'),
				'isi_artikel'		=> $this->input->post('isi_artikel'),
				'tgl_update_artikel'=> $tgl_update,
				'tampil_artikel'	=> $this->input->post('tampil_artikel'),
				'slug'				=> $this->slug_gen($this->input->post('judul'))
		);

		$this->db->where('id_artikel', $id);
		$this->db->update('db_artikel', $data); 
	}
	
	public function record_count()
	{
		return $this->db->count_all("db_artikel");
	}
}