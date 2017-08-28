<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">


	<style type="text/css">
		body{
			
		}
		footer {
		  padding: 50px 0;
		}
	</style>
	<script type="text/javascript">
		function validate()
		{
			var inputEmail = document.getElementById("inputEmail");
			var inputPassword = document.getElementById("inputPassword");

			if(inputEmail.value == '' || inputPassword.value == ''){
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Please enter Username and Password and try logging in again.</div>';
				return false;
			}

			if(userid_validation(inputEmail,5,12))  
			{  
				if(passid_validation(inputPassword,8,12))  
				{
					return true;
				}
			}
			return false;
		}
		function userid_validation(uid,mx,my)  
		{  
			var uid_len = uid.value.length;  
			if (uid_len == 0 || uid_len >= my || uid_len < mx)  
			{  
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>User Id should not be empty / length be between '+mx+' to '+my+'</div>';
				uid.focus();  
				return false;  
			}  
			return true;  
		}
		function passid_validation(passid,mx,my)  
		{  
			var passid_len = passid.value.length;  
			if (passid_len == 0 ||passid_len >= my || passid_len < mx)  
			{  
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Password should not be empty / length be between '+mx+' to '+my+'</div>';
				passid.focus();  
				return false;  
			}  
			return true;  
		}
	</script>
</head>
<body>
	<br>
	<div class="container">
		<?php require('header-admin.php'); ?>


		<br>
		<div class="jumbotron" style="margin-left: 50px;margin-right: 50px;">
		<div id="alert"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-3 col-md-6">
					<form class="form-horizontal" action="home.php" onsubmit="return validate()" method='POST'>
					  <fieldset>
					  <legend>ADMIN LOGIN</legend>
					    <div class="form-group">
					      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
					      <div class="col-lg-10">
					        <input type="text" class="form-control" id="inputEmail" placeholder="Username">
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
					      <div class="col-lg-10">
					        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
					      </div>
					    </div>
						    
					    
					    <div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button type="submit" class="btn btn-success" >Login</button>
					        <button type="reset" class="btn btn-default">Reset</button>
					      </div>
					    </div>
					  </fieldset>
					</form>
				</div>
			</div>
		</div>
		</div>

	</div><br><br>

	<?php require '../footer.php'?>

	
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
    

</body>
</html>
