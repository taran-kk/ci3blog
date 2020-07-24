<?php

class Articles extends CI_controller {
	public function index($offset = 0){
    // pagination config
    $config['base_url'] = base_url().'articles/index';
    $config['total_rows'] = $this->db->count_all('posts');
    $config['per_page'] = 4;
    $config['uri_segment'] = 3;
    $config['attributes'] = array('class' => 'pagination-link');

  // init pagination
   $this->pagination->initialize($config);

    $data['posts'] = $this->post_model->get_articles(FALSE , $config['per_page'] ,$offset );

    $this->load->view('templates/navbar');
    $this->load->view('articles/index' , $data);
    $this->load->view('templates/footer');
  }

	public function create(){
		// Validates whether the user is loggen in or not
		// If the user trying to access the url is not logged in they are redirected to the login page
		if(!$this->session->userdata('logged_in')){
		redirect('users/login');
		}


		$data['title'] = "Create Post";
		// Loads pre-stored categories from the DB
		$data['categories'] = $this->post_model->get_categories();

		// Sets the Validation rules for the article creation form
		$this->form_validation->set_rules('title' ,'Title' , 'required');
		$this->form_validation->set_rules('body' ,'Body' , 'required');

		// Checks if form is submitted correctly
		// If an invalid form is submitted the same page is loaded agian
		if($this->form_validation->run()===FALSE){
			$this->load->view('templates/navbar');
			$this->load->view('articles/create', $data);
			$this->load->view('templates/footer');
		} else {
			// Sets the image upload requirements/rules
			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			// Uploads the image or displays any errors.
			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				// Assigns the noimage file from the images folder
				$post_image = 'no-image.png';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$post_image = $_FILES['userfile']['name'];
			}

			$this->post_model->create_article($post_image);

			// Sets the flash message to display when an article has been created
			$this->session->set_flashdata('article_created', 'Your Article has been Successfully Created!');

			redirect('articles/index');
		}

	}
}



 ?>
