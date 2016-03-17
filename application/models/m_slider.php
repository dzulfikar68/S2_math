<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Slider extends CI_Model {
	public function get_slider($id=FALSE,$limit=false,$start=false)
	{	
		if($id===FALSE){
			$this->db->order_by('prioritas'); 
			//$this->db->limit($limit, $start);
			$query = $this->db->get('db_media');
			return $query->result_array();
		}
		$query = $this->db->get_where('db_media', array('id_media' => $id));
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
	public function add_slider()
	{	
		$string = $this->input->post('label_slider');
		//menghapus multiple spasi dan dash
		$string = preg_replace("/[\s-]+/", " ", $string);
		//merubah spasi dan dash ke underscore
		$string = preg_replace("/[\s-]/", "_", $string);
			
		$filename=$string.'.png';
		//$date		= getdate();
		//$tgl_input	= $date['year'].'-'.$date['mon'].'-'.$date['mday'].' '.$date['hours'].':'.$date['minutes'].':'.$date['seconds'];
		$data = array(
				'label' 			=> $this->input->post('label_slider'),
				'nama_media' 		=> $filename,
				'url_media'			=> site_url('/assets/images/slider/'.$filename.''),
				'tampil_media'		=> $this->input->post('tampil_slider'),
				'prioritas'			=> $this->input->post('prioritas')
		);
		
		return $this->db->insert('db_media', $data);
	}
	
	public function delete_slider($nama_slider)
	{
		
		$this->db->where('nama_media', $nama_slider);
		$query = $this->db->delete('db_media'); 
		
		
		if($query){
			unlink('./assets/images/slider/'.$nama_slider);
			echo 'oke';
		}
		
	}
	
	/*public function edit_file($id)
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
	}*/
	/*
	public function record_count()
	{
		return $this->db->count_all("db_file");
	}*/
}