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
			$config['max_size'] = '20000';
			$config['max_width'] = '20000';
			$config['max_height'] = '20000';

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

	public function view($slug = NULL){
		$data['post'] = $this->post_model->get_articles($slug);
		$post_id = $data['post']['id'];
		$data['comments'] = $this->comments_model->get_comments($post_id);

		if(empty($data['post'])){
			show_404();
		}

		$data['title'] = $data['post']['title'];

		$this->load->view('templates/navbar');
		$this->load->view('articles/view', $data);
		$this->load->view('templates/footer');
	}

	public function delete($id){
		// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$this->post_model->delete_article($id);
		// set Message
		$this->session->set_flashdata('article_deleted' ,'Article Deleted Successfully!');
		redirect('articles/index/');
	}

	public function edit($slug){
  		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}

		$data['post'] = $this->post_model->get_articles($slug);
  		$user_id = $data['post']['user_id'];

		// Check user
		if( $this->session->userdata('user_id') != $user_id ){
			redirect('articles/index/');
		}

		$data['categories'] = $this->post_model->get_categories();

		if(empty($data['post'])){
			show_404();
		}

		$data['title'] = 'Edit Post';

		$this->load->view('templates/navbar');
		$this->load->view('articles/edit', $data);
		$this->load->view('templates/footer');

	}

	public function update(){
	// check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$this->post_model->update();
		// set Message
		$this->session->set_flashdata('article_updated' ,'Article Updated!');
		redirect('articles/index');
	}
}



 ?>
