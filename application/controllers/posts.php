 <?php

	class Posts extends CI_Controller { 
		public function index (){
			
			$data['title'] = 'Ostatnie posty'; 

			$data['posts'] = $this->Post_m->get_posts();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['post'] = $this->Post_m->get_posts($slug);

			if(empty($data['post'])){
				show_404();
			}
		
		$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');

		}

		public function create(){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Utwórz wpis';

			$data['categories'] = $this->Post_m->get_categories();

			$this->form_validation->set_rules('title', 'Title','required');
			$this->form_validation->set_rules('body', 'Body','required');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->Post_m->create_post();

				$this->session->set_flashdata('post_created', 'Twój post został utworzony');


				redirect('posts');
			}
		}

		public function delete ($id){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->Post_m->delete_post($id);

			$this->session->set_flashdata('post_deleted', 'Twój post został usunięty');


			redirect('posts');
		}

		public function edit ($slug) {

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['post'] = $this->Post_m->get_posts($slug); 

			if($this->session->userdata('user_id') != $this->Post_m->get_posts($slug)['user_id']){
				redirect('posts');

			}

			$data['categories'] = $this->Post_m->get_categories();

			if(empty($data['post'])){
				show_404();
			}


		$data['title'] = 'Edytuj Post';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');

		}

		public function update(){

			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->Post_m->update_post();

			$this->session->set_flashdata('post_updated', 'Twój post został zaktualizowany');


			redirect('posts');
		}

	}