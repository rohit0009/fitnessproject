<!DOCTYPE html>
<html>
<head>
	<title>Activites</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	
	<style type="text/css">
		body{
			
		}
		footer {
		  padding: 50px 0;

		  
		}
		.content-section-a {
		  padding: 50px 0;
		  margin: auto;
		  background-color: inherit;
		}
		.content-section-b {
		  padding: 50px 0;
		  margin: auto;
		  background-color: inherit;
		}
		hr
		{
			border: 1px solid #e7e7e7;
		}
	@media(max-width: 767px){
		.row{
			display: flex;
			flex-direction: column;
		}
		.row{
			display: flex;
		}
	}

	@media(min-width: 1200px){
		.row{
			display: flex;
		}
		div.order-lg-1
		{
			order:1;
		}
		div.order-lg-2
		{
			order:2;
		}
	}

	.lead{
		
	}

	</style>
	
</head>
<body>
	
	<br>
	<?php require 'header-activities.php'; ?>
	<br>
	
	<marquee class="lead text-info" style="letter-spacing: 2px;">**Special Discount offer!!! Get your membership and avail 10% off on quarterly, 15% off on 6 monthly and 20% off on yearly membership.</marquee>
	<section class="content-section-a" id="Swimming">
		<div class="container">
			<div class="row"> 
		      <div class="col-lg-5 ml-auto order-lg-1">
		        <hr style="width: 200px;float: left;">
		        <div class="clearfix"></div>
		        <h2 class="text-success">Swimming</h2>
		        <p class="lead">This facility has been added to NRP FitnessClub list about 5 years back. 

The facility is an ultra modern one where in a half Olympic size swimming pool is located on top of the house, a sheer luxury for our esteemed members. 
 
		   </p>
		        <?php
		        	if(isset($_SESSION['cust_id']))
		        	{
		        		$result = $dtb->processQuery("select * from membership where course_id = 3001 and cust_id = ".$_SESSION['cust_id']);
		        		if($result->num_rows > 0)
		        		{
		        			echo '<p class="lead"><span class="label label-success">Enrolled</span></p>';
		        		}
		        		else
		        			echo '<p class="lead">For Enrollment click <a href="./swimming" class="btn btn-link">here</a></p>';
		        	}
		        ?>
		      </div>
		      <div class="col-lg-7 mr-auto order-lg-2">
		        <img class="img-thumbnail" src="../img/download.jpg" alt="">
		      </div>
			</div>
		</div>
	</section>

	<section class="content-section-b" id="Table Tennis">
		<div class="container">
			<div class="row">
		      <div class="col-lg-6 mr-auto order-lg-2">
	            <hr style="width: 200px;float: left;">
	            <div class="clearfix"></div>
	            
	            <h2 class="text-success">Table Tennis</h2>
	            <p class="lead">The NRP Table Tennis Club is open to both competitive and recreational players of all skill levels.
				We are part of the National Table Tennis Association, and we compete in their tournaments. We also periodically hold tournaments open to the general public. Additionally some of our members compete in other local tournaments. </p>
	              <?php
		        	if(isset($_SESSION['cust_id']))
		        	{
		        		$result = $dtb->processQuery("select * from membership where course_id = 3002 and cust_id = ".$_SESSION['cust_id']);
		        		if($result->num_rows > 0)
		        		{
		        			echo '<p class="lead"><span class="label label-success">Enrolled</span></p>';
		        		}
		        		else
		        			echo '<p class="lead">For Enrollment click <a href="./tabletennis" class="btn btn-link">here</a></p>';
		        	}
		        ?>
	          </div>
	          <div class="col-lg-6 order-lg-1">
	            <img class="img-thumbnail" src="../img/tab_etennis.jpg" alt="">
	          </div>
	          
			</div>
		</div>
	</section>

	<section class="content-section-a" id="Squash">
		<div class="container">
			<div class="row"> 
		      <div class="col-lg-5 ml-auto order-lg-1">
		        <hr style="width: 200px;float: left;">
		        <div class="clearfix"></div>
		        <h2 class="text-success">Squash</h2>
		        
		        <p class="lead">NRP Squash Club was created as a place where members can meet to play squash in the comfort of one of the finest squash facilities in Pune, boasting a beautiful three-wall-glass exhibition court as well as six additional international standard courts with glass back walls.

Members of the club will also have access to professional coaching, and a squash program that will provide instruction  with varying group sizes and functionality.
 
		        	</p>
		       	<?php
		        	if(isset($_SESSION['cust_id']))
		        	{
		        		$result = $dtb->processQuery("select * from membership where course_id = 3003 and cust_id = ".$_SESSION['cust_id']);
		        		if($result->num_rows > 0)
		        		{
		        			echo '<p class="lead"><span class="label label-success">Enrolled</span></p>';
		        		}
		        		else
		        			echo '<p class="lead">For Enrollment click <a href="./squash" class="btn btn-link">here</a></p>';
		        	}
		        ?>
		      </div>
		      <div class="col-lg-7 mr-auto order-lg-2">
		        <img class="img-thumbnail" src="../img/squash.jpg" alt="">
		      </div>
			</div>
		</div>
	</section>

	<section class="content-section-b" id="Zumba">
		<div class="container">
			<div class="row">
		      <div class="col-lg-6 mr-auto order-lg-2">
	            <hr style="width: 200px;float: left;">
	            <div class="clearfix"></div>
	            <h2 class="text-success">Zumba</h2>
	            <p class="lead">We take the "work" out of workout, by mixing low-intensity and high-intensity moves for an interval-style, calorie-burning dance fitness party.A total workout, combining all elements of fitness – cardio, muscle conditioning, balance and flexibility, boosted energy and a serious dose of awesome each time you leave class.</p>
	             <?php
		        	if(isset($_SESSION['cust_id']))
		        	{
		        		$result = $dtb->processQuery("select * from membership where course_id = 3004 and cust_id = ".$_SESSION['cust_id']);
		        		if($result->num_rows > 0)
		        		{
		        			echo '<p class="lead"><span class="label label-success">Enrolled</span></p>';
		        		}
		        		else
		        			echo '<p class="lead">For Enrollment click <a href="./zumba" class="btn btn-link">here</a></p>';
		        	}
		        ?>
	          </div>
	          <div class="col-lg-6 order-lg-1">
	            <img class="img-thumbnail" src="../img/zumba.jpg" alt="">
	          </div>
	          
			</div>
		</div>
	</section>

	<section class="content-section-a" id="Gym">
		<div class="container">
			<div class="row">
		      <div class="col-lg-6 mr-auto order-lg-1">
	            <hr style="width: 200px;float: left;">
	            <div class="clearfix"></div>
	            <h2 class="text-success">Gym</h2>
	            <p class="lead">We take the "work" out of workout, by mixing low-intensity and high-intensity moves for an interval-style, calorie-burning dance fitness party.A total workout, combining all elements of fitness – cardio, muscle conditioning, balance and flexibility, boosted energy and a serious dose of awesome each time you leave class.</p>
	             <?php
		        	if(isset($_SESSION['cust_id']))
		        	{
		        		$result = $dtb->processQuery("select * from membership where course_id = 3005 and cust_id = ".$_SESSION['cust_id']);
		        		if($result->num_rows > 0)
		        		{
		        			echo '<p class="lead"><span class="label label-success">Enrolled</span></p>';
		        		}
		        		else
		        			echo '<p class="lead">For Enrollment click <a href="./gym" class="btn btn-link">here</a></p>';
		        	}
		        ?>
	          </div>
	          <div class="col-lg-6 order-lg-2">
	            <img class="img-thumbnail" src="../img/Gym_wiki.jpg" alt="">
	          </div>
			</div><br>
			<div class="row">
	          	<blockquote class="blockquote-reverse">
					<p>Bodybuilding is much like any other sport. To be successful, you must dedicate yourself 100% to your training, diet and mental approach.</p>
					<small><cite title="Source Title">Arnold Schwarzenegger</cite></small>
				</blockquote>
	          </div>
		</div>
	</section>

	<?php include '../footer.php'; ?>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

