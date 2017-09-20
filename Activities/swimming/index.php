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
		$result = $dtb->processQuery("select course_id from course where course_name ='Swimming'");
		$course_id = $dtb->getParam($result,'course_id');
		$batch = $dtb->processQuery("select batch_id,batch_name,batch_time from batch where course_id = ".$course_id.";");
		
		echo'<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
						<div class="panel panel-info">
							<div class="panel-heading">
								Batch-Trainer Details
							</div>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Batch</th>
										<th>Trainer</th>
										<th>Seats</th>
									</tr>
									</thead>
									<tbody>';
										
										while($batchrow = $batch->fetch_assoc())
										{
											echo '<tr>';
											echo '<td>'.$batchrow['batch_name'].' &nbsp&nbsp(&nbsp'.$batchrow['batch_time'].'&nbsp)</td>';

											$trainer = $dtb->processQuery("select trainer.trainer_id,trainer_name,no_of_seats from trainer,seat where seat.course_id = ".$course_id." and seat.course_id = trainer.course_id and trainer.trainer_id = seat.trainer_id and seat.batch_id = ".$batchrow['batch_id'].";");

											$trainerrow = $trainer->fetch_assoc();
											
											echo '<td>'.$trainerrow['trainer_name'].'</td>';
											echo '<td>'.$trainerrow['no_of_seats'].'</td>';	
											
											echo '</tr>';
										}
									echo '</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>';
	?>

	<?php $dtb->close(); include '../../footer.php'; ?>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>