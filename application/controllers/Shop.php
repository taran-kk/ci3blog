<?php

class Shop extends CI_Controller{

	function index(){
		$this->load->view('templates/navbar');
		$this->load->view('cart/index');
		$this->load->view('templates/footer');
	}
}



 ?>
