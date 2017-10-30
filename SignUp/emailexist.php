<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">

	<script type="text/javascript" src="validations.js"></script>

	<style type="text/css">
		body{
			
		}
		footer {
		  padding: 50px 0;
		}
	</style>
	
</head>
<body>
	<br>
	<div class="container">
		<nav class="navbar navbar-default" style="">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href=".." style="padding-left: 30px;">NRP FITNESS CLUB<br></a>
		    </div>
		</nav>
		<div class="well well-lg text-center">
			<h5><?php if($_REQUEST['err'] == 'm') echo 'Email Id is already linked. Please <a href="../Login" class="btn brn-link">Log In</a>';
				else if($_REQUEST['err'] == 'u')  echo 'Username is already linked. Please <a href="../Login" class="btn brn-link">Log In</a>'; ?>
			</h5>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<?php require("../footer.php");?>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    

</body>
</html>