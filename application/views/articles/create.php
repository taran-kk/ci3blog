<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Create Article</title>
  </head>
  <body class="container">
    <h1 class="text-center">Create Article</h1>
	
	<div class="col-md-6 offset-md-3">
		<?php echo form_open_multipart('articles/create'); ?>
		  <div class="form-group">
		    <label>Title</label>
		    <input type="text" class="form-control" name="title" placeholder="Add Title">
			<?php echo form_error("title","<div class='alert alert-danger'>","</div>"); ?>
		  </div>
		  <div class="form-group">
		    <label>Body</label>
		    <textarea id="editor1" style="width:100%; height:150px !important;" class="form-control" name="body" placeholder="Add Body"></textarea>
			<?php echo form_error("body","<div class='alert alert-danger'>","</div>"); ?>
		  </div>
		  <div class="form-group">
			  <label>Category</label>
			  <select name="category_id" class="form-control">
				  <?php foreach($categories as $category): ?>
				  	<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
				  <?php endforeach; ?>
			  </select>
		  </div>
		  <div class="form-group">
			  <label>Upload Image</label>
			  <input type="file" name="userfile" size="20">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	<style media="screen">
		body{
			margin-top: 100px !important;
			margin-bottom: 80px !important;
			height: 100%;
		}
	</style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
