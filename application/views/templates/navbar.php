<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  </head>
  <body>
    <header>
		<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ci-navbar">

		  <a class="navbar-brand" href="<?php echo base_url();?>">
			  <img src="<?php echo base_url();?>assets/images/logo2.png" alt="">
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo base_url();?>articles/index/">Articles</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Categories
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="<?php echo base_url(); ?>categories/posts/9">Blogging</a>
		          <a class="dropdown-item" href="<?php echo base_url(); ?>categories/posts/7">Programming</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="<?php echo base_url(); ?>categories/index">View All</a>
		        </div>
		      </li>
			  <?php if($this->session->userdata('logged_in')) { ?>
				  <li class="nav-item">
			        <a class="nav-link" href="<?php echo base_url();?>shop/index/">Shop</a>
			      </li>
			  <?php } ?>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo base_url();?>shop/stores/">Stores</a>
			  </li>
		    </ul>

			<ul class="nav navbar-nav navbar-right">
			  <?php if(!$this->session->userdata('logged_in'))
			  { ?>
				<li class="nav-item">
					<a style="margin: 0 8px;" class="boot-buttons nav-link btn btn-primary text-white" href="<?php echo base_url(); ?>users/login">Login</a>
				</li>
				<li class="nav-item">
					<a style="margin: 0 8px;" class="boot-buttons nav-link btn btn-outline-secondary bg-light text-info" href="<?php echo base_url(); ?>users/register">Register</a>
				</li>
			  <?php
			  } ?>

			  <?php if($this->session->userdata('logged_in'))
			  { ?>
				<li class="nav-item"><a class="boot-buttons nav-link btn btn-primary text-white" href="<?php echo base_url(); ?>articles/create">Create Article</a></li>
				<li class="nav-item"><a class="boot-buttons nav-link btn btn-primary text-white" href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
				<li class="nav-item"><a class="boot-buttons nav-link btn btn-danger text-white" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
			  <?php
			  } ?>
			</ul>
		    <!-- <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form> -->
		  </div>
		</nav>
    </header>

	<!-- Flash messages generated below the navbar to maintain structure and to ensure website remains aesthetically pleasing -->
	<div class="container">
		<!--- Check for flash messages generated by the controllerd during validation-->
		<?php if($this->session->flashdata('user_added')){
			echo "<p class='alert alert-success'>".$this->session->flashdata('user_added')."</p>";
		} ?>

		<?php if($this->session->flashdata('login_unsuccessful')){
			echo "<p class='alert alert-danger'>".$this->session->flashdata('login_unsuccessful')."</p>";
		} ?>

		<?php if($this->session->flashdata('user_login_successful')){
			echo "<p class='alert alert-success'>".$this->session->flashdata('user_login_successful')."</p>";
		} ?>

		<?php if($this->session->flashdata('logout_successful')){
			echo "<p class='alert alert-success'>".$this->session->flashdata('logout_successful')."</p>";
		} ?>

		<?php if($this->session->flashdata('article_created')){
			echo "<p class='alert alert-success'>".$this->session->flashdata('article_created')."</p>";
		} ?>

		<?php if($this->session->flashdata('post_updated')){
		  	echo "<p class='alert alert-success'>".$this->session->flashdata('article_updated')."</p>";
		} ?>

		<?php if($this->session->flashdata('post_deleted')){
		  	echo "<p class='alert alert-success'>".$this->session->flashdata('article_deleted')."</p>";
		} ?>

		<?php if($this->session->flashdata('category_created')){
		  	echo "<p class='alert alert-success'>".$this->session->flashdata('category_created')."</p>";
		} ?>

		<?php if($this->session->flashdata('user_mobile')){
		  	echo "<p class='alert alert-warning'>".$this->session->flashdata('user_mobile')."</p>";
		} ?>

		<?php if($this->session->flashdata('user_desk')){
		  	echo "<p class='alert alert-success'>".$this->session->flashdata('user_desk')."</p>";
		} ?>
 	</div>
	<style media="screen">
		.boot-buttons{
			margin-bottom: 2% !important;
			margin-right: 2%;
		}
	</style>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
