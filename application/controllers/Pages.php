<?php
class Pages extends CI_Controller {

  public function view($page = 'home'){
	  		// Checks if files exists
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			// Loads the navbar, page and footer
			$this->load->view('templates/navbar');
			$this->load->view('pages/'.$page);
			$this->load->view('templates/footer');
  }
}
?>
