<?php
	$conn = mysqli_connect('localhost','root','','fic');
	if($conn == TRUE)
		echo "success";
	else echo "failed";


?>