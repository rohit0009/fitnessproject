<!DOCTYPE html>
<html>
<head>
	<title>Verify OTP</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" type="text/css" href="..\bootstrap\bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<style type="text/css">
		body{
			
		}
		footer {
		  padding: 50px 0;
		}
		.bold
		{
			font-weight: bold;
			font-size: 23px;
		}
		.form-control
		{
			display: inline;
			width: 10%;
		}
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		    /* display: none; <- Crashes Chrome on hover */
		    -webkit-appearance: none;
		    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
		    padding: 0;
		}
	</style>
	<script>
		function verify_activate()
		{
			var a = document.getElementById('a');
			var b = document.getElementById('b');
			var c = document.getElementById('c');
			var d = document.getElementById('d');
			var e = document.getElementById('e');
			var f = document.getElementById('f');
			
	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	            	var response = this.responseText;
	            	if(response == 0)
	            	{
	            		$(function(){
	            			$("#alert").fadeIn(500);
	            		});
	            		a.value = "";b.value = "";c.value = "";d.value = "";e.value = "";f.value = "";
	            		a.focus();
	                }
	                else
	                {
	                	document.F1.method="POST";
	                	document.F1.action = "../Login";
	                	document.F1.submit();
	                }
	            }
	        };
	        xmlhttp.open("POST", "verify.php?a="+a.value+"&b="+b.value+"&c="+c.value+"&d="+d.value+"&e="+e.value+"&f="+f.value, false);
	        xmlhttp.send();
		    
		}

		$(document).ready(function(){
			document.getElementById('a').focus();
			$("#a").keypress(function(){
				document.getElementById('b').focus();
			});
			$("#b").keypress(function(){
				document.getElementById('c').focus();
			});
			$("#c").keypress(function(){
				document.getElementById('d').focus();
			});
			$("#d").keypress(function(){
				document.getElementById('e').focus();
			});
			$("#e").keypress(function(){
				document.getElementById('f').focus();
			});

			$("#times").click(function(){
				$("#warn").fadeOut(500);
			});
		});
	</script>
</head>
<body>
	<br>
	<div class="container">
		<div class="well well-lg" style="background-color: inherit;border:1px solid #282828;color: white;font-size: 30px;line-height: 20px;height: 75px;letter-spacing: 4px;text-shadow: 2px 2px #999DAD;font-family: Luckiest Guy, cursive;">
			<a href="../" style="text-decoration: none;color: white;">NRP FITNESS CLUB</a>
		</div>
	</div>
	<br><br>
	<div class="container-fluid" style="margin-left: 30px;margin-right: 30px;">
		<div class="well well-lg">
			<div class="container">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-7">
						<h4>Account Activation & Email Verification</h4>
					</div>
				</div>
				<div id="alert" style="display: none;"><div class="alert alert-dismissible alert-danger" id="warn"><button type="button" id="times" class="close" >&times;</button>Invalid OTP. Please try again.</div></div>
				<br>
				<form class="form-horizontal"  name="F1" method="POST">
					<div class="form-group">
						<div class="col-lg-4 col-md-4 col-sm-12">
							<h6 class="text-primary" style="text-indent: 10px;">Email Id</h6>	
						</div>
						<div class="col-lg-5 col-md-6 col-sm-12">
							<input type="text" disabled value="<?php require '../DBHandler/DB.php'; $cookie_name = "cust_id"; $dtb = new DTB(); if(isset($_COOKIE[$cookie_name])){$result = $dtb->processQuery('select email from member where cust_id='.$_COOKIE[$cookie_name].';');echo $dtb->getParam($result,"email"); } else{ header("Location: ../Login");} $dtb->close();?>" class="form-control" style="display: block;width: 100%;">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-4 col-md-4 col-sm-12">
							<h6 class="text-primary" style="text-indent: 10px;">Please Check your mail and enter OTP.</h6>	
						</div>
						<div class="col-lg-7 col-md-6 col-sm-12">
							<input type="number" min="0" max="9" class="form-control" id="a"> <span class="bold">-</span>
							<input type="number" min="0" max="9" class="form-control" id="b"> <span class="bold">-</span>
							<input type="number" min="0" max="9" class="form-control" id="c"> <span class="bold">-</span>
							<input type="number" min="0" max="9" class="form-control" id="d"> <span class="bold">-</span>
							<input type="number" min="0" max="9" class="form-control" id="e"> <span class="bold">-</span>
							<input type="number" min="0" max="9" class="form-control" id="f">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-4"></div>
						<div class="col-lg-7">
							<button type="button" class="btn btn-success" onclick="verify_activate()">Submit</button> 
						</div>	
					</div>
				</form>
			</div>
		</div>
	</div><br><br><br>
	<?php require('../footer.php');?>


	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>
