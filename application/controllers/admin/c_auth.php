<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Auth');
	}
	
	public function login()
	{
		//load form_validation dan form
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//inisialisasi data
		$data = array();
		
		//set_rules validasi
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		
		if ($this->form_validation->run() === FALSE)//jika gagal/tidak memenuhi aturan
		{
			$this->load->view('admin/login');		
		}
		else //jika berhasil/memenuhi aturan
		{
			$row = $this->M_Auth->cek_admin($this->input->post('username'),$this->input->post('password'));//cek apakah user terdaftar
			if($row!=Null){	//jika terdaftar
				$data_admin = $this->M_Auth->get_data_admin($this->input->post('username'));
				$sess_array = array(
				'id_admin'	=> $data_admin['id_admin'],
				'username' => $data_admin['username'],
				'logged_in' => TRUE
				);
				
				$this->session->set_userdata($sess_array);
				redirect('admin/c_auth/home_admin');
				return;
			}else{
				$data['error'] = 'Gagal Login, username/password tidak terdaftar';
				$this->load->view('admin/login',$data);
			}
		}
		
	}
	
	public function home_admin()
	{	
		if($this->session->userdata('logged_in')==false){
			redirect('admin/c_auth/login');
			return;
		}
	
		$data['session'] = $this->session->all_userdata();
		$data['data_admin'] = $this->M_Auth->get_admin();
		//$data['page']		= 'home_admin';
		//$this->load->template_admin('admin/show_artikel',$data); sementara
		//redirect('admin/c_artikel/show_artikel');
		
		$this->load->template_admin('admin/welcome',$data);
	}
	
	public function logout()
	{
		if($this->session->userdata('logged_in')==false){
			redirect('admin/c_auth/login');
			return;
		}
		$this->session->sess_destroy();
		redirect ('admin/c_auth/login');
	}
	
}

/* End of file c_auth.php */
/* Location: ./application/controllers/admin/c_auth.php */