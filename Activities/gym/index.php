<?php include('session.php'); ob_start();?>
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
			$("#date").attr({value: '<?php date_default_timezone_set("Asia/Kolkata"); echo date('Y-m-d');?>'});
			$("#hiddendate").attr({value: '<?php date_default_timezone_set("Asia/Kolkata"); echo date('Y-m-d');?>'});
			$("#duration").on("change",function(){
				if($(this).find(":selected").val() == "")
				{
					$("#subt").attr({value: ''});
					$("#hiddensubt").attr({value: ''});
					$("#discount").attr({value: ''});
					$("#hiddendiscount").attr({value: ''});
					$("#totalfee").attr({value: ''});
					$("#hiddentotalfee").attr({value: ''});
				}
				else
				{
					//alert($(this).find(":selected").val());
					var data = $(this).find(":selected").val().split('^&^');
					var duration = data[0];
					var discountPerc = data[1];
					var monthly = data[2];

					var discount = ((monthly*duration)*discountPerc);
					var totalfee = monthly*duration;
					$("#subt").attr({value: totalfee+"/-"});
					$("#hiddensubt").attr({value: totalfee+"/-"});

					$("#discount").attr({value: discount+"/-"});
					$("#hiddendiscount").attr({value: discount+"/-"});

					totalfee = totalfee - discount;
					var tax = 0.12 * totalfee;
					totalfee = totalfee + tax;

					$("#totalfee").attr({value: totalfee+"/-"});
					$("#hiddentotalfee").attr({value: totalfee+"/-"});
				}
			});
			$("#select").on("change",function(){
				if($(this).find(":selected").val() == "")
				{
					$("#trainer_name").attr({value: ''});
					$("#no_of_seats").attr({value: ''});
					$("#fetch_batch_id").attr({value: ''});
					$("#fetch_course_id").attr({value: ''});
					$("#fetch_trainer_id").attr({value: ''});
				}
				else
				{
					var data = $(this).find(":selected").val().split('^&^');
					$("#trainer_name").attr({value: data[1]});
					$("#no_of_seats").attr({value: data[2]});
					$("#fetch_batch_id").attr({value: data[0]});
					$("#fetch_course_id").attr({value: data[3]});
					$("#fetch_trainer_id").attr({value: data[4]});
				}
			});
		});
		</script>
		<style>
			@media(min-width: 1200px)
			{
				.container{
					width: 1200px;
				}
			}
		</style>
	
</head>
<body>
	
	<br>
	<?php require 'header-activities.php'; ?>
	<?php
		$result = $dtb->processQuery("select course_id from course where course_name ='Gym'");
		$course_id = $dtb->getParam($result,'course_id');
		$batch = $dtb->processQuery("select batch_id,batch_name,batch_time from batch where course_id = ".$course_id.";");
		
		echo'<div class="container">
				<div class="row">
					<div class="col-lg-3 page-header" style="border-bottom: 1px grey solid;">
						<div><h4>Gym Enrollment</h4></div>
					</div>
					<div class="col-lg-6 col-lg-offset-3 mr-auto">
				       <img class="img-thumbnail" src="../../img/zumba.jpg" alt="">
				    </div>
				</div>
			</div>
			<div class="container">
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
											//$subtotal = $_POST['hiddentotalfee'];
											$discount = $_POST['hiddendiscount'];
											$duration = $_POST['duration'];
											$date = $_POST['hiddendate'];
											//echo $discount." ".$duration." ".$_POST['hiddendate'];
											$data = explode("^&^", $duration);
											$duration = $data[0];
											$expDate = date('Y-m-d', strtotime("+".$duration." months", strtotime($date)));
											$fetch_course_id = $_POST['fetch_course_id'];

											if($fetch_course_id != '' && $_POST['hiddentotalfee'] != '')
											{
												$result = $dtb->processQuery("select no_of_seats from seat where batch_id = '".$_POST['fetch_batch_id']."' and course_id ='".$fetch_course_id."';");
												$no_of_seats = $dtb->getParam($result,"no_of_seats");
												if($no_of_seats == 0)
												{
													echo '<br><div class="alert alert-dismissible alert-warning" style="width: 95%;margin-left: 10px;">
										 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
										 	  	<strong>Batch Full.</strong></div>';
												}
												else
												{
													$result = $dtb->processQuery("INSERT INTO `membership` (`course_id`, `cust_id`, `batch_id`, `enrollment_date`, `discount`, `expiry_date`, `duration`) VALUES ('".$fetch_course_id."', '".$_SESSION['cust_id']."', '".$_POST['fetch_batch_id']."', '".$date."', '".$discount."', '".$expDate."', '".($duration*30)."')");
													if($result === TRUE)
													{
														$no_of_seats = $no_of_seats - 1;
														$dtb->processQuery("UPDATE `seat` SET `no_of_seats` = '".$no_of_seats."' WHERE batch_id = '".$_POST['fetch_batch_id']."' and course_id ='".$fetch_course_id."';");
														header("Location: ../");
													}
													else
													{
														echo "Failed Query";
													}
												}
											}
											else
											{
												echo '<br><div class="alert alert-dismissible alert-danger" style="width: 95%;margin-left: 10px;">
										 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
										 	  	<strong>Enter all Details.</strong></div>';
											}
										}
										
										if(isset($_POST['cancel']))
										{
											header("Location: ../");
										}
									}
									echo '<div class="panel-body">
									<form class="form-horizontal" method="POST" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'">
									<br>
									  <fieldset>
									    <legend></legend>
									    <div class="form-group">
									      <label for="select" class="col-lg-2 control-label">Select Batch</label>
						      				<div class="col-lg-4">
						      					<select class="form-control" id="select">';
									          
												$result1 = $dtb->processQuery("select batch.batch_id,batch_name,batch_time,no_of_seats,course.course_id,trainer.trainer_id,trainer_name from batch,seat,trainer,course where batch.batch_id = seat.batch_id and trainer.trainer_id = seat.trainer_id and course.course_id = seat.course_id and course_name = 'Gym' ORDER BY batch_name asc");
													echo "<option class='disabled'></option>";	
													while ($row = $result1->fetch_assoc())
													{
														echo '<option value="'.$row['batch_id'].'^&^'.$row['trainer_name'].'^&^'.$row['no_of_seats'].'^&^'.$row['course_id'].'^&^'.$row['trainer_id'].'">'.$row['batch_name'].' (&nbsp'.$row['batch_time'].'&nbsp)'.'</option>';
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
														<label class="col-lg-offset-1 col-lg-3 control-label text-left">Personal Trainer ?</label>
														<div class="col-lg-2">
															<div class="checkbox">
															  <label>
																<input type="checkbox">
															  </label>
															</div>
														</div>
													</div>';
													$course = $dtb->processQuery("select * from course where course_name = 'Gym'");
													$row = $course->fetch_assoc();
													echo '<div class="form-group">
														<label class="col-lg-2 control-label text-left">Select Duration</label>
														<div class="col-lg-4">
															<select class="form-control" id="duration" name="duration">
																<option value=""></option>
																<option value="1^&^'.$row['monthly_d'].'^&^'.$row['monthly'].'">1 Month</option>
																<option value="3^&^'.$row['quarterly_d'].'^&^'.$row['monthly'].'">3 Months</option>
																<option value="6^&^'.$row['sixmonth_d'].'^&^'.$row['monthly'].'">6 Months</option>
																<option value="12^&^'.$row['yearly_d'].'^&^'.$row['monthly'].'">1 Year</option>
															</select>
														</div>
													</div>
													<br>
													<fieldset>
													<legend style="border-bottom:1px solid grey;">Fee</legend>
														<div class="form-group">	
															<label class="col-lg-2 control-label text-left">Subtotal:</label>
															<div class="col-lg-4">
																<input class="form-control" style="background-color: inherit; color: #666;" disabled id="subt" name="subt"></input>
																<input type="text" hidden id="hiddensubt" name="hiddensubt">
															</div>
															<label class="col-lg-2 control-label text-left">Date:</label>
															<div class="col-lg-4">
																<input class="form-control" style="background-color: inherit; color: #666;"disabled id="date" name="date"></input>
																<input type="text" hidden id="hiddendate" name="hiddendate">
															</div>
														</div>
														<div class="form-group">	
															<label class="col-lg-2 control-label text-left">Discount:</label>
															<div class="col-lg-4">
																<input class="form-control" style="background-color: inherit;color: #666;" disabled id="discount" name="discount"></input>
																<input type="text" hidden id="hiddendiscount" name="hiddendiscount">
															</div>
														</div>
														<div class="form-group">	
															<label class="col-lg-2 control-label text-left">Total Fee<br>(Inclusive of all taxes)</label>
															<div class="col-lg-4">
																<input class="form-control" style="background-color: inherit;color: #666;" disabled id="totalfee" name="totalfee"></input>
																<input type="text" hidden id="hiddentotalfee" name="hiddentotalfee">
															</div>
														</div>
													</fieldset>
													<div class="form-group">
															<div class="col-lg-2 col-lg-offset-1 col-md-2 col-sm-2 col-xs-3">
																<button name="enroll" id="enroll" class="form-control btn btn-success"><span class="glyphicon glyphicon-ok"></span> </button>
															</div>
															<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
																<button class="form-control btn btn-danger" name="cancel"><span class="glyphicon glyphicon-remove"></span> </button>
															</div>
													</div>
												</fieldset>
												<input type="text" id="fetch_batch_id" name="fetch_batch_id" hidden>
												<input type="text" id="fetch_trainer_id" name="fetch_trainer_id" hidden>
												<input type="text" id="fetch_course_id" name="fetch_course_id" hidden>
											</form>
										</div>';
								echo '</div>
								</div>
								<div class="col-lg-4 col-md-10 ">
									<div class="panel panel-primary">
									<table class="table table-striped">
										<caption class="text-center">Seat Details for Gym</caption>
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