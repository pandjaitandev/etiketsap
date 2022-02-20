<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class edukasafe_m extends CI_Model {
		
	public function get($id = null) 
	{
		$this->db->from('tb_edukasafe');
		if ($id != null) {
			$this->db->where('id',$id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function get_edukasafe($limit, $start) 
	{		
		$this->db->order_by('created','DESC');
		$query = $this->db->get('tb_edukasafe',$limit, $start);
		return $query;
	}

	public function get_edukasafe_kategori($kategori,$limit, $start) 
	{		
		$this->db->order_by('created','DESC');
		$this->db->where("kategori",$kategori);
		$query = $this->db->get('tb_edukasafe',$limit, $start);
		return $query;
	}	

	function simpan($post)
	{
		if ($post['judul'] == "") {
			$pesan = $this->upload->display_errors();
			$this->session->set_flashdata('error','Ojo Main refresh ae bat...');
			redirect('edukasafe/tambah');
		}

	  $params['id'] =  "";
	  $params['judul'] =  ucwords($post['judul']);
	  $params['deskripsi'] =  $post['deskripsi'];
	  $params['file'] =  $post['file'];
	  $params['foto'] =  $post['foto'];
	  $params['kategori'] =  $post['kategori'];
	  $params['user_id'] =  $this->session->id;
	  $params['created'] =  $post['created'];

	  $this->db->insert('tb_edukasafe',$params);	  	 		  	 		   			
	}

	function update($post)
	{

	  $params['id'] =  $post['id'];
	  $params['judul'] =  ucwords($post['judul']);
	  $params['deskripsi'] =  $post['deskripsi'];
	  $params['file'] =  $post['file'];
	  $params['user_id'] =  $this->session->id;
	  $params['created'] =  $post['created'];
	  
	  if ($post['foto'] != null) {
  	  	$params['foto'] =  $post['foto'];
  	}

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_edukasafe',$params);	  	 		  	 		   			
	}

	function hapus($id){

	  $this->db->where('id', $id);
	  $this->db->delete('tb_edukasafe');

	}



}
