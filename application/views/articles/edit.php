<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body class="container">
	  <div class="text-center">
	  	<h2>Edit Article</h2><hr style="width:90%;">
	  </div>

	  <div class="container">
		<?php echo validation_errors(); ?>
  	  	<?php echo form_open('articles/update'); ?>
  	  	<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  	  	  <div class="form-group">
  	  	    <label>Title</label>
  	  	    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title']; ?>">
  	  	  </div>
  	  	  <div class="form-group">
  	  	    <label>Body</label>
  	  	    <textarea id="editor1" class="form-control" style="width:100%; height:250px !important;" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
  	  	  </div>
  	  	  <div class="form-group">
  	  	  <label>Category</label>
  	  	  <select name="category_id" class="form-control">
  	  	    <?php foreach($categories as $category): ?>
  	  	      <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
  	  	    <?php endforeach; ?>
  	  	  </select>
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
