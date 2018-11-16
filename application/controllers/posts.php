 <?php

	class Posts extends CI_Controller { 
		public function index (){
			
			$data['title'] = 'Ostatnie posty'; 

			$data['post'] = $this->Post_m->get_posts();
			

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['postt'] = $this->Post_m->get_posts($slug);

			if(empty($data['postt'])){
				show_404();
			}
		

		$data['title'] = $data['postt']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');

		}

	}