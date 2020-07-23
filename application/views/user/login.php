<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body class="d-flex flex-column">
	  <div class="container">
		  <?php echo form_open('users/login'); ?>
	  		<div class="row">
	  			<div class="col-md-6 offset-md-3">
	  				<h1 class="text-center">Login</h1>
	  				<div class="form-group">
	  					<input type="text" name="username" class="form-control" placeholder="Enter Username" required>
	  				</div>
	  				<div class="form-group">
	  					<input type="password" name="password" class="form-control" placeholder="Enter Password" required>
	  				</div>
	  				<button type="submit" class="btn btn-primary btn-block">Login</button>
	  			</div>
	  		</div>
	  	  <?php echo form_close(); ?>

	  </div>

	  <style media="screen">
		  body{
			  margin-top: 100px !important;
			  margin-bottom: 60px !important;
			  height: 100%;
		  }
	  </style>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
