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
		  background-color: #111;
		}
		.content-section-b {
		  padding: 50px 0;
		  margin: auto;
		  background-color: #222;
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

	

	</style>
	
</head>
<body>
	
	<br>
	<?php require 'header-activities.php'; ?>
	<br>

	<section class="content-section-a">
		<div class="container">
			<div class="row"> 
		      <div class="col-lg-5 ml-auto order-lg-1">
		        <hr style="width: 200px;float: left;">
		        <div class="clearfix"></div>
		        <h2>Swimming</h2>
		        <p class="lead">A special thanks to
		          <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a>
		          for providing the photographs that you see in this template. Visit their website to become a member.</p>
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
		        <img class="img-thumbnail" src="../img/swimming.jpg" alt="">
		      </div>
			</div>
		</div>
	</section>

	<section class="content-section-b">
		<div class="container">
			<div class="row">
		      <div class="col-lg-6 mr-auto order-lg-2">
	            <hr style="width: 200px;float: left;">
	            <div class="clearfix"></div>
	            
	            <h2>Table Tennis</h2>
	            <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by
	              <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>
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

	<section class="content-section-a">
		<div class="container">
			<div class="row"> 
		      <div class="col-lg-5 ml-auto order-lg-1">
		        <hr style="width: 200px;float: left;">
		        <div class="clearfix"></div>
		        <h2>Squash
		        
		        <p class="lead">A special thanks to
		          	<a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a>
		          	for providing the photographs that you see in this template. Visit their website to become a member.
		        	</p>
		       	<?php
		        	if(isset($_SESSION['cust_id']))
		        		echo '<p class="lead">For Enrollment click <a href="./squash" class="btn btn-link">here</a></p>';
		        ?>
		      </div>
		      <div class="col-lg-7 mr-auto order-lg-2">
		        <img class="img-thumbnail" src="../img/squash.jpg" alt="">
		      </div>
			</div>
		</div>
	</section>

	<section class="content-section-b">
		<div class="container">
			<div class="row">
		      <div class="col-lg-6 mr-auto order-lg-2">
	            <hr style="width: 200px;float: left;">
	            <div class="clearfix"></div>
	            <h2>Zumba</h2>
	            <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by
	              <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>
	              <?php
		        	if(isset($_SESSION['cust_id']))
		        		echo '<p class="lead">For Enrollment click <a href="./zumba" class="btn btn-link">here</a></p>';
		        ?>
	          </div>
	          <div class="col-lg-6 order-lg-1">
	            <img class="img-thumbnail" src="../img/zumba.jpg" alt="">
	          </div>
	          
			</div>
		</div>
	</section>

	<?php include '../footer.php'; ?>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

