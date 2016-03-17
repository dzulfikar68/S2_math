<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Site extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Site');
	}
	
	public function index()
	{
		$data['data_artikel']=$this->M_Site->get_artikel();
		$data['data_tautan']=$this->M_Site->get_tautan();
		$data['data_kategori']=$this->M_Site->get_kategori();
		$data['data_file']=$this->M_Site->get_file();
		$data['data_artikel_terbaru']=$this->M_Site->get_artikel_terbaru($id=false,3,2);
		$data['data_slider'] = $this->M_Site->get_slider();
		
		$this->load->template('home',$data,true);
	}
	public function artikel($id,$slug)
	{
		$data['data_artikel']=$this->M_Site->get_artikel($id,$slug);
		$data['data_tautan']=$this->M_Site->get_tautan();
		$data['data_kategori']=$this->M_Site->get_kategori();
		$data['data_file']=$this->M_Site->get_file();
		$data['data_artikel_terbaru']=$this->M_Site->get_artikel_terbaru($id,3,0);
		
		$this->load->template('read_artikel',$data,true);
	}
	
	public function artikel_kategori($id)
	{	
		$this->load->library('pagination');//library paginasi
		
		//atribut paginasi
		$config['base_url'] = site_url('artikel_kategori/'.$this->uri->segment(2));
		$config['total_rows'] = $this->M_Site->record_count($id);
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);

		$start = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       // $data['data_artikel_kategori'] = $this->M_Site->
        //    get_artikel_kategori($id=false,$config['per_page'], $start);
		$str_links = $this->pagination->create_links();
		$data['links'] = explode('&nbsp;',$str_links );	
		$data['data_artikel_kategori'] = $this->M_Site->
            get_artikel_kategori($id,$config['per_page'], $start);
		$data['data_tautan']=$this->M_Site->get_tautan();
		$data['data_kategori']=$this->M_Site->get_kategori();
		$data['data_file']=$this->M_Site->get_file();
		
		$this->load->template('news_category',$data);
	}
	
	public function page($page_name)
	{
		$data['data_tautan']=$this->M_Site->get_tautan();
		$data['data_kategori']=$this->M_Site->get_kategori();
		$data['data_file']=$this->M_Site->get_file();
		
		$this->load->template($page_name,$data);
	}
	
	public function download_file($name)
	{
		$this->load->helper('download');
		$data =  file_get_contents('./assets/uploads/'.$name);
		
		$this->M_Site->count_hits($name);
		
		force_download($name, $data);
		
		
	}
	
		
	public function download()
	{
		$data['data_tautan']=$this->M_Site->get_tautan();
		$data['data_kategori']=$this->M_Site->get_kategori();
		$data['data_file']=$this->M_Site->get_file();
		$data['data_file_all']=$this->M_Site->get_file(true);
		
		$this->load->template('download_area',$data);
	}
	
	
}
