<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Article</title>
  </head>
  <body>

  	<div class="container">
		<div class="text-center">
  			<h2><?php echo $post['title']; ?></h2><hr style="width:90%;">
		</div>
  		<small style="width: inherit;" class="article-date"><strong>Posted on: </strong><?php echo $post['created_at']; ?></small><br>
		<div class="container">
			<img class="container" style="padding:0;" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
		</div>
  		<div class="article-body">
			<br>
  		  <?php echo $post['body']; ?>
  		</div>

  		<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
  			<hr>
			<div class="row container">
				<a class="btn btn-primary pull-left" style="margin:10px;" href="<?php echo base_url(); ?>articles/edit/<?php echo $post['slug']; ?>">Edit</a><br>
	  			<?php echo form_open('/articles/delete/'.$post['id']); ?>
					<input style="margin:10px;" type="submit" value="Delete" class="btn btn-danger">
	  			</form>
			</div>
  		<?php endif; ?>
  		<hr>
  		<h3>Comments</h3>
  		<?php if($comments) : ?>
  			<?php foreach($comments as $comment) : ?>
  				<div class="well">
  					<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
  				</div>
  			<?php endforeach; ?>
  		<?php else : ?>
  			<p>Article currently has No Comments!</p>
  		<?php endif; ?>
  		<hr>
		<div class="text-center">
			<h3>Add Comment</h3>
		</div>
  		<?php echo validation_errors(); ?>
  		<?php echo form_open('comments/create/'.$post['id']); ?>
			<div class="col-md-6 offset-md-3">
	  			<div class="form-group">
	  				<label>Name</label>
	  				<input type="text" name="name" class="form-control">
	  			</div>
	  			<div class="form-group">
	  				<label>Email</label>
	  				<input type="text" name="email" class="form-control">
	  			</div>
	  			<div class="form-group">
	  				<label>Comment:</label>
	  				<textarea name="body" class="form-control"></textarea>
	  			</div>
	  			<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
	  			<button class="btn btn-primary" type="submit">Submit</button>
			</div>
  		</form>

  	</div>

	<style media="screen">
		body{
			margin-top: 100px !important;
			margin-bottom: 80px !important;
			height: 100%;
		}

		.article-date{
			background-color: rgba(100, 149, 237, 0.15);
			padding:0.5%;
			display:block;
		}

		.article-body{
			text-align: justify;
		}
	</style>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
