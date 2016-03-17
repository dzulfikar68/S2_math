<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Slider extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')==false){
			redirect('admin/c_auth/login');
			return;
		}
		$this->load->model('M_Slider');
	}

	public function show_slider()
	{
		$data['message'] = $this->session->flashdata('message');
		/*$this->load->library('pagination');//library paginasi
		
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
		$data['links'] = explode('&nbsp;',$str_links );*/
		$data['data_slider']=$this->M_Slider->get_slider();
		$this->load->template_admin('admin/show_slider',$data);
		
	}
	
	public function c_add_slider()
	{
		$this->load->helper('file');
		
		$data['message'] = $this->session->flashdata('message');
		$data['error'] = '';
		//load semua yang diperlukan
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		//set rules
		$this->form_validation->set_rules('label_slider', 'Label Slider', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('prioritas', 'Prioritas', 'trim|required|integer');
		
		//cek jika validasi form berhasil
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->template_admin('admin/form_slider',$data);
		}
		//jika validasi form berhasil
		else
		{	
			$string = $this->input->post('label_slider');
			//menghapus multiple spasi dan dash
			$string = preg_replace("/[\s-]+/", " ", $string);
			//merubah spasi dan dash ke underscore
			$string = preg_replace("/[\s-]/", "_", $string);
			
			$filename=$string.'.png';
			
			$image = read_file('./assets/temp/temp_image.png');
			
			//cek apakah berhasil dibaca
			if($image){
				$write_image = write_file('./assets/images/slider/'.$filename.'', $image);
				
				//cek apakah sukses menulis kembali
				if($write_image){
					$this->session->set_flashdata('message', 'Slider berhasil ditambahkan...');
					$this->M_Slider->add_slider();
					redirect('admin/c_slider/show_slider');
				}else{
					$this->session->set_flashdata('message', 'terjadi kesalahan, harap diulang kembali...');
					$this->load->template_admin('admin/form_slider',$data);
				}//end cek write_image
			}else{
				$this->session->set_flashdata('message', 'terjadi kesalahan, harap diulang kembali...');
				$this->load->template_admin('admin/form_slider',$data);
			}//end cek image
			
		}//end cek form validastion
	}
	
	public function c_delete_slider()
	{	
		$this->session->set_flashdata('message', 'Slider berhasil dihapus...');
		$nama_slider = $this->input->post('id');//id adalah nama variabel fungsi javascript
		$this->M_Slider->delete_slider($nama_slider);
	}
	
	public function c_upload_slider(){
		$value = $this->input->post('value');
		$exp = explode(',', $value);
    $base64 = array_pop($exp);
    $data = base64_decode($base64);
    $file = 'assets/temp/temp_image.png';
    file_put_contents($file, $data);
		
		echo 'sukses';
	}	
	
	/*public function c_edit_file($id)
	{
	
		$data['data_file'] = $this->M_Upload->get_file($id);
		$data['title']		= 'EDIT FILE';
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		//set rules
		$this->form_validation->set_rules('nama_file', 'Nama File', 'trim|required|max_length[100]');
		
		if ($this->form_validation->run() === FALSE)
		{
			$data['page']='form_artikel';
			$this->load->view('admin/template',$data);
		}
		else
		{
			$this->M_Artikel->edit_artikel($id);
			redirect('admin/C_Artikel/show_artikel');
		}
	}*/
	
}
