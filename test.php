<!DOCTYPE HTML>  
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	<script type="text/javascript">
		function validate()
		{
			/*alert(document.getElementById("name").value+" "+document.getElementById("email").value);*/
			if(allLetter(document.getElementById("name"),"Name"))
			{
				if(ValidateEmail(document.getElementById("email")))
					return true;	
			}

			return false
		}
		
		function allLetter(uname,id)  
		{   
			
			var letters = /^[A-Za-z]+$/;  
			if(uname.value.match(letters))  
			{  
				return true;  
			}  
			else  
			{
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> Name invalid</div>';
				$(function(){
					$("#alert").fadeIn();
				});
				uname.focus();  
				return false;  
			}  
		}
		function ValidateEmail(uemail)  
		{  
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
			if(uemail.value.match(mailformat))  
			{  
				return true;  
			}  
			else  
			{  
				document.getElementById("alert").innerHTML = '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> Mail invalid</div>';
				$(function(){
					$("#alert").fadeIn();
				});
				uemail.focus();  
				return false;  
			}  
		}
	</script>
</head>
<body>  

<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" ) 
{
	
	if($_POST['name']!="" && $_POST['email']!="")
	{
		require 'DBHandler/DB.php';
		$dtb = new DTB();
		
		$result = $dtb->processQuery("select email from member where cust_id = ".$_COOKIE['cust_id'].";");
		$email = $dtb->getParam($result,"email");
		$dtb->close();
		if($email == $_POST['email'])
		{
			echo '<script>$(function(){	alert("hi"); }); </script>';
		}
		else
		{
			
			echo '<div id="alert" class="alert alert-dismissible alert-danger"><button type="button" id="warn" class="close" data-dismiss="alert">&times;</button>Mail no Match.</div>';
			echo '<script>$(function(){ $("#warn").click(function(){ $("#alert").fadeOut(); }); });</script>';
		}
	}
	else
		echo '<script>document.getElementById("alert").innerHTML = "<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Enter all details.</div>"; $(function(){ $("#alert").fadeIn(); });</script>';
}

?>

<h2>PHP Form Validation Example</h2>
<div id="alert"></div>
<form method="POST" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" id="name" value='<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $_POST["name"];?>'>
  <br><br>
  E-mail: <input type="text" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
  
  <input type="submit" name="submit" value="Submit">  
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>