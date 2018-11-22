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

		function check_username_exists($username){

			$this->form_validation->set_message('check_username_exists', 'Ten login jest już zajęty, wybierz inny');
			if($this->User_m->check_username_exists($username)){
				return true;
			} else {
				return false;
			}

		}
		function check_email_exists($email){

			$this->form_validation->set_message('check_email_exists', 'Ten email jest już zajęty, wybierz inny');
			if($this->User_m->check_email_exists($email)){
				return true;
			} else {
				return false;
			}

		}
	}