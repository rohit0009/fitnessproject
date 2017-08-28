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
		<?php require 'header-login.php'; ?>


		<br>
		<div class="jumbotron" style="margin-left: 50px;margin-right: 50px;">
		<?php

			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				if($_POST['inputEmail']!="" && $_POST['inputPassword']!="")
				{
					require '../DBHandler/DB.php';
					$dtb = new DTB();
					
					$result = $dtb->processQuery("select cust_id from member where username = '".$_POST['inputEmail']."';");
					if(mysqli_num_rows($result) != 0)
					{
						$cust_id = $dtb->getParam($result,"cust_id");
						
						$result = $dtb->processQuery("select password from member where cust_id = ".$cust_id.";");
						//mysqli_data_seek($result,0);
						$flag = 0;

						if( $dtb->getParam($result,"password") == $_POST['inputPassword'] )
							$flag = 1;

						if($flag == 1)
						{
							echo "string";
							$result = $dtb->processQuery("select activate from member where cust_id =".$cust_id);
							$activate = $dtb->getParam($result,"activate");
							if($activate == 0)
								$flag = 2;
						}
						if($flag == 1)
						{
							session_start();
							$_SESSION["cust_id"] = $cust_id;
							header("Location: ../");
						}
						else if($flag == 0)
						{
							echo '<div id="alert" class="alert alert-dismissible alert-danger"><button type="button" id="warn" class="close" data-dismiss="alert">&times;</button>Invalid Password.</div>';
							echo '<script>$(function(){ $("#warn").click(function(){ $("#alert").fadeOut(); }); });</script>';
						}
						if($flag == 2)
						{
							setcookie("cust_id",$cust_id,time() + 86400,"/");
							header("Location: ../SignUp/verify_activate.php");
						}

					}
					else
					{
						echo '<div id="alert" class="alert alert-dismissible alert-danger"><button type="button" id="warn" class="close" data-dismiss="alert">&times;</button>Username not found.</div>';
						echo '<script>$(function(){ $("#warn").click(function(){ $("#alert").fadeOut(); }); });</script>';
					}

					$dtb->close();
				}
			}
		?>
		<div id="alert"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-3 col-md-6">
					<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate()" method='POST'>
					  <fieldset>
					  <legend>LOGIN</legend>
					    <div class="form-group">
					      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
					      <div class="col-lg-10">
					        <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Username">
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
					      <div class="col-lg-10">
					        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
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

		<div class="well well-lg text-center" style="margin-left: 50px;margin-right: 50px;">
			Don't have an Account?  
			<a href="../SignUp" style="text-decoration: none;color: white;"><button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click If you are a New User">Sign Up</button></a>
		</div>
	</div>

	<?php require '../footer.php'?>

	
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    

</body>
</html>
