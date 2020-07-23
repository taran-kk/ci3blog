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
				$this->session->set_flashdata('user_added', 'Registration Successful!');

				// Send user to the articles controller
				redirect('articles');
			}
		}

		// Log in user
		public function login(){
			// Sets the validation rules for the login form
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				// If the entered form is invalid the login page is redisplayed
				$this->load->view('templates/navbar');
				$this->load->view('user/login');
				$this->load->view('templates/footer');
			} else {
				// Loads the username and password from the form
					$username = $this->input->post('username');
					$password = md5($this->input->post('password'));

				// Login user
				$user_id = $this->user_model->login($username, $password);

				// Conditional statement utilised to decide whether to create a session or not
				// Also utilised to decide which flashdata will be displayed to hte user
				if($user_id){
					 // Creates a session for the logged in user
					 $user_data = array(
						 'user_id' => $user_id ,
						 'username' => $username ,
						 'logged_in' => true
					 );

						$this->session->set_userdata($user_data);

						$this->session->set_flashdata('user_login_successful', 'Login Successful');
						redirect('posts');
				} else {
						$this->session->set_flashdata('login_unsuccessful', 'Login Failed! Try Again');
						redirect('users/login');
				}
			}
		}

		// Function utilised to logout a user
		public function logout(){
			// Unsets user data as no longer required after a user decides to logout
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Sets the flash message used to indicate a Successful logout process to the user
			$this->session->set_flashdata('logout_successful', 'Log out Successful!');

			redirect('users/login');
		}

		// Checks if the entered username already exists on DB
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'Username is taken');
			// Conditional statement used to set the function value accordingly
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Checks if the entered email already exists on DB
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'Email is taken');
			// Conditional statement used to set the function value accordingly
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}
?>
