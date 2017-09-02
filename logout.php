<?php
	session_start();
	if(isset($_SESSION["cust_id"]))
	{
		session_unset();
		session_destroy();
		header("Location: .");
	}
	else
		header("Location: .");
?>