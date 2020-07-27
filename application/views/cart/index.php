<?php
//index.php
$connect = mysqli_connect("localhost", "1712354", "taran1920", "db1712354");
?>
<!DOCTYPE html>
<html>
	 <head>
		  <title>Shop</title>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		  <style>
		  body{
			margin-top: 60px !important;
  			margin-bottom: 80px !important;
  			height: 100%;
		  }
		  .product_drag_area{
			   width:80%;
			   height:20%;
			   border:2px dashed #ccc;
			   color:#ccc;
			   line-height:200px;
			   text-align:center;
			   font-size:24px;
		  }
		  .product_drag_over{
			   color:#000;
			   border-color:#000;
		  }
		  </style>
	 </head>
	 <body class="container">
		<br>
	    <div>
		    <h3 align="center">Custom Merch Shop</h3><hr style="width:90%; margin:0;"> <br />
		    <div class="table-responsive">
			<table class="table">
			<div class="row" style="margin:1%;">
			   <?php
			   $query = "SELECT * FROM product ORDER BY id ASC";
			   $result = mysqli_query($connect, $query);
			   if(mysqli_num_rows($result) > 0)
			   {
					while($row = mysqli_fetch_array($result))
					{
			   ?>
				<div class="col-md-2" style=" background-color: white; padding:16px; cursor:move" align="center">
					 <img style="width:90%" src="https://mi-linux.wlv.ac.uk/~1712354/ci3blog//assets/images/Shop/<?php echo $row["image"]; ?>" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-price="<?php echo $row['price']; ?>" class="img-responsive product_drag" />
					 <hr style="margin:0;">
					 <small class="text-center text-small"><?php echo $row["name"]; ?></small><br>
					 <span class="text-danger align-bottom">£ <?php echo $row["price"]; ?></span>
				</div>

		   <?php
				}
		   }
		   ?>
		   		</div>
			   </table>
		   </div>
		   <div style="clear:both"></div>
		   <br />
		   <div align="center">
				<div class="product_drag_area">Drag & Drop Merch Here</div> <br>
		   </div>
		   <div id="dragable_product_order" class="container">
		   </div>
		  </div>
		  <br>
	 </body>
</html>
<script>
$(document).ready(function(data){
	 $('.product_drag_area').on('dragover', function(){
		  $(this).addClass('product_drag_over');
		  return false;
	 });
	 $('.product_drag_area').on('dragleave', function(){
		  $(this).removeClass('product_drag_over');
		  return false;
	 });
	 $('.product_drag').on('dragstart', function(e){
		  e.originalEvent.dataTransfer.setData("id", $(this).data("id"));
		  e.originalEvent.dataTransfer.setData("name", $(this).data("name"));
		  e.originalEvent.dataTransfer.setData("price", $(this).data("price"));
	 });
	 $('.product_drag_area').on('drop', function(e){
		  e.preventDefault();
		  $(this).removeClass('product_drag_over');
		  var id = e.originalEvent.dataTransfer.getData('id');
		  var name = e.originalEvent.dataTransfer.getData('name');
		  var price = e.originalEvent.dataTransfer.getData('price');
		  var action = "add";
		  $.ajax({
			   url:"https://mi-linux.wlv.ac.uk/~1712354/ci3blog/action.php",
			   method:"POST",
			   data:{id:id, name:name, price:price, action:action},
			   success:function(data){
					$('#dragable_product_order').html(data);
			   }
		  })
	 });
	 $(document).on('click', '.remove_product', function(){
		  if(confirm("Are you sure you want to remove this product?"))
		  {
			   var id = $(this).attr("id");
			   var action="delete";
			   $.ajax({
					url:"https://mi-linux.wlv.ac.uk/~1712354/ci3blog/action.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data){
						 $('#dragable_product_order').html(data);
					}
			   });
		  }
		  else
		  {
			   return false;
		  }
	 });
});
</script>
