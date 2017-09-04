<?php
	session_start();
	if(!isset($_SESSION["cust_id"]))
	{
		echo '<div class="container">
				<nav class="navbar navbar-default" style="">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href=".." style="padding-left: 30px;">NRP FITNESS CLUB<br></a>
				    </div>

				    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="..">About Us <span class="sr-only">(current)</span></a></li>
				        <li class="active"><a href="#">Activities</a></li>

				        <li><a href="../login/index.php">Login</a> </li>
				      </ul>
				      
				    </div>
				  </div>
				</nav>
			</div>';
	}
	else
	{
		require("../DBHandler/DB.php");
		$dtb = new DTB();
		$result = $dtb->processQuery("select f_name,l_name from member where cust_id = ".$_SESSION["cust_id"].";");
		$fname = $dtb->getParam($result,"f_name");
		mysqli_data_seek($result,0);
		$lname = $dtb->getParam($result,"l_name");
		echo '<div class="container">
				<nav class="navbar navbar-default" style="">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href=".." style="padding-left: 30px;">NRP FITNESS CLUB<br></a>
				    </div>

				    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li><a href="..">About Us <span class="sr-only">(current)</span></a></li>
				        <li class="active"><a href="Activities">Activities</a></li>
				        <li><a href="#">'.$fname.' '.$lname.' Profile</a> </li>
				        <li><a href="../logout.php">Logout  <span class="glyphicon glyphicon-log-out"></span></a></li>
				      </ul>
				      
				    </div>
				  </div>
				</nav>
			</div>';
		$dtb->close();	
	}
?>