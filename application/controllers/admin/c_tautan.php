<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Tautan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('logged_in')==false){
			redirect('admin/c_auth/login');
			return;
		}
		$this->load->model('M_Tautan');
	}

	public function show_tautan()
	{
		$data['message'] = $this->session->flashdata('message');
		$data['data_tautan'] = $this->M_Tautan->get_tautan();
		

		$this->load->template_admin('admin/show_tautan',$data);
	}
	public function show_tautan_spec($id){
		$data['data_tautan'] = $this->M_Tautan->get_tautan($id);
		$data['page'] = 'show_tautan';
		if (empty($data['data_tautan']))
		{
			show_404();
			return;
		}
		$this->load->view('admin/template',$data);
	}
	public function c_add_tautan()
	{
		//load semua yang diperlukan
		$this->load->helper('form');
		$this->load->library('form_validation');

		//set rules
		$this->form_validation->set_rules('nama_tautan', 'Nama Tautan', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('link_tautan', 'Link', 'trim|required|prep_url');
		$this->form_validation->set_rules('prioritas', 'Prioritas', 'trim|required|integer');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->template_admin('admin/form_tautan');
		}
		else
		{
			$this->session->set_flashdata('message', 'Tautan berhasil ditambahkan...');
			$this->M_Tautan->add_tautan();
			redirect('admin/c_tautan/show_tautan');
		}
	}
	
	public function c_delete_tautan()
	{	
		$this->session->set_flashdata('message', 'Tautan berhasil dihapus...');
		$id = $this->input->post('id');
		$this->M_Tautan->delete_tautan($id);
	}
	
	public function c_edit_tautan($id)
	{

		$data['data_tautan'] = $this->M_Tautan->get_tautan($id);
		
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		//set rules
		$this->form_validation->set_rules('nama_tautan', 'Nama Tautan', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('link_tautan', 'Link', 'trim|required|prep_url');
		$this->form_validation->set_rules('prioritas', 'Prioritas', 'trim|required|integer');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->template_admin('admin/form_tautan',$data);
		}
		else
		{
			$this->session->set_flashdata('message', 'Tautan berhasil diedit...');
			$this->M_Tautan->edit_tautan($id);
			redirect('admin/c_tautan/show_tautan');
		}
	}
	
}
