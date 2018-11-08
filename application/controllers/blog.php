<?php

class Blog extends CI_Controller 
{
public function index()
	{
		$this->load->model('blog_m');
		$data['info'] = $this->blog_m->info();
		$data['zmienna'] = $this->blog_m->zmienna();
		$this->load->view('blog', $data); 
	}
}