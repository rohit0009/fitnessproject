<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	
	<style type="text/css">
		body{
			
		}
		footer {
		  padding: 50px 0;
		  
		}
		.carousel {
		  height: 500px;
		  margin-bottom: 60px;
		}
		/* Since positioning the image, we need to help out the caption */
		.carousel-caption {
		  z-index: 10;
		}

		/* Declare heights because of positioning of img element */
		.carousel .item {
		  height: 500px;
		  background-color: #777;
		}
		.carousel-inner > .item > img {
		  position: absolute;
		  top: 0;
		  left: 0;
		  min-width: 100%;
		  height: 500px;
		}
	</style>
	
</head>
<body>
	
	<br>
	<?php require 'header.php'; ?>
	
		<!-- Carousel
	    ================================================== -->
	    <div class="container">
	    <div id="myCarousel" class="carousel slide" data-ride="carousel">
	      <!-- Indicators -->
	      <ol class="carousel-indicators">
	        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	        <li data-target="#myCarousel" data-slide-to="1"></li>
	        <li data-target="#myCarousel" data-slide-to="2"></li>
	      </ol>
	      <div class="carousel-inner" role="listbox">
	        <div class="item active center">
	          <img class="first-slide" src="img/badminton.jpg" alt="First slide">
	          <div class="container">
	            <div class="carousel-caption">
	              
	              <?php
	              if(!isset($_SESSION["cust_id"]))
				  {
	              	echo '<p><a class="btn btn-info btn-lg" href="SignUp" role="button">Sign up today</a></p>';
	              }
	              ?>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="second-slide" src="img/fitness club.jpg" alt="Second slide">
	          <div class="container">
	            <div class="carousel-caption">
	              <?php
	              if(!isset($_SESSION["cust_id"]))
				  {
	              	echo '<p><a class="btn btn-info btn-lg" href="SignUp" role="button">Sign up today</a></p>';
	              }
	              ?>
	            </div>
	          </div>
	        </div>
	        <div class="item">
	          <img class="third-slide" src="img/fitnessclub.jpg" alt="Third slide">
	          <div class="container">
	            <div class="carousel-caption">
	              
	              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
	            </div>
	          </div>
	        </div>
	      </div>
	      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	      </a>
	      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	      </a>
	    </div><!-- /.carousel -->
	</div>

	<div class="container">
		<div class="row"> 
		
			<div class="col-lg-12">
				<div class="jumbotron">
					<p style="font-size: 18px;text-indent: 50px;">If you are wondering about the "Best fitness center near me", then look further. "NRP fitness club" is not just a fitness studio which has grown into an empire that offers a wide range of health solutions including Gym,swimming,sports,zumba and other training courses. Whether your goal is a weightloss or bodybuilding or preparing for perticular sport or marathon, our certified and experienced trainers and nutritionists will methodically help you to reach those goals. So hurry up and Register soon.. :)</p>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.php'; ?>
	
	
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

