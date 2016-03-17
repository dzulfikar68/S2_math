<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin');
		if($this->session->userdata('logged_in')==false){
			redirect('admin/c_auth/login');
		}
	}

	public function show_admin()
	{
		$data['message'] = $this->session->flashdata('message');
		$data['data_admin'] = $this->M_Admin->get_admin();
		
		$this->load->template_admin('admin/show_admin',$data);
	}
	public function show_admin_spec($id){
		$data['data_admin'] = $this->M_Admin->get_admin($id);
		$data['page'] = 'show_admin';
		if (empty($data['data_admin']))
		{
			show_404();
			return;
		}
		$this->load->view('admin/template',$data);
	}
	public function c_add_admin()
	{
		//load semua yang diperlukan
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->load->model('M_Admin');
		//set rules
		$this->form_validation->set_rules('nama_admin', 'Nama', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[db_admin.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[re_password]|md5');
		$this->form_validation->set_rules('re_password', 'konfirmasi password', 'trim|required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->template_admin('admin/form_admin');
		}
		else
		{
			$this->session->set_flashdata('message', 'Admin berhasil ditambahkan...');
			$this->M_Admin->add_admin();
			redirect('admin/c_admin/show_admin');
		}
	}
	
	public function c_delete_admin()
	{	
		$this->session->set_flashdata('message', 'Admin berhasil dihapus...');
		$id = $this->input->post('id');
		$this->M_Admin->delete_admin($id);
	}
	
	public function c_edit_admin($id)
	{
		//$this->M_Admin->edit_admin($id);
		$data['data_admin'] = $this->M_Admin->get_admin($id);
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->load->model('M_Admin');
		//set rules
		$this->form_validation->set_rules('nama_admin', 'Nama', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[re_password]|md5');
		$this->form_validation->set_rules('re_password', 'trim|Confirm Password', 'trim|required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->template_admin('admin/form_admin',$data);
		}
		else
		{
			$this->session->set_flashdata('message', 'Admin berhasil diedit...');
			$this->M_Admin->edit_admin($id);
			redirect('admin/c_admin/show_admin');
		}
	}
	
}
