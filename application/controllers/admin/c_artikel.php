<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Artikel extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')==false){
			redirect('admin/c_auth/login');
			return;
		}
		$this->load->model('M_Artikel');
	}

	public function show_artikel()
	{
		
		$data['message'] = $this->session->flashdata('message');
		$this->load->library('pagination');//library paginasi
		
		//atribut paginasi
		$config['base_url'] = site_url('admin/c_artikel/show_artikel');
		$config['total_rows'] = $this->M_Artikel->record_count();
		$config['per_page'] = 15;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['data_artikel'] = $this->M_Artikel->
            get_artikel($id=false,$config['per_page'], $start);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$this->load->template_admin('admin/show_artikel',$data);
		
	}
	
	public function c_add_artikel()
	{
		//load semua yang diperlukan
		$this->load->helper('form');
		$this->load->library('form_validation');
		//set rules
		$this->form_validation->set_rules('judul', 'Judul Artikel', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'trim|required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->template_admin('admin/form_artikel');
		}
		else
		{
			$this->session->set_flashdata('message', 'Artikel berhasil ditambahkan...');
			$this->M_Artikel->add_artikel();
			redirect('admin/c_artikel/show_artikel');
		}
	}
	
	public function c_delete_artikel()
	{	
		$id = $this->input->post('id');
		$delete = $this->M_Artikel->delete_artikel($id);
		if($delete){
			echo 'oke';
		}
	}
	
	public function c_edit_artikel($id)
	{
	
		$data['data_artikel'] = $this->M_Artikel->get_artikel($id);
			
		$this->load->helper('form');
		$this->load->library('form_validation');

		//set rules
		$this->form_validation->set_rules('judul', 'Judul Artikel', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'trim|required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->template_admin('admin/form_artikel',$data);
		}
		else
		{
			$this->session->set_flashdata('message', 'Artikel berhasil diedit...');
			$this->M_Artikel->edit_artikel($id);
			redirect('admin/c_artikel/show_artikel');
		}
	}
	
	public function c_preview_artikel($id){
		$data['data_artikel'] = $this->M_Artikel->get_artikel($id);
		$this->load->template_admin('admin/preview_artikel',$data);
	}
	
}
