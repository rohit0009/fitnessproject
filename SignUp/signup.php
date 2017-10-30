<?php
	require '../PHPMailer/PHPMailerAutoload.php';
	require '../DBHandler/DB.php';
	
	$flag = 0;
	$dtb = new DTB();
	$result = $dtb->processQuery("select cust_id from member where email = '".$_REQUEST['email']."';");
	//Email exists
	if($result->num_rows == 1)
		$flag = 1;
	$result = $dtb->processQuery("select cust_id from member where username = '".$_REQUEST['inputUsername']."';");
	//Username exists
	if($result->num_rows == 1)
		$flag = 2;
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
		$mail->Body = "<div style='border: 1px solid grey;font-size: 14px;line-height: 1.4285;font-weight:200;color: #c8c8c8;padding:10px;background-color: #272b30'><center><h2 style='letter-spacing: 4px;'>NRP FITNESS CLUB</h2></center><br><h3>Hello ".$_REQUEST['inputFirstName']." ".$_REQUEST['inputLastName'].",</h3><h4><p style='text-indent: 50px;'>Thanks For registration on our Website. Active your account by entering the OTP <span style='color: #3b79dd;'>".$random."</span></p></h4></div>";
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
		$result = $dtb->processQuery("INSERT INTO `member` (`f_name`, `l_name`, `gender`, `address`, `pincode`, `contact_no`, `email`, `username`, `password`, `otp`, `activate`) VALUES ('".$_REQUEST['inputFirstName']."', '".$_REQUEST['inputLastName']."', '".$_REQUEST['optionsRadios']."', '".$_REQUEST['adr']."', '".$_REQUEST['pin']."', '".$_REQUEST['phno']."', '".$_REQUEST['email']."', '".$_REQUEST['inputUsername']."', '".md5($_REQUEST['inputPassword'])."', '".$random."', '0')");
		
		$result = $dtb->processQuery("select cust_id from member where email='".$_REQUEST['email']."' order by cust_id desc limit 1;");
		setcookie("cust_id",$dtb->getParam($result,"cust_id"),time()+86400,"/");
		$dtb->close();
	}
	else if($flag == 1)
		header("Location: emailexist.php?err=m");
	else if($flag == 2)
		header("Location: emailexist.php?err=u");


	/*foreach ($_REQUEST as $key => $value) {
		# code...
		echo $key." ".$value."<br>";
	}*/

	
?>