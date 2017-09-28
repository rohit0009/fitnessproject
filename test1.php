<?php
	date_default_timezone_set("Asia/Kolkata");
	$effectiveDate = date('Y-m-d');
	echo $effectiveDate;
	$effectiveDate = date('Y-m-d', strtotime("+1 days", strtotime($effectiveDate)));
	echo "<br>";
	echo $effectiveDate;
?>