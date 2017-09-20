<?php include('session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Activites</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/bootstrap.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	
	<style type="text/css">


	</style>
	
</head>
<body>
	
	<br>
	<?php require 'header-activities.php'; ?>
	<?php
		$batch = $dtb->processQuery("select batch_id,batch_name,batch_time from batch where course_id in (select course_id from course where course_name='Swimming');");
		$trainer = $dtb->processQuery("select trainer_id,trainer_name,course_id from trainer where course_id in (select course_id from course where course_name='Swimming');");
		echo'<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Batch/Trainer</th>';
						while($row = $batch->fetch_assoc())
						{
							echo '<th>'.$row['batch_name'].' ( '.$row['batch_time'].' )</th>';
						}
					mysqli_data_seek($batch,0);
					echo'	</tr>
					</thead>
					<tbody>';
						while($row = $trainer->fetch_assoc())
						{
							$temp = $dtb->processQuery("select count(batch_id) from batch where course_id =".$row['course_id'].";");
							$temp1 = $dtb->processQuery("select seat_id,no_of_seat from seat where course_id =".$row['course_id']." and trainer_id= ".$row['trainer_id'].";");
							
							/*$diff = $dtb->getParam($temp,'count(seat_id)')-$dtb->getParam($temp1,'count(seat_id)');
							echo $diff;*/
						}
					echo '</tbody>
				</table>
			</div>';
	?>

	<?php $dtb->close(); include '../../footer.php'; ?>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>