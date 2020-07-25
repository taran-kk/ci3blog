<?php

class Categories extends CI_Controller
{
  public function index(){
    $data['title'] = "Category";
    $data['categories'] = $this->category_model->get_categories();

    $this->load->view('templates/navbar');
    $this->load->view('categories/index' , $data);
    $this->load->view('templates/footer');
  }
  public function create(){
    // check login
    if(!$this->session->userdata('logged_in')){
      redirect('user/login');
    }

    $data['title'] = 'Create Category';

    $this->form_validation->set_rules('name','Name','required');

    if($this->form_validation->run()===FALSE){

      $this->load->view('templates/navbar');
      $this->load->view('categories/create' , $data);
      $this->load->view('templates/footer');

    } else {
       $this->category_model->create_category();
       // set Message
       $this->session->set_flashdata('category_created' ,'Your category has been created');
       redirect('categories/index');
    }

  }

  public function posts($id){
    $data['title'] = $this->category_model->get_category($id)->name;

    $data['posts'] = $this->category_model->get_posts_by_category($id);

    $this->load->view('templates/navbar');
    $this->load->view('articles/index' , $data);
    $this->load->view('templates/footer');
  }

  public function delete($id){
    // check login
    if(!$this->session->userdata('logged_in')){
      redirect('user/login');
    }

    $this->category_model->delete_category($id);
    // set Message
    $this->session->set_flashdata('category_deleted' ,'Category Deleted Successfully');
    redirect('categories/index');
  }
}
?>
