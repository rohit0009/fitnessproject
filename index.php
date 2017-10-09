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

		@media(max-width: 1400px)
		{
			.carousel {
			  height: 550px;
			  margin-bottom: 60px;
			}
			/* Since positioning the image, we need to help out the caption */
			.carousel-caption {
			  z-index: 10;
			}

			/* Declare heights because of positioning of img element */
			.carousel .item {
			  height: 550px;
			  background-color: #777;
			}
			.carousel-inner > .item > img {
			  position: absolute;
			  top: 0;
			  left: 0;
			  min-width: 100%;
			  height: 550px;
			}
		}
		@media(max-width: 1200px)
		{
			.carousel {
			  height: 450px;
			  margin-bottom: 60px;
			}
			/* Since positioning the image, we need to help out the caption */
			.carousel-caption {
			  z-index: 10;
			}

			/* Declare heights because of positioning of img element */
			.carousel .item {
			  height: 450px;
			  background-color: #777;
			}
			.carousel-inner > .item > img {
			  position: absolute;
			  top: 0;
			  left: 0;
			  min-width: 100%;
			  height: 450px;
			}
		}
		@media(max-width: 767px)
		{
			.carousel {
			  height: 400px;
			  margin-bottom: 60px;
			}
			/* Since positioning the image, we need to help out the caption */
			.carousel-caption {
			  z-index: 10;
			}

			/* Declare heights because of positioning of img element */
			.carousel .item {
			  height: 400px;
			  background-color: #777;
			}
			.carousel-inner > .item > img {
			  position: absolute;
			  top: 0;
			  left: 0;
			  min-width: 100%;
			  height: 400px;
			}
		}
		@media(max-width: 500px)
		{
			.carousel {
			  height: 200px;
			  margin-bottom: 60px;
			}
			/* Since positioning the image, we need to help out the caption */
			.carousel-caption {
			  z-index: 10;
			}

			/* Declare heights because of positioning of img element */
			.carousel .item {
			  height: 200px;
			  background-color: #777;
			}
			.carousel-inner > .item > img {
			  position: absolute;
			  top: 0;
			  left: 0;
			  min-width: 100%;
			  height: 200px;
			}
		}
		@media(min-width: 1200px)
		{
			.container{
				width: 1200px;
			}
		}
		@media(max-width: 767px)
		{
			.sidebar{
				display: none;
			}
		}
	</style>
	
</head>
<body>
	
	<br>
	<?php require 'header.php'; ?>
	
		<!-- Carousel
	    ================================================== -->
    <div class="container">
    	<div class="row"> 
    		<div class="col-sm-9 col-md-9">
			    <div id="myCarousel" class="carousel slide" data-ride="carousel">
			      <!-- Indicators -->
			      <ol class="carousel-indicators">
			        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			        <li data-target="#myCarousel" data-slide-to="1"></li>
			        <li data-target="#myCarousel" data-slide-to="2"></li>
			      </ol>
			      <div class="carousel-inner" role="listbox">
			        <div class="item active center">
			          <img class="first-slide" src="img/WHP-Table-tennis.jpg" alt="First slide">
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
			          <img class="second-slide" src="img/swimming.jpg" alt="Second slide">
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
			          <img class="third-slide" src="img/zumba_fitness.jpg" alt="Third slide">
			          <div class="container">
			            <div class="carousel-caption">
			              
			              
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

			<div class="col-sm-3 col-md-3 sidebar">
				<div class="well well-sm">
					<ul style="list-style-type: none;-webkit-padding-start: 5px;">
						<h4>Featured Links</h4><br>
						<h5>Activitiy Enrollment</h5>
						<?php
							$result = $dtb->processQuery("select course_name from course where course_name not in ('Gym');");
							while ($row = $result->fetch_assoc()) {
								echo "<li><a href='Activities#".$row['course_name']."' class='text-success'>".$row['course_name']."</a></li>";
							}
						?>
						<br>
						<h5>Gym Enrollment</h5>
						<li><a href='Activities#Gym' class='text-success'>Gym</a></li> 
					</ul>
				</div>
			</div>
			<?php
			if(!isset($_SESSION['cust_id']))
			{
				echo '<div class="col-sm-3 col-md-3 sidebar">
					<div class="well well-sm">
						<h4>Site Administration</h4>
						<ul style="list-style-type: none;-webkit-padding-start: 5px;">
							<li><a href="site-admin"  class="text-success">Admin Login</a></li>
						</ul>
					</div>
				</div>';
			}
			?>
		</div>
		<div class="row">
			<div class="col-sm-9 col-md-9">
				<div class="jumbotron">
					<p style="font-size: 18px;text-indent: 50px;">If you are wondering about the "Best fitness center near me", then look further. "NRP fitness club" is not just a fitness studio which has grown into an empire that offers a wide range of health solutions including Gym, swimming,sports,zumba and other training courses. Whether your goal is a weightloss or bodybuilding or preparing for perticular sport or marathon, our certified and experienced trainers and nutritionists will methodically help you to reach those goals. So hurry up and <span class="text-success">Register soon..</span> :)</p>
				</div>
			</div>
		</div>
		<div class="row">
			<blockquote>
				<p>Physical fitness is not only one of the most important keys to a healthy body, it is the basis of dynamic and creative intellectual activity.</p>
				<small><cite title="Source Title">John F. Kennedy</cite></small>
			</blockquote>

		</div>

	</div>

	<?php include 'footer.php'; ?>
	
	
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

