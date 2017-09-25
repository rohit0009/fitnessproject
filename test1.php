<?php
	date_default_timezone_set("Asia/Kolkata");
	$effectiveDate = date('Y-m-d H:i:s');
	echo $effectiveDate;
	$effectiveDate = date('Y-m-d 00:00:00', strtotime("+3 months", strtotime($effectiveDate)));
	echo "<br>";
	echo $effectiveDate;
?>