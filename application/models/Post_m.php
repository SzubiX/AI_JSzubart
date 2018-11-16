<?php
	class Post_m extends CI_Model {
		public function __construct(){
			$this->load->database();
		}

		public function get_posts($slug = FALSE){
			if($slug === FALSE){
				$query = $this->db->get('post');
				return $query->result_array(); 
			}

			$query = $this->db->get_where('post',array('slug' => $slug));
			return $query->row_array();
		}
	}