<?php
	
	require("../DBHandler/DB.php");
	
	if(isset($_SESSION["id"]))
	{
		$dtb = new DTB();
		$result = $dtb->processQuery("select id from admin where id = ".$_SESSION['id'].";");
		if($result->num_rows == 0)
		{
			$dtb->close();
			header("Location: ../site-admin");
		}
		$dtb->close();
	}
	else
		header("Location: ../site-admin");

?>