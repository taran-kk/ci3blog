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
	}
?>
