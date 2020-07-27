<?php

class Post_model extends CI_Model
{
  // Contsructor funciton used to load DB
  public function __construct(){
    $this->load->database();
  }

  // Gets posts from the DB
  public function get_articles($slug = FALSE , $limit = FALSE , $offset = FALSE){
   if($limit){
      $this->db->limit($limit , $offset);
   }
    if($slug === FALSE){
       $this->db->order_by('posts.id' , 'DESC');
       $this->db->join('categories' , 'categories.id = posts.category_id');
       $query = $this->db->get('posts');
       return $query->result_array();
    }

    $query = $this->db->get_where('posts' , array('slug' => $slug ));
    return $query->row_array();

  }

  // Creates post and takes in an img parameter
  public function create_article($post_image){

	// Sets the Title for the post which will be displayed as the url when viewing the post
    $slug = url_title($this->input->post('title'));

	// Assigns data to corresponding fields in the DB
    $data = array(
      'title' => $this->input->post('title') ,
      'slug' => $slug ,
      'body' => $this->input->post('body'),
      'category_id' => $this->input->post('category_id') ,
      'user_id' => $this->session->userdata('user_id') ,
      'post_image' => $post_image
    );

	// Stores the post on DB
    return $this->db->insert('posts' , $data);
  }

  public function get_categories(){
    $this->db->order_by('name');
    $query = $this->db->get('categories');
    return $query->result_array();
  }

	public function delete_article($id){
		$image_file_name = $this->db->select('post_image')->get_where('posts', array('id' => $id))->row()->post_image;
		$cwd = getcwd(); // save the current working directory
		$image_file_path = $cwd."\\assets\\images\\posts\\";
		chdir($image_file_path);
		unlink($image_file_name);
		chdir($cwd); // Restore the previous working directory
		$this->db->where('id', $id);
		$this->db->delete('posts');
		return true;
	}

	 public function update(){
	   $slug = url_title($this->input->post('title'));

	   $data = array(
		 'title' => $this->input->post('title') ,
		 'slug' => $slug ,
		 'body' => $this->input->post('body') ,
		 'category_id' => $this->input->post('category_id')
	   );

	   $this->db->where('id' , $this->input->post('id'));
	   $this->db->update('posts' , $data);
	   return true;
	 }

}
?>
