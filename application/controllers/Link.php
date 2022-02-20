<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class link extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$this->load->model('link_m');
	}

	public function index()
	{		
		$data['menu'] = "Data link";
		$data['header_script'] = "datatables-header";			
		$data['footer_script'] = "datatables-footer";	
		$data['row'] = $this->link_m->get();
		$this->templateadmin->load('template/dashboard','link/data',$data);		
	}

	public function edit($id)

	{	
		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('kode', 'kode', 'min_length[3]|is_unique[setting.kode]|max_length[50]');		

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->link_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data link";		
				$this->templateadmin->load('template/dashboard','link/edit',$data);

			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('link')."';</script>";
			}
			
	    } else {
	        $post = $this->input->post(null, TRUE);	        
	        $this->link_m->update($post);
	        if ($this->db->affected_rows() > 0) {
	        	$this->session->set_flashdata('success','Berhasil Di Edit');
	        }	
	        redirect('link');
	    }
	}

	




}
