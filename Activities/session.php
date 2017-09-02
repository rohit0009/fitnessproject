<?php
	session_start();
	require("../DBHandler/DB.php");
	
	if(isset($_SESSION["cust_id"]))
	{
		$dtb = new DTB();
		$result = $dtb->processQuery("select cust_id from member where cust_id = ".$_SESSION['cust_id'].";");
		if($result->num_rows != 0)
		{

		}
		$dtb->close();
	}
	else
		header("Location: ..");

?>