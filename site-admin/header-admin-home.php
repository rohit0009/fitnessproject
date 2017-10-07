<?php
	//session_start();
	if(isset($_SESSION['id']))
	{
		echo '<div class="container">
				<nav class="navbar navbar-default" style="">
				  <div class="container-fluid">
				    <div class="navbar-header" style="font-family: archivo black;">
				      <a class="navbar-brand" href="home.php" style="padding-left: 30px;color: #4e79bf;">NRP FITNESS CLUB <span class="label label-primary" style="font-size: 16px;text-shadow:none;color:black;font-family: archivo black;">(Admin)</span></a>

				    </div>

				    <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav">
					        <li class="active"><a href="../">Home <span class="sr-only">(current)</span></a></li>
					        
					        <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a> </li>
					      </ul>
					      
					    </div>

				  </div>
				</nav>
			</div>';
		}
?>