<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Site extends CI_Model {
	public function get_artikel($id=FALSE,$slug=false)
	{
		if($id===FALSE){
			$this->db->select('*');
			$this->db->from('db_artikel a');
			$this->db->join('db_admin ad','a.id_admin = ad.id_admin');
			$this->db->join('db_kategori k','a.id_kategori = k.id_kategori');
			$this->db->order_by('tgl_insert_artikel','DESC'); 
			$this->db->limit(2,0);
			$this->db->where('a.tampil_artikel',1);
			$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->select('*');
		$this->db->from('db_artikel a');
		$this->db->join('db_admin ad','a.id_admin = ad.id_admin');
		$this->db->join('db_kategori k','a.id_kategori = k.id_kategori');
		$this->db->where('a.id_artikel',$id);
		$this->db->where('a.slug',$slug);
		$query = $this->db->get();
		
		//update hits
		$this->db->set('hits', 'hits+1', FALSE);
		$this->db->where('id_artikel', $id);
		$this->db->update('db_artikel');

		return $query->row_array();
	}
	
	public function get_artikel_terbaru($id=false,$limit,$start)
	{	
		if($id===false){
			$this->db->order_by('tgl_insert_artikel','DESC');
			$query = $this->db->get_where('db_artikel',array('tampil_artikel'=>1),$limit,$start);
			return $query->result_array();
		}
		$data = array(
			'tampil_artikel'	=> 1,
			'id_artikel !='		=> $id
		);
		$this->db->order_by('tgl_insert_artikel','DESC');
		$query = $this->db->get_where('db_artikel',$data,$limit,$start);
		return $query->result_array();
	}
	
	public function get_tautan($id=false)
	{
		if($id===FALSE){
			$this->db->select('*');
			$this->db->from('db_tautan');
			$this->db->order_by('prioritas'); 
			$this->db->where('tampil_tautan',1);
			$query = $this->db->get();
			return $query->result_array();
		}
		$this->db->select('*');
		$this->db->from('db_tautan');
		$this->db->where('tampil_tautan',1);
		$this->db->where('id_tautan',$id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_kategori()
	{
		$query = $this->db->get_where('db_kategori', array('tampil_kategori' => 1));
		return $query->result_array();
	}
	
	public function get_file($all=false)
	{
		if($all){
			$this->db->order_by('prioritas'); 
			$query = $this->db->get_where('db_file', array('tampil_file' => 1));
			return $query->result_array();
		}
		$this->db->order_by('prioritas');
		$query = $this->db->get_where('db_file', array('tampil_file' => 1),3,0);
		return $query->result_array();
	}
	
	public function get_slider()
	{
		$this->db->order_by('prioritas');
		$query = $this->db->get('db_media');
		return $query->result_array();
	}
	
	public function get_artikel_kategori($id=false,$limit=false,$start=false)
	{
		$this->db->select('*');
		$this->db->from('db_artikel a');
		$this->db->join('db_admin ad','a.id_admin = ad.id_admin');
		$this->db->join('db_kategori k','a.id_kategori = k.id_kategori');
		$this->db->order_by('tgl_insert_artikel','DESC'); 
		$this->db->limit($limit,$start);
		$this->db->where('a.tampil_artikel',1);
		$this->db->where('a.id_kategori',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function record_count($id=false)
	{	
		$this->db->where('tampil_artikel',1);
		$this->db->where('id_kategori',$id);
		$this->db->from('db_artikel');
		return $this->db->count_all_results();
	}
	
	public function count_hits($name)
	{
		//menambah jumlah hits untuk file yang didownload
		//perlu diketahui bahwa nama_file adalah unik
		$this->db->set('hits', 'hits+1', FALSE);
		$this->db->where('nama_file',$name);
		$this->db->update('db_file');
	
	}
	
}