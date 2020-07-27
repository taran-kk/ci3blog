<?php

class Shop extends CI_Controller{

	function index(){
		// Gets User Details
		$data['browser'] = $this->agent->browser();
		$data['browser_version'] = $this->agent->version();
		$data['os'] = $this->agent->platform();
		$data['ip_address'] = $this->input->ip_address();


		$this->load->view('templates/navbar');
		if ($this->agent->is_mobile()){
			$this->load->view('cart/mobile', $data);
		}
		else {
		    $this->load->view('cart/index');
		}

		$this->load->view('templates/footer');
	}

	function stores(){
		$this->load->view('templates/navbar');
		$this->load->view('cart/stores');
		$this->load->view('templates/footer');

	}
}



 ?>
