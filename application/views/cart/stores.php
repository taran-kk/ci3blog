<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Stores</title>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz8-3cAf6E_3igD10vSG1ALmwkMXWzO2s&callback=initMap"
	type="text/javascript"></script>

	<script type="text/javascript">

		x = navigator.geolocation;
		x.getCurrentPosition(success, failure);

		function success(position){
			var myLat = position.coords.latitude;
			var myLong = position.coords.longitude;

			var coords = new google.maps.LatLng(myLat, myLong);

			var mapOptions = {
				zoom:9,
				center:coords,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}

			var map = new google.maps.Map(document.getElementById("map"), mapOptions);
			var marker = new google.maps.Marker({map:map, position:coords});

		}
		function failure(){

		}
	</script>
  </head>

  <body class="container">
    <h3 class="text-center">My Stores</h3><hr style="width:90%">
	<div class="text-center">
		<p class="alert alert-warning">The Maps below show your location and Locations of different Stores that sell my Custom Merch in the UK</p>
	</div>
	<div class="row container">
		<br>
		<div id="map" class="col-md-6">
		</div><br>
		<div class="col-md-6">
			<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1gKexdc4UiCal-Y_uc_NkFKVV3S9dz1BB" width="100%" height="400px"></iframe>
		</div>
	</div>


	<style>
	body{
	  margin-top: 100px !important;
	  margin-bottom: 80px !important;
	  height: 100%;
	}
	#map{
		width: 500px;
		height: 400px;
	}
	</style>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
