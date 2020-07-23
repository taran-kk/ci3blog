<?php
	class User_model extends CI_Model{
		public function __Construct(){
			$this->load->database();
		}
		public function register($enc_password){
			// Creates an array to be used below to register user
			$data = array(
				// Saves the required data to correct keys
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
			);

			// Adds user to the DB
			return $this->db->insert('users', $data);
		}

		// Function used to log in a user
		public function login($username, $password){
			// Validates the user by looking up existing user details
			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
		}

		// Checks if etered username exists on the DB
		public function check_username_exists($username){
			$query = $this->db->get_where('users', array('username' => $username));
			if( $query->num_rows() == 0){
				 return true;
			} else {
			    return false;
			}
		}

		// Check if entered email exists on DB
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if( $query->num_rows() == 0){
				 return true;
			} else {
			    return false;
			}
		}
	}
?>
