<?php include('session.php'); ob_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			
		});
		</script>
	
</head>
<body>
	
	<br>
	<?php require 'header-profile.php'; ?>
	<?php
		$result = $dtb->processQuery("select * from membership where cust_id = ".$_SESSION['cust_id']);
		if($result->num_rows == 0)
		{
			echo "<div class='container-fluid'><div class='jumbotron'><p class='text-center lead'>Not Enrolled for any course.<a class='btn btn-link' href='../Activities'> Please Enroll</a></p></div>";
		}
		else
		{
			echo "<div class='container-fluid'><br>";
						$num_of_enrollments = $result->num_rows;
						$rows_req = ceil($num_of_enrollments/2);
						$panel_count = 0;
						while($row = $result->fetch_assoc())
						{
								if($panel_count == 0)
								{
									echo "<div class='row'>";
									echo '<div class="col-lg-5 col-lg-offset-1">
													<div class="panel panel-success">
													  <div class="panel-heading text-center">';
									$course = $dtb->processQuery("select course_name from course where course_id = ".$row['course_id']);
									$course_name = $dtb->getParam($course,"course_name");
									echo "<h4>".$course_name."</h4>";				  
									echo  '</div>
												  <div class="panel-body">
													  <form class="form-horizontal" method="POST">
														  <div class="form-group">
															  <label class="col-lg-3 control-label">Enrollment Date</label>
															  <div class="col-lg-5">
															  	<div class="form-control" style="background-color: inherit; color: #AAA;">'.
												    				$row['enrollment_date'].'</div>
													  		</div>
											  			</div>
											  			<div class="form-group">
															  <label class="col-lg-3 control-label">Expiry Date</label>
															  <div class="col-lg-5">
															  	<div class="form-control" style="background-color: inherit; color: #AAA;">'.
												    				$row['expiry_date'].'</div>
													  		</div>
											  			</div>
											  			<div class="form-group">
															  <label class="col-lg-3 control-label">Batch Name</label>
															  <div class="col-lg-5">
															  	<div class="form-control" style="background-color: inherit; color: #AAA;">';
												    				$batch = $dtb->processQuery("select batch_name from batch where batch_id=".$row['batch_id']);
												    				$batch_name = $dtb->getParam($batch,"batch_name");
												    				echo $batch_name;
												    				echo '</div>
													  		</div>
											  			</div>
											  			<div class="form-group">
															  <label class="col-lg-3 control-label">Batch Time</label>
															  <div class="col-lg-5">
															  	<div class="form-control" style="background-color: inherit; color: #AAA;">';
															  		$batch = $dtb->processQuery("select batch_time from batch where batch_id=".$row['batch_id']);
												    				$batch_time = $dtb->getParam($batch,"batch_time");
												    				echo $batch_time;
											    				echo'</div>
													  		</div>
											  			</div>

											   		</form>
											  		</div>
													</div>
											</div>';
								}
								else if($panel_count == 1)
								{
									echo '<div class="col-lg-5">
													<div class="panel panel-success">
													  <div class="panel-heading text-center">';
									$course = $dtb->processQuery("select course_name from course where course_id = ".$row['course_id']);
									$course_name = $dtb->getParam($course,"course_name");
									echo "<h4>".$course_name."</h4>";
									echo  '</div>
												  <div class="panel-body">
													  <form class="form-horizontal" method="POST">
														  <div class="form-group">
															  <label class="col-lg-3 control-label">Enrollment Date</label>
															  <div class="col-lg-5">
															  	<div class="form-control" style="background-color: inherit; color: #AAA;">'.
												    				$row['enrollment_date'].'</div>
													  		</div>
											  			</div>
											  			<div class="form-group">
															  <label class="col-lg-3 control-label">Expiry Date</label>
															  <div class="col-lg-5">
															  	<div class="form-control" style="background-color: inherit; color: #AAA;">'.
												    				$row['expiry_date'].'</div>
													  		</div>
											  			</div>
											  			<div class="form-group">
															  <label class="col-lg-3 control-label">Batch Name</label>
															  <div class="col-lg-5">
															  	<div class="form-control" style="background-color: inherit; color: #AAA;">';
												    				$batch = $dtb->processQuery("select batch_name from batch where batch_id=".$row['batch_id']);
												    				$batch_name = $dtb->getParam($batch,"batch_name");
												    				echo $batch_name;
												    				echo '</div>
													  		</div>
											  			</div>
											  			<div class="form-group">
															  <label class="col-lg-3 control-label">Batch Time</label>
															  <div class="col-lg-5">
															  	<div class="form-control" style="background-color: inherit; color: #AAA;">';
															  		$batch = $dtb->processQuery("select batch_time from batch where batch_id=".$row['batch_id']);
												    				$batch_time = $dtb->getParam($batch,"batch_time");
												    				echo $batch_time;
											    				echo'</div>
													  		</div>
											  			</div>

											   		</form>
											  		</div>
													</div>
											</div>';	
								}
								
								$panel_count++;
								if($panel_count == 2)
								{
									$panel_count = 0;
									echo "</div>";
								}
						}

					echo "</div>";
		}



	?>
	<?php include '../footer.php'; ?>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>