<?php
	require '../PHPMailer/PHPMailerAutoload.php';
	require '../DBHandler/DB.php';
	
	$flag = 0;
	$dtb = new DTB();
	$result = $dtb->processQuery("select cust_id from member where email = '".$_REQUEST['email']."';");
	if(mysqli_num_rows($result) == 1)
		$flag = 1;
	$dtb->close();

	if($flag == 0)
	{
		$mail = new PHPMailer;

		//Enable SMTP debugging. 
		$mail->SMTPDebug = 0;                               
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();       
		//Set SMTP host name                          
		$mail->Host = "smtp.gmail.com";
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;                          
		//Provide username and password     
		$mail->Username = "nrp.fitnessclub@gmail.com";                 
		$mail->Password = "fitnessclub";                           
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";                           
		//Set TCP port to connect to 
		$mail->Port = 587;                                   

		$mail->From = "nrp.fitnessclub@gmail.com";
		$mail->FromName = "NRP Fitness Club";

		$mail->addAddress($_REQUEST['email'], $_REQUEST['inputFirstName']." ".$_REQUEST['inputLastName']);

		$mail->isHTML(true);

		$random = rand(100000,999999);

		$mail->Subject = "OTP Details";
		$mail->Body = "<div style='border: 1px solid grey;background-color: #060606;color: #888888;padding:10px;'><center><h2>NRP Fitness Club</h2></center><br><h3>Hello ".$_REQUEST['inputFirstName']." ".$_REQUEST['inputLastName'].",</h3><h4><p style='text-indent: 50px;'>Thanks For registration on our Website. Active your account by entering the OTP <span style='color: #3b79dd;'>".$random."</span></p></h4></div>";
		$mail->AltBody = "This is the plain text version of the email content";

		if(!$mail->send()) 
		{
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} 
		else 
		{
		    header("Location: verify_activate.php");
		}



		$dtb = new DTB();
		$result = $dtb->processQuery("INSERT INTO `member` (`f_name`, `l_name`, `gender`, `address`, `pincode`, `contact_no`, `email`, `username`, `password`, `otp`, `activate`) VALUES ('".$_REQUEST['inputFirstName']."', '".$_REQUEST['inputLastName']."', '".$_REQUEST['optionsRadios']."', '".$_REQUEST['adr']."', '".$_REQUEST['pin']."', '".$_REQUEST['phno']."', '".$_REQUEST['email']."', '".$_REQUEST['inputUsername']."', '".$_REQUEST['inputPassword']."', '".$random."', '0')");
		
		$result = $dtb->processQuery("select cust_id from member where email='".$_REQUEST['email']."' order by cust_id desc limit 1;");
		setcookie("cust_id",$dtb->getParam($result,"cust_id"),time()+86400,"/");
		$dtb->close();
	}
	else
		header("Location: emailexist.php");


	/*foreach ($_REQUEST as $key => $value) {
		# code...
		echo $key." ".$value."<br>";
	}*/

	
?>