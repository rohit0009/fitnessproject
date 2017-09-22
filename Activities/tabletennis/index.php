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
	<script>
		$(document).ready(function(){
			$("#enroll").addClass('disabled');
			$("#select").on("change",function(){
				if($(this).find(":selected").val() == "")
				{
					$("#enroll").addClass('disabled');
					$("#trainer_name").attr({value: ''});
					$("#no_of_seats").attr({value: ''});
				}
				else
				{
					$("#enroll").removeClass('disabled');
					var data = $(this).find(":selected").val().split('^&^');
					$("#trainer_name").attr({value: data[1]});
					$("#no_of_seats").attr({value: data[2]});
					$("#fetch_batch_id").attr({value: data[0]});
					$("#fetch_course_id").attr({value: data[3]});
				}
			});
		});
		</script>
		<style type="text/css">


		</style>
</head>
<body>
	
	<br>
	<?php require 'header-activities.php'; ?>
	<?php
		$result = $dtb->processQuery("select course_id from course where course_name ='Table Tennis'");
		$course_id = $dtb->getParam($result,'course_id');
		$batch = $dtb->processQuery("select batch_id,batch_name,batch_time from batch where course_id = ".$course_id.";");
		
		echo'<div class="container">
				<div class="row">
					<div class="col-lg-3 page-header" style="border-bottom: 1px grey solid;">
						<div><h4>Table Tennis Enrollment</h4></div>
					</div>
					<div class="col-lg-5 col-lg-offset-3 mr-auto">
				       <img class="img-thumbnail" src="../../img/tab_etennis.jpg" alt="">
				    </div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row"></br></br>
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-lg-8">
								<div class="panel panel-primary">
								<div class="panel-heading text-center"><h4>Enrolment Form</h4></div>';
									if($_SERVER['REQUEST_METHOD'] == 'POST') 
									{
										if(isset($_POST['enroll']))
										{

										}
										else if(isset($_POST['cancel']))
										{
											header("Location: ../");
										}
									}
									echo '<div class="panel-body">
											<form class="form-horizontal" method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
												<br>
												<fieldset>
													<div class="form-group">
														<label for="select" class="col-lg-2 control-label">Select Batch</label>
						      							<div class="col-lg-4">
						      								<select class="form-control" id="select">';
						      									$result = $dtb->processQuery("select batch.batch_id,batch_name,batch_time,no_of_seats,course.course_id,trainer.trainer_id,trainer_name from batch,seat,trainer,course where batch.batch_id = seat.batch_id and trainer.trainer_id = seat.trainer_id and course.course_id = seat.course_id and course_name = 'Table Tennis' ORDER BY batch_name asc");
						      									echo "<option class='disabled' value=''></option>";
						      									while ($row = $result->fetch_assoc())
																{
																	echo '<option value="'.$row['batch_id'].'^&^'.$row['trainer_name'].'^&^'.$row['no_of_seats'].'^&^'.$row['course_id'].'">'.$row['batch_name'].' (&nbsp'.$row['batch_time'].'&nbsp)'.'</option>';
																}
						      								echo '</select>
						      							</div>
						      							<label class="col-lg-2 control-label">Trainer Name</label>
						      								<div class="col-lg-4">
						      									<input type="text" disabled id="trainer_name" class="form-control">
						      								</div>
													</div>
													<div class="form-group">
														<label class="col-lg-2 control-label text-left">Number of Seats</label>
														<div class="col-lg-2">
															<input type="text" disabled id="no_of_seats" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="col-lg-2 control-label text-left">Select Duration</label>
														<div class="col-lg-4">
															<input type="text" disabled id="duration" class="form-control">
														</div>
													</div>
													<br>
													<fieldset>
													<legend style="border-bottom:1px solid grey;">Fee</legend>
														<div class="form-group">	
															<label class="col-lg-2 control-label text-left">Base Fee</label>
															<div class="col-lg-4">
																<div class="btn">12</div>
															</div>
														</div>
														<div class="form-group">	
															<label class="col-lg-2 control-label text-left">Discount</label>
															<div class="col-lg-4">
																<div class="btn">12</div>
															</div>
														</div>
														<div class="form-group">	
															<label class="col-lg-2 control-label text-left">Total Fee</label>
															<div class="col-lg-4">
																<div class="btn">12</div>
															</div>
														</div>
													</fieldset>
													<div class="form-group">
															<div class="col-lg-2 col-lg-offset-1 col-md-2 col-sm-2 col-xs-3">
																<button type="submit" name="enroll" id="enroll" class="form-control btn btn-success"><span class="glyphicon glyphicon-ok"></span> </button>
															</div>
															<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
																<button type="submit" class="form-control btn btn-danger" name="cancel"><span class="glyphicon glyphicon-remove"></span> </button>
															</div>
													</div>
												</fieldset>
												<input type="text" id="fetch_batch_id" name="fetch_batch_id" hidden>
												<input type="text" id="fetch_course_id" name="fetch_course_id" hidden>
											</form>
										</div>

									';
								echo '</div>
							</div>
							<div class="col-lg-4 col-md-10 ">
								<div class="panel panel-primary">
									<table class="table table-striped">
										<caption class="text-center">Seat Details for Swimming</caption>
										<thead>
											<tr>
												<th class="text-center">Batch</th>
												<th class="text-center">Trainer</th>
												<th class="text-center">Seats Available</th>
											</tr>
											</thead>
											<tbody>';
												
												while($batchrow = $batch->fetch_assoc())
												{
													$trainer = $dtb->processQuery("select trainer.trainer_id,trainer_name,no_of_seats from trainer,seat where seat.course_id = ".$course_id." and seat.course_id = trainer.course_id and trainer.trainer_id = seat.trainer_id and seat.batch_id = ".$batchrow['batch_id'].";");

													$trainerrow = $trainer->fetch_assoc();
													if($trainerrow['trainer_name']!='' && $trainerrow['no_of_seats']!="")
													{
														echo '<tr>';
														echo '<td class="text-center">'.$batchrow['batch_name'].' &nbsp&nbsp(&nbsp'.$batchrow['batch_time'].'&nbsp)</td>';
														echo '<td class="text-center">'.$trainerrow['trainer_name'].'</td>';
														if($trainerrow['no_of_seats'] == 0)
															echo '<td class="text-center">Batch Full</td>';
														else
															echo '<td class="text-center">'.$trainerrow['no_of_seats'].'</td>';	
														echo '</tr>';
													}
												}
											echo '</tbody>
									</table>
								</div>
							</div>
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