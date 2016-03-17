<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Upload extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')==false){
			redirect('admin/c_auth/login');
			return;
		}
		$this->load->model('M_Upload');
	}

	public function show_file()
	{
		$data['message'] = $this->session->flashdata('message');
		$this->load->library('pagination');//library paginasi
		
		//atribut paginasi
		$config['base_url'] = site_url('admin/c_upload/show_file');
		$config['total_rows'] = $this->M_Upload->record_count();
		$config['per_page'] = 15;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);

		$start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['data_file'] = $this->M_Upload->
            get_file($id=false,$config['per_page'], $start);
		$str_links = $this->pagination->create_links();
		$data['links'] = explode('&nbsp;',$str_links );
		//$data['data_file']=$this->M_Upload->get_file();
		$this->load->template_admin('admin/show_file',$data);
		
	}
	
	public function c_add_file()
	{
		$data['error'] = '';
		//load semua yang diperlukan
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//konfigurasi untuk upload file
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'pdf|doc|docx';
		$config['max_size'] = '2048';
		$config['file_name'] = $this->input->post('nama_file');
		//load library upload
		$this->load->library('upload', $config);
		
		//set rules
		$this->form_validation->set_rules('nama_file', 'Nama File', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('prioritas', 'Prioritas', 'trim|required|integer');
		
		//cek jika validasi form berhasil
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->template_admin('admin/form_upload',$data);
		}
		//jika validasi form berhasil
		else
		{	//jika upload file gagal
			if ( ! $this->upload->do_upload('input_file'))
			{
				$data['error']= $this->upload->display_errors();
				$this->load->template_admin('admin/form_upload',$data);
			}
			//jika upload sukses
			else
			{
				$this->session->set_flashdata('message', 'File berhasil diupload...');
				$this->M_Upload->add_file();
				redirect('admin/c_upload/show_file');
			}
		}
	}
	
	public function c_delete_file()
	{	
		$this->session->set_flashdata('message', 'File berhasil dihapus...');
		$file = $this->input->post('id');
		$this->M_Upload->delete_file($file);
	}
	
	public function c_edit_file($id)
	{
	
		$data['data_file'] = $this->M_Upload->get_file($id);
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		//set rules
		$this->form_validation->set_rules('nama_file', 'Nama File', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('prioritas', 'Prioritas', 'trim|required|integer');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->template_admin('admin/form_upload',$data);
		}
		else
		{
			$this->session->set_flashdata('message', 'File berhasil diedit...');
			$this->M_Upload->edit_file($id);
			redirect('admin/c_upload/show_file');
		}
	}
	
}
