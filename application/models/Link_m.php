<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class link_m extends CI_Model {		

	public function get($id = null) 
	{
		$this->db->from('tb_embed');
		if ($id != null) {
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query;
	}


	function update($post)
	{		  
	  $params['id'] =  $post['id'];
  	  $params['link'] =  $post['link'];

	  $this->db->where('id',$params['id']);
	  $this->db->update('tb_embed',$params);
	}



}
