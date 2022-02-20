<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class edukasafe extends CI_Controller {

	public function __construct(){
		parent::__construct();
		check_not_login();
		$previllage = 1;
		check_super_user($this->session->tipe_user,$previllage);
		$this->load->model('edukasafe_m');
	}

	public function index()
	{		
		$data['menu'] = "Update Edukasafe Terbaru";

		//Pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('edukasafe/index');
		$config['total_rows'] = $this->edukasafe_m->get()->num_rows(); 		
		$config['per_page'] = 10;
		//Halaman
		$config['start'] = $this->uri->segment(3);
		//Style Pagination
		$config['first_link']       = 'Awal';
	    $config['last_link']        = 'Terakhir';
	    $config['next_link']        = '>>';
	    $config['prev_link']        = '<<';
	    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	    $config['full_tag_close']   = '</ul></nav></div>';
	    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	    $config['num_tag_close']    = '</span></li>';
	    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['prev_tagl_close']  = '</span>Next</li>';
	    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	    $config['first_tagl_close'] = '</span></li>';
	    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		//Mulai
		$data['row'] = $this->edukasafe_m->get_edukasafe($config['per_page'],$config['start']);
		$this->templateadmin->load('template/dashboard','edukasafe/edukasafe_data',$data);
	}

	public function kategori()
	{		
		$data['menu'] = "Update edukasafe Terbaru";

		//Pagination
		$this->load->library('pagination');
		$config['base_url'] = base_url('edukasafe/kategori/index');
		$config['total_rows'] = $this->edukasafe_m->get()->num_rows(); 		
		$config['per_page'] = 10;
		$kategori = $this->uri->segment(3);
		if (!isset($kategori)) { redirect(''); }
		//Halaman
		$config['start'] = $this->uri->segment(4);
		//Style Pagination
		$config['first_link']       = 'Awal';
	    $config['last_link']        = 'Terakhir';
	    $config['next_link']        = '>>';
	    $config['prev_link']        = '<<';
	    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	    $config['full_tag_close']   = '</ul></nav></div>';
	    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	    $config['num_tag_close']    = '</span></li>';
	    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	    $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['prev_tagl_close']  = '</span>Next</li>';
	    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	    $config['first_tagl_close'] = '</span></li>';
	    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	    $config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		//Mulai
		$data['row'] = $this->edukasafe_m->get_edukasafe_kategori($kategori,$config['per_page'],$config['start']);
		$this->templateadmin->load('template/dashboard','edukasafe/edukasafe_data',$data);
	}

	public function detail($id)
	{					
		$query = $this->edukasafe_m->get($id);
		if ($query->num_rows() > 0) {
			$data['data'] = $query->row();
			$data['menu'] = "Detail edukasafe";			
			$this->templateadmin->load('template/dashboard','edukasafe/edukasafe_detail',$data);
		} else {
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('user')."';</script>";
		}				    
	}

	public function tambah()
	{
		//Mencegah user yang bukan haknya
		$previllage = 3;
		check_super_user($this->fungsi->user_login()->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|is_unique[tb_edukasafe.judul]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['menu'] = "Tambah Data Edukasafe";
			$data['header_script'] = "summernote-header";			
			$data['footer_script'] = "summernote-footer";			
			$this->templateadmin->load('template/dashboard','edukasafe/tambah',$data);
	    } else {
        $post = $this->input->post(null, TRUE);	                        

        //CEK GAMBAR
        $config['upload_path']          = 'assets/dist/img/foto-edukasafe/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 5000;
        $config['file_name']            = strtoupper($post['judul']);

				$this->load->library('upload', $config);
				if (@$_FILES['foto']['name'] != null) {						
						$this->upload->initialize($config);
				  	if ($this->upload->do_upload('foto')) {
				  	 	$post['foto'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('edukasafe/tambah');
		        }			    	  	 	
				}

				//CEK GAMBAR
        $config2['upload_path']          = 'assets/dist/img/file-edukasafe/';
        $config2['allowed_types']        = 'doc|docx|pdf|ppt|pptx';
        $config2['max_size']             = 6000;
        $config2['file_name']            = strtoupper($post['judul']);

				$upload_2 = $this->load->library('upload', $config2);
				if (@$_FILES['file']['name'] != null) {
						$this->upload->initialize($config2);
				  	if ($this->upload->do_upload('file')) {
				  	 	$post['file'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('edukasafe/tambah');
		        }
		    }				
			 
				$this->edukasafe_m->simpan($post);
	    	if ($this->db->affected_rows() > 0) {
	    		$this->session->set_flashdata('success','Berhasil Di Publish');
	    	}	  	 	
	      redirect('edukasafe');	        	
	    }
	}

	public function edit($id)
	{			
		//Mencegah user yang bukan haknya
		$previllage = 3;
		check_super_user($this->session->tipe_user,$previllage);

		//Load librarynya dulu
		$this->load->library('form_validation');
		//Atur validasinya
		$this->form_validation->set_rules('judul', 'judul', 'min_length[3]|max_length[50]');

		//Pesan yang ditampilkan
		$this->form_validation->set_message('min_length', '{field} Setidaknya  minimal {param} karakter.');
		$this->form_validation->set_message('max_length', '{field} Seharusnya maksimal {param} karakter.');
		$this->form_validation->set_message('alpha_dash', 'Gak Boleh pakai Spasi');
		$this->form_validation->set_message('is_unique', 'Data sudah ada');
		//Tampilan pesan error
		$this->form_validation->set_error_delimiters('<span class="badge badge-danger">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->edukasafe_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['menu'] = "Edit Data Edukasafe";
				$data['header_script'] = "summernote-header";			
				$data['footer_script'] = "summernote-footer";			
				$this->templateadmin->load('template/dashboard','edukasafe/edit',$data);
			} else {
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('edukasafe')."';</script>";
			}
			
	    } else {
	      $post = $this->input->post(null, TRUE);	        
	        
	      //CEK GAMBAR
        $config['upload_path']          = 'assets/dist/img/foto-edukasafe/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 5000;
        $config['file_name']            = strtoupper($post['judul']);

				$this->load->library('upload', $config);
				if (@$_FILES['foto']['name'] != null) {						
						$this->upload->initialize($config);
				  	if ($this->upload->do_upload('foto')) {
				  	 	$post['foto'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('edukasafe/tambah');
		        }			    	  	 	
				}

				//CEK GAMBAR
        $config2['upload_path']          = 'assets/dist/img/file-edukasafe/';
        $config2['allowed_types']        = 'doc|docx|pdf|ppt|pptx';
        $config2['max_size']             = 6000;
        $config2['file_name']            = strtoupper($post['judul']);

				$upload_2 = $this->load->library('upload', $config2);
				if (@$_FILES['file']['name'] != null) {
						$this->upload->initialize($config2);
				  	if ($this->upload->do_upload('file')) {
				  	 	$post['file'] = $this->upload->data('file_name');
	        	} else {
							$pesan = $this->upload->display_errors();
							$this->session->set_flashdata('danger',$pesan);
							redirect('edukasafe/tambah');
		        }
		    }
			 
				$this->edukasafe_m->update($post);
		    	if ($this->db->affected_rows() > 0) {
		    		$this->session->set_flashdata('success','Berhasil Di Edit');
		    	}	  	 	
		        redirect('edukasafe');
		    }
	}

	function hapusfoto(){
		//Mencegah user yang bukan haknya
		$previllage = 3;
		check_super_user($this->session->tipe_user,$previllage);

	  $id = $this->uri->segment(3);
		

		//Action		  
		$itemfoto = $this->edukasafe_m->get($id)->row();
  		if ($itemfoto->foto != null) {
  			$target_file = 'assets/dist/img/foto-edukasafe/'.$itemfoto->foto;
  			unlink($target_file);
  		}
  		$params['foto'] = "";
  		$this->db->where('id',$id);
	  	$this->db->update('tb_edukasafe',$params);
	  	redirect('edukasafe/edit/'.$id);	  
	}

	function hapusfile(){
		//Mencegah user yang bukan haknya
		$previllage = 3;
		check_super_user($this->session->tipe_user,$previllage);

	  $id = $this->uri->segment(3);
		

		//Action		  
		$itemfile = $this->edukasafe_m->get($id)->row();
  		if ($itemfile->file != null) {
  			$target_file = 'assets/dist/img/file-edukasafe/'.$itemfile->file;
  			unlink($target_file);
  		}
  		$params['file'] = "";
  		$this->db->where('id',$id);
	  	$this->db->update('tb_edukasafe',$params);
	  	redirect('edukasafe/edit/'.$id);	  
	}

	function hapus(){
		//Mencegah user yang bukan haknya
		$previllage = 3;
		check_super_user($this->session->tipe_user,$previllage);

	  $id = $this->uri->segment(3);

		$itemfoto = $this->edukasafe_m->get($id)->row();		
		if ($itemfoto->foto != null) {
			$target_file = 'assets/dist/img/foto-edukasafe/'.$itemfoto->foto;
			unlink($target_file);
		}

		$itemedukasafe = $this->edukasafe_m->get($id)->row();		
		if ($itemedukasafe->file != null) {
			$target_file = 'assets/dist/img/file-edukasafe/'.$itemedukasafe->file;
			unlink($target_file);
		}
		
		$this->edukasafe_m->hapus($id);
		$this->session->set_flashdata('danger','Berhasil Di Hapus');
		redirect('edukasafe');
	}

		
}
