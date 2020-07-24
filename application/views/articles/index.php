<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Articles</title>
  </head>
  <body class="container">
    <h1 class="text-center">Latest Articles</h1><hr style="width:90%;">
	<div class="container">
		<?php foreach($posts as $post) : ?>
			<h3><?php echo $post['title']; ?></h3>
			<div class="row">
				<div class="col-md-3">
					<img class="article-thumb" src="<?php echo base_url(); ?>/assets/images/posts/<?php echo $post['post_image']; ?>" style="width:100%; height:auto;">
				</div>
				<div class="col-md-9">
					<small class="article-date"><i><strong>Posted On:</strong></i> <?php echo $post['created_at']; ?></small>
				 <p class="article-body"> <?php echo word_limiter($post['body'], 60); ?> </p>
				<p><a class="btn bg-info text-white" href="<?php echo site_url('/articles/'.$post['slug']); ?>">Read More</a></p>
				</div>
				<div class="col-md-12">
					<hr style="width:80%;">
				</div>
			</div>
		<?php endforeach; ?>
		<div class="pagination-links">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
	<style media="screen">
		body{
			margin-top: 100px !important;
			margin-bottom: 80px !important;
			height: 100%;
		}
		.pagination-links{
			margin:2%;
		}

		.pagination-links strong{
			padding: 1% 2%;
			margin: 1%;
			background: whitesmoke;
			border:2px black solid;
			color: black;
		}

		a.pagination-link{
			padding: 1% 2%;
			margin: 1%;
			background: whitesmoke;
			border: 1px blue solid;
			color: blue;
		}

		.article-date{
			background-color: rgba(100, 149, 237, 0.15);
			padding:1%;
			margin:0.5% 0;
			display:block;
		}

		.article-thumb{
			width:100%;
			height: auto;
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
