<?php
	require '../DBHandler/DB.php';
	$a = $_REQUEST['a'];$b = $_REQUEST['b'];$c = $_REQUEST['c'];$d = $_REQUEST['d'];$e = $_REQUEST['e'];$f = $_REQUEST['f'];
	
	$dtb = new DTB();
	if(isset($_COOKIE["cust_id"]))
	{
		$result = $dtb->processQuery("select otp from member where cust_id=".$_COOKIE["cust_id"]);
		$otp = $dtb->getParam($result,"otp");
		if($otp == $a.$b.$c.$d.$e.$f)
		{
			$result = $dtb->processQuery("UPDATE `member` SET `activate` = '1' WHERE `member`.`cust_id` = ".$_COOKIE["cust_id"].";");
			setcookie("cust_id","",time()-999999, "/");
			echo "1";
		}
		else
			echo "0";
	}
	else
		header("Location: ../Login");

	$dtb->close();
?>