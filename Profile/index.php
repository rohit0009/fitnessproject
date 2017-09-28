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
		date_default_timezone_set("Asia/Kolkata");
		$result = $dtb->processQuery("select * from membership where cust_id = ".$_SESSION['cust_id']);
		if($result->num_rows == 0)
		{
			echo "<div class='container-fluid'><div class='jumbotron'><p class='text-center lead'>Not Enrolled for any course.<a class='btn btn-link' href='../Activities'> Please Enroll</a></p></div>";
		}
		else
		{
			echo "<div class='container-fluid'><br><p class='lead text-center'>Your Enrollments</p>";
						$num_of_enrollments = $result->num_rows;
						//$rows_req = ceil($num_of_enrollments/2);
						$panel_count = 0;
						$i_idCounter = 0;
						while($row = $result->fetch_assoc())
						{
							if($panel_count == 0)
							{
								$interval =  date_diff(date_create(date('Y/m/d H:i:s')),date_create($row['expiry_date']." 00:00:00"));
								if($interval->format('%R') == "-")
								{
									$dtb->processQuery("delete from membership where membership_id=".$row['membership_id']);
									header("Location: index.php");
								}
								echo "<div class='row'>";
								echo '<div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1">
												<div class="panel panel-primary">
												  <div class="panel-heading text-center">';
								$course = $dtb->processQuery("select course_name from course where course_id = ".$row['course_id']);
								$course_name = $dtb->getParam($course,"course_name");
								
								echo "<h5>".$course_name."<span class='pull-right'>".$interval->format('%a days')." left</span></h5>";
								$update = $dtb->processQuery("update membership set duration = ".$interval->format('%a')." where membership_id=".$row['membership_id']);
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
								$interval =  date_diff(date_create(date('Y/m/d H:i:s')),date_create($row['expiry_date']." 00:00:00"));
								if($interval->format('%R') == "-")
								{
									$dtb->processQuery("delete from membership where membership_id=".$row['membership_id']);
									header("Location: index.php");
								}
								echo '<div class="col-lg-5 col-md-5 col-sm-5">
												<div class="panel panel-primary">
												  <div class="panel-heading text-center">';
								$course = $dtb->processQuery("select course_name from course where course_id = ".$row['course_id']);
								$course_name = $dtb->getParam($course,"course_name");
								
								echo "<h5>".$course_name."<span class='pull-right'>".$interval->format('%a days')." left</span></h5>";
								$update = $dtb->processQuery("update membership set duration = ".$interval->format('%a')." where membership_id=".$row['membership_id']);
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
								echo "</div><br>";
							}
						}
					if($num_of_enrollments%2 != 0)
						echo "</div>";
					echo "</div>";
		}



	?>
	<?php include '../footer.php'; ?>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>