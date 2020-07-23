<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Register</title>
  </head>
  <body>
	  <div class="container">
		  <?php echo form_open('users/register'); ?>
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<h1 class="text-center">Register</h1>
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" value="<?php echo set_value('name') ?>" name="name" placeholder="Name">
						<?php echo form_error("name","<div class='alert alert-danger'>","</div>"); ?>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" value="<?php echo set_value('email') ?>" name="email" placeholder="Email">
						<?php echo form_error("email","<div class='alert alert-danger'>","</div>"); ?>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" value="<?php echo set_value('username') ?>" name="username" placeholder="Username">
						<?php echo form_error("username","<div class='alert alert-danger'>","</div>"); ?>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password">
						<?php echo form_error("password","<div class='alert alert-danger'>","</div>"); ?>
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
						<?php echo form_error("password2","<div class='alert alert-danger'>","</div>"); ?>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Submit</button> <br> <br>
				</div>
			</div>
		  <?php echo form_close(); ?>

	  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
