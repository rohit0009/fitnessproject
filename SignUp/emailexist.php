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
		<div class="well well-lg" style="background-color: inherit;border:1px solid #282828;color: white;font-size: 30px;line-height: 20px;height: 75px;letter-spacing: 4px;text-shadow: 2px 2px #999DAD;font-family: Luckiest Guy, cursive;">
			<a href="../index.php" style="text-decoration: none;color: white;">NRP FITNESS CLUB</a>
		</div><br><br>
		<div class="well well-lg text-center">
			<h5><?php if($_REQUEST['err'] == 'm') echo 'Email Id is already linked. Please <a href="../Login" class="btn brn-link">Log In</a>';
				else if($_REQUEST['err'] == 'u')  echo 'Username is already linked. Please <a href="../Login" class="btn brn-link">Log In</a>'; ?>
			</h5>
		</div>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br>
	<?php require("../footer.php");?>
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    

</body>
</html>