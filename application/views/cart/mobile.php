<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Shop</title>
  </head>
  <body class="container">
	<div>
		<h3 align="center">Custom Merch Shop</h3><hr style="width:90%; margin:0;"> <br>
		<div class="text-center bg-warning">
			<br>
			<h5>You are using a Mobile Device!</h5>
			<h5>To access the shop, Please use a Desktop Browser!</h5><br>
		</div>
	</div>
	<div>
		<br>
		<h5 class="text-center">Your Details</h5><hr>

	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-striped">
		 <tr>
		  <td><b>IP Address</b></td>
		  <td><?php echo $ip_address; ?></td>
		 </tr>
		 <tr>
		  <td><b>Operating System</b></td>
		  <td><?php echo $os; ?></td>
		 </tr>
		 <tr>
		  <td><b>Browser Details</b></td>
		  <td><?php echo $browser . ' - ' . $browser_version; ?></td>
		 </tr>
		</table>
	</div>

	<div>
		<br>
		<h5 class="text-center">Recommended</h5><hr>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-striped">
		 <tr>
		  <td><b>Operating System</b></td>
		  <td>Windows, Linux or Mac</td>
		 </tr>
		 <tr>
		  <td><b>Browser</b></td>
		  <td>Safari, Chrome, Microsoft Edge, Firefox or Internet Explorer</td>
		 </tr>
		</table>
	</div>

	<style>
		body{
		  margin-top: 80px !important;
		  margin-bottom: 80px !important;
		  height: 100%;
		}
	</style>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
