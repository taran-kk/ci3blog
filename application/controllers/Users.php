<?php
	class Users extends CI_Controller{
		// Registers users from the login page
		public function register(){
			// Defines rules required to be met by the user in order to register on the website
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required|alpha_numeric|max_length[16]|min_length[6]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			// Check if the submitted form is valid
			if($this->form_validation->run() === FALSE){
				// Reload page if form is invalid
				$this->load->view('templates/navbar');
				$this->load->view('user/register');
				$this->load->view('templates/footer');
			} else {
				// Encrypt password for improved security
				$enc_password = md5($this->input->post('password'));

				//Runs the register funciton in the user model
				$this->user_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				// Send user to the articles controller
				redirect('articles');
			}
		}


		// Check if entered username exists on DB
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'Username is taken');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Check if entered email exists on DB
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'Email is taken');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}
?>
