<?php

	class Users extends CI_Controller{
		public function register(){
			$data['title'] = 'Zarejestruj się';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'required', 'matches[password]');

			if($this->form_validation->run() === FALSE){ 

					$this->load->view('templates/header');
					$this->load->view('users/register', $data);
					$this->load->view('templates/footer');

			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->User_m->register($enc_password);

				// Set messager

				$this->session->set_flashdata('user_registered', 'Jesteś teraz zarejestrowany i możesz sie zalogować!');

				redirect('posts');

			}
		}

		public function login(){
			$data['title'] = 'Zaloguj się';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				
				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));
				// Login user
				$user_id = $this->User_m->login($username, $password);
				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);
					// Set message
					$this->session->set_flashdata('user_loggedin', 'Zalogowałeś się!');
					redirect('posts');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Podałeś zły login lub hasło!');
					redirect('users/login');
				}		
			}
		}

		public function logout(){

			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			$this->session->set_flashdata('user_loggedout', 'Wylogowałeś się!');

			redirect('users/login');

		}

		public function check_username_exists($username){

			$this->form_validation->set_message('check_username_exists', 'Ten login jest już zajęty, wybierz inny');
			if($this->User_m->check_username_exists($username)){
				return true;
			} else {
				return false;
			}

		}
		public function check_email_exists($email){

			$this->form_validation->set_message('check_email_exists', 'Ten email jest już zajęty, wybierz inny');
			if($this->User_m->check_email_exists($email)){
				return true;
			} else {
				return false;
			}

		}
	}