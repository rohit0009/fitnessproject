
<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<style type="text/css">
		body{
			
		}
		footer {
		  padding: 50px 0;
		}
	</style>
	<script>
	$(document).ready(function(){
		$("#inputBatch").attr({disabled: ""});
		$("#inputCourse").on("change",function(){
			if($("#inputCourse").find(":selected").val() == "")
			{
				$("#inputBatch").attr({disabled: ""});
				
			}
			$("#inputBatch > option").remove();
			$('#inputBatch').append($("<option></option>").attr("value","").text("-----Select Batch-----"));
		});
		$("#checkBatch").click(function(){

			var str = "";
			if($("#inputCourse").find(":selected").val() == "")
			{
				$("#table").html("");
			}
			else{
				$("#inputBatch").removeAttr("disabled");
				$mainsplit = $("#inputCourse").find(":selected").val().split('^&^');	
				//alert($mainsplit);
				var rowArray = $mainsplit[1].split("%&%");
				//alert(rowArray);
				var rowcount = new Number($mainsplit[2]);
				//alert(rowcount);

				$("#table").html("");
				mytable = $('<table class="table table-striped table-hover"><thead><tr><th class="text-center">Batch</th><th class="text-center">Trainer</th></tr></thead><tbody></tbody></table>').attr({ id: "basicTable" });
				var rows = rowcount;
				var cols = new Number(2);
				for (var i = 0; i < rows; i++) {
					var colArray = rowArray[i].split("$&$");
					var row = $('<tr></tr>').appendTo(mytable);
					var tempBatchStore="";
					for (var j = 0; j < cols; j++) {
						if(tempBatchStore != "" && j==1)
						{
							if(colArray[3] == "-")
								$('#inputBatch').append($("<option></option>").attr("value",colArray[0]).text(colArray[1]));
						}
						if(j == 0)
						{	
							$('<td class="text-center"></td>').text(colArray[1]).appendTo(row); 
							tempBatchStore = colArray[1];
						}
						if(j == 1)
							$('<td class="text-center"></td>').text(colArray[3]).appendTo(row); 
					}		 
				}
				console.log("TTTTT:"+mytable.html());
				mytable.appendTo("#table");
				$("#fetchcourseid").attr({value: $mainsplit[0]});

			}
				
		});
		$("#inputBatch").on("change",function(){
			if($(this).find(":selected").val() == "")
				$("#fetchbatchid").attr({value: ""});	
			else
				$("#fetchbatchid").attr({value: $(this).find(":selected").val()});
		});
		$("#selectdeleteT").on("change",function(){
			if($(this).find(":selected").val() == "")
			{
				$("#trainer_id").attr({value: ""});
				$("#emailT").attr({value: ""});
				$("#fetchtra").attr({value: ""});
				
			}
			else
			{
				var data = $(this).find(":selected").val().split('^&^');
				$("#trainer_id").attr({value: data[0]});
				$("#emailT").attr({value: data[2]});
				$("#fetchtra").attr({value: data[0]});
			}
		});

		$("#select").on("change",function(){
			if($(this).find(":selected").val() == "")
			{
				$("#email").attr({value: ""});
				$("#username").attr({value: ""});
				$("#fetchcust").attr({value: ""});
				$("#cust_id").attr({value: ""});
			}
			else
			{
				var data = $(this).find(":selected").val().split('^&^');
				$("#cust_id").attr({value: data[0]});
				$("#fetchcust").attr({value: data[0]});
				$("#email").attr({value: data[1]});
				$("#username").attr({value: data[2]});
			}
		});

		$("#selectUpdateT").on("change",function(){
			if($(this).find(":selected").val() == "")
			{
				$("#updateCourseT").attr({value: ""});
				$("#fetchtrainerupdateT").attr({value: ""});
				$("#batch_updateT").text("");
				//$("#").attr({value: ""});
				$("#updateTtable tr:eq(1) td:eq(0)").text("");
				$("#updateTtable tr:eq(1) td:eq(1)").text("");
				$("#updateTtable tr:eq(1) td:eq(2)").text("");
				$("#updateTtable tr:eq(1) td:eq(3)").text("");
				$("#updateTtable tr:eq(1) td:eq(4)").text("");
				$("#updateTtable tr:eq(1) td:eq(5)").text("");
				$("#updateTtable tr:eq(1) td:eq(6)").text("");
			}
			else
			{
				var data = $(this).find(":selected").val().split('^&^');
				$("#updateCourseT").attr({value: data[6]});
				$("#fetchtrainerupdateT").attr({value: data[0]});
				$("#batch_updateT").html(data[7]);
				$("#updateTtable tr:eq(1) td:eq(0)").text(data[0]);
				$("#updateTtable tr:eq(1) td:eq(1)").text(data[1]);
				$("#updateTtable tr:eq(1) td:eq(2)").text(data[3]);
				$("#updateTtable tr:eq(1) td:eq(3)").text(data[2]);
				$("#updateTtable tr:eq(1) td:eq(4)").text(data[4])
				$("#updateTtable tr:eq(1) td:eq(5)").text(data[5]);
				$("#updateTtable tr:eq(1) td:eq(6)").text(data[6]);
			}
		});

		$("#selectUpdateC").on("change",function(){
			if($(this).find(":selected").val() == "")
			{
				$("#updateCourse").attr({value: ""});
				$("#fetchcustidC").attr({value: ""});
				//$("#").attr({value: ""});
				$("#updateCtable tr:eq(1) td:eq(0)").text("");
				$("#updateCtable tr:eq(1) td:eq(1)").text("");
				$("#updateCtable tr:eq(1) td:eq(2)").text("");
				$("#updateCtable tr:eq(1) td:eq(3)").text("");
				$("#updateCtable tr:eq(1) td:eq(4)").text("");
				$("#updateCtable tr:eq(1) td:eq(5)").text("");
				$("#updateCtable tr:eq(1) td:eq(6)").text("");
			}
			else
			{
				var data = $(this).find(":selected").val().split('^&^');
				$("#updateCourse").attr({value: data[0]});
				$("#fetchcustidC").attr({value: data[0]});
				//$("#monthlyFee").html(data[7]);
				$("#updateCtable tr:eq(1) td:eq(0)").text(data[0]);
				$("#updateCtable tr:eq(1) td:eq(1)").text(data[1]);
				$("#updateCtable tr:eq(1) td:eq(2)").text(data[2]);
				$("#updateCtable tr:eq(1) td:eq(3)").text(data[3]);
				$("#updateCtable tr:eq(1) td:eq(4)").text(data[4])
				$("#updateCtable tr:eq(1) td:eq(5)").text(data[5]);
				$("#updateCtable tr:eq(1) td:eq(6)").text(data[6]);
			}
		});

		$("#selectUpdateM").on("change",function(){

			if($(this).find(":selected").val() == "")
			{
				$("#email").attr({value: ""});
				$("#username").attr({value: ""});
				$("#cust_id_updateM").attr({value: ""});
				$("#updateEmailM").attr({value: ""});
				$("#updateMtable tr:eq(1) td:eq(0)").text("");
				$("#updateMtable tr:eq(1) td:eq(1)").text("");
				$("#updateMtable tr:eq(1) td:eq(2)").text("");
				$("#updateMtable tr:eq(1) td:eq(3)").text("");
				$("#updateMtable tr:eq(1) td:eq(4)").text("");
				$("#updateMtable tr:eq(1) td:eq(5)").text("");
			}
			else
			{
				var data = $(this).find(":selected").val().split('^&^');
				$("#cust_id_updateM").attr({value: data[0]});
				$("#fetchcustupdateM").attr({value: data[0]});
				$("#updateEmailM").attr({value: data[1]});
				$("#updateMtable tr:eq(1) td:eq(0)").text(data[0]);
				$("#updateMtable tr:eq(1) td:eq(1)").text(data[3]);
				$("#updateMtable tr:eq(1) td:eq(2)").text(data[4]);
				$("#updateMtable tr:eq(1) td:eq(3)").text(data[5]);
				$("#updateMtable tr:eq(1) td:eq(4)").text(data[6])
				$("#updateMtable tr:eq(1) td:eq(5)").text(data[2]);
			}
		});

	});
	</script>

</head>
<body>

	<br>
	<div class="container-fluid" style="margin-left: 50px;margin-right: 50px;">
		<?php require('header-admin-home.php'); ?>
		
		<br>
		
		
		<ul class="nav nav-tabs" id="innertab">
		  <li class="dropdown active">
		  		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		  			Course <span class="caret"></span>
		  		</a>
		  		<ul class="dropdown-menu">
			      <li><a href="#Courses" data-toggle="tab">Course List</a></li>
			      <li class="divider"></li>
			      <li><a href="#courseupdate" data-toggle="tab">Update Course</a></li>
			    </ul>
		  </li>
		  <li class="dropdown">
		  		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		  			Trainer <span class="caret"></span>
		  		</a>
		  		<ul class="dropdown-menu">
			      <li><a href="#Trainers" data-toggle="tab">Trainer List</a></li>
			      <li class="divider"></li>
			      <li><a href="#addT" data-toggle="tab">Add Trainer</a></li>
			      <li class="divider"></li>
			      <li><a href="#trainerupdate" data-toggle="tab">Update Trainer Details</a></li>
			      <li class="divider"></li>
			      <li><a href="#trainerdelete" data-toggle="tab">Delete Trainer</a></li>
			    </ul>
		  </li>
		  <li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		      Member <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
		      <li><a href="#Members" data-toggle="tab">Member List <span class="badge"><?php $dtb =new DTB(); $result = $dtb->processQuery("select count(cust_id) from member;"); echo $dtb->getParam($result,"count(cust_id)"); $dtb->close();?></span></a></li>
		      <li class="divider"></li>
		      <li><a href="#updateM" data-toggle="tab">Update Member Details</a></li>
		      <li class="divider"></li>
		      <li><a href="#deleteM" data-toggle="tab">Delete Member</a></li>
		    </ul>
		  </li>				  
		</ul>

		<?php if($_SERVER['REQUEST_METHOD'] == 'POST') 
		{ 
			$dtb = new DTB();

			if(isset($_REQUEST['deleteTrainer']))
			{
				if($_REQUEST['fetchtra']!="")
				{
					$result = $dtb->processQuery("select course_id from trainer where trainer_id =".$_REQUEST['fetchtra']);
					$course_id = $dtb->getParam($result,'course_id');
					$dtb->processQuery("UPDATE `trainer` SET `course_id` = NULL WHERE `trainer`.`trainer_id` =".$_REQUEST['fetchtra']);
					$result = $dtb->processQuery("select * from seat where course_id =".$course_id.' and trainer_id ='.$_REQUEST['fetchtra']);
					while ($row = $result->fetch_assoc()) {
						$dtb->processQuery("UPDATE `seat` SET `trainer_id` = NULL WHERE `seat`.`course_id` =".$course_id." and `seat`.`trainer_id` = ".$_REQUEST['fetchtra']);
					}
					echo '<br><div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Trainer Deleted!</strong></div>';
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#trainerdelete').addClass('active in');
								$('#innertab > li:nth-child(1)').removeClass('active');
								$('#innertab > li:nth-child(2)').addClass('active');
							});
						</script>";
				}
				else
				{
					echo '<br><div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Select a Trainer</strong></div>';
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#trainerdelete').addClass('active in');
								$('#innertab > li:nth-child(1)').removeClass('active');
								$('#innertab > li:nth-child(2)').addClass('active');
							});
						</script>";
				}
			}
			if(isset($_REQUEST['updateTrainerSubmit']))
			{
				if($_REQUEST['fetchtrainerupdateT']=="" || $_REQUEST['attributeT']=="" || $_REQUEST['newdetailsT']=="")
				{
					echo '<br><div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Enter all details.</strong></div>';
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#trainerupdate').addClass('active in');
								$('#innertab > li:nth-child(1)').removeClass('active');
								$('#innertab > li:nth-child(2)').addClass('active');
							});
						</script>";
				}
				else
				{
					$arr = explode("^&^", $_REQUEST['selectUpdateT']);
					$flag = 1;
					if($flag)
					{
						if($_REQUEST['attributeT'] == "contact_no")
						{
							if(!is_numeric($_REQUEST['newdetailsT']))
							{
								echo '<br><div class="alert alert-dismissible alert-warning">
						 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
						 	  	<strong>Enter Numbers only.</strong></strong></div>';
						 	  	$flag = 0;
						 	}
						 	  else
						 	  {
						 	  		if(strlen($_REQUEST['newdetailsT']) != 10)
						 	  		{
						 	  			echo '<br><div class="alert alert-dismissible alert-warning">
									 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
									 	  	<strong>Enter 10 numbers only.</strong></div>';
									 	$flag = 0;  	
						 	  		}
						 	  }
						}
						if($_REQUEST['attributeT'] == "salary")
						{
							if(!is_numeric($_REQUEST['newdetailsT']))
							{
								echo '<br><div class="alert alert-dismissible alert-warning">
						 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
						 	  	<strong>Enter Numbers only.</strong></div>';
						 	  	$flag = 0;
						 	}
						 	  else
						 	  {
						 	  		if($_REQUEST['newdetailsT'] < 0)
						 	  		{
						 	  			echo '<br><div class="alert alert-dismissible alert-warning">
									 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
									 	  	<strong>Enter positive salary only.</strong></div>';
									 	$flag = 0;
						 	  		}
						 	  }
						}
					}

					if($flag)
					{
						$result = $dtb->processQuery('update trainer set '.$_REQUEST['attributeT'].'='.$_REQUEST['newdetailsT'].' where trainer_id='.$arr[0]);
						if($result === TRUE)
							echo '<br><div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Updated Trainer Details.</strong></div>';
						else
							echo '<br><div class="alert alert-dismissible alert-danger">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Failed.</strong></div>';
				    }
					
					//print_r($arr);
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#trainerupdate').addClass('active in');
								$('#innertab > li:nth-child(1)').removeClass('active');
								$('#innertab > li:nth-child(2)').addClass('active');
							});
						</script>";
				}
			}
			
			if(isset($_REQUEST['updateMember']))
			{
				if($_REQUEST['attribute']=="" || $_REQUEST['selectUpdateM']=="" || $_REQUEST['newdetails']=="")
				{
					echo '<br><div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Enter all details.</strong></div>';
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#updateM').addClass('active in');
								$('#innertab > li:nth-child(1)').removeClass('active');
								$('#innertab > li:nth-child(3)').addClass('active');
							});
						</script>";
				}
				else
				{
					$arr = explode("^&^", $_REQUEST['selectUpdateM']);
					$flag = 1;
					if($flag)
					{
						if($_REQUEST['attribute'] == "contact_no")
						{
							if(!is_numeric($_REQUEST['newdetails']))
							{
								echo '<br><div class="alert alert-dismissible alert-warning">
						 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
						 	  	<strong>Enter Numbers only.</strong></div>';
						 	  	$flag = 0;
						 	}
						 	  else
						 	  {
						 	  		if(strlen($_REQUEST['newdetails']) != 10)
						 	  		{
						 	  			echo '<br><div class="alert alert-dismissible alert-warning">
									 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
									 	  	<strong>Enter 10 numbers only.</strong></div>';
									 	$flag = 0;  	
						 	  		}
						 	  }
						}
						if($_REQUEST['attribute'] == "pincode")
						{
							if(!is_numeric($_REQUEST['newdetails']))
							{
								echo '<br><div class="alert alert-dismissible alert-warning">
						 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
						 	  	<strong>Enter Numbers only.</strong></div>';
						 	  	$flag = 0;
						 	}
						 	  else
						 	  {
						 	  		if(strlen($_REQUEST['newdetails']) != 6)
						 	  		{
						 	  			echo '<br><div class="alert alert-dismissible alert-warning">
									 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
									 	  	<strong>Enter 6 numbers only.</strong></div>';
									 	$flag = 0;
						 	  		}
						 	  }
						}
					}

					if($flag)
					{
						$result = $dtb->processQuery('update member set '.$_REQUEST['attribute'].'='.$_REQUEST['newdetails'].' where cust_id='.$arr[0]);
						if($result === TRUE)
							echo '<br><div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Updated Member Details.</strong></div>';
						else
							echo '<br><div class="alert alert-dismissible alert-warnng">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Failed.</strong></div>';
				    }
					
					//print_r($arr);
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#updateM').addClass('active in');
								$('#innertab > li:nth-child(1)').removeClass('active');
								$('#innertab > li:nth-child(3)').addClass('active');
							});
						</script>";	
				}
			}

			if(isset($_REQUEST['updateCourseSubmit']))
			{
				if($_REQUEST['attributeC']=="" || $_REQUEST['newdetailsC']=="" || $_REQUEST['fetchcustidC'] == "")
				{
					echo '<br><div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Enter all details.</strong></div>';
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#courseupdate').addClass('active in');
							});
						</script>";
				}
				else
				{
					$arr = explode("^&^", $_REQUEST['selectUpdateC']);
					$flag = 1;
					if($flag)
					{
						if($_REQUEST['attributeC'] == "monthlyFee")
						{
							if(!is_numeric($_REQUEST['newdetailsC']))
							{
								echo '<br><div class="alert alert-dismissible alert-warning">
						 		  <button type="button" class="close" data-dismiss="alert">&times;</button>
						 	  	<strong>Enter Numbers only.</strong></div>';
						 	  	$flag = 0;
						 	}
						 	else
						 	{
						 	  	if($_REQUEST['newdetailsC'] < 0)
						 	  	{
						 	  		echo '<br><div class="alert alert-dismissible alert-warning">
									 	  <button type="button" class="close" data-dismiss="alert">&times;</button>
									 	  <strong>Enter positive amount only.</strong></div>';
									$flag = 0;
						 	  	}
						 	}
						}
					}
					if($flag)
					{
						$result = $dtb->processQuery('update course set '.$_REQUEST['attributeC'].'="'.$_REQUEST['newdetailsC'].'" where course_id='.$_REQUEST["fetchcustidC"]);
						if($result === TRUE)
							echo '<br><div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Updated Course Details.</strong></div>';
						else
							echo '<br><div class="alert alert-dismissible alert-danger">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Failed.</strong></div>';
				    }
					
					//print_r($arr);
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#courseupdate').addClass('active in');
							});
						</script>";
				}
			}
			
			if(isset($_REQUEST['deleteMember']))
			{
				if($_REQUEST['fetchcust']!="")
				{
					$dtb->processQuery(" DELETE FROM `member` WHERE `member`.`cust_id` =".$_REQUEST['fetchcust']);
					echo '<br><div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Member Deleted!</strong></div>';
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#deleteM').addClass('active in');
								$('#innertab > li:nth-child(1)').removeClass('active');
								$('#innertab > li:nth-child(3)').addClass('active');
							});
						</script>";
				}
				else
				{
					echo '<br><div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Select a Member</strong></div>';
					echo "<script>
							$(document).ready(function(){ 
								$('#Courses').removeClass('active in'); 
								$('#deleteM').addClass('active in');
								$('#innertab > li:nth-child(1)').removeClass('active');
								$('#innertab > li:nth-child(3)').addClass('active');
							});
						</script>";
				}
			}
			
		} 
		?>
		
		
		<div id="myTabContent" class="tab-content">
			<div class="tab-pane fade" id="addT">
				<br>
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<!-- <div class="btn-group btn-group-justified">
									    <a href="" class="btn btn-default" data-toggle="tab">Add Trainer</a>
									    <a href="#batchT" class="btn btn-default" data-toggle="tab">Add Batch to trainer</a>
							</div> -->
						</div>
					</div>
				</div>
				<br>
			 	<div class="panel panel-primary">
			  		<div class="panel-heading">
			  			Add Trainer
			  		</div>
			  		<div class="panel-body">
			  				<div class="row">
			  					<div class="col-lg-6">
			  						<?php
			  							if($_SERVER['REQUEST_METHOD']=='POST')
			  							{
			  								if(isset($_POST['submitaddtrainer']))
			  								{
			  									$flag = 0;
			  									echo "<script>
														$(document).ready(function(){ 
															$('#Courses').removeClass('active in'); 
															$('#addT').addClass('active in');
															$('#innertab > li:nth-child(1)').removeClass('active');
															$('#innertab > li:nth-child(2)').addClass('active');
														});
													</script>";
													if($_POST['inputName']=="" || $_POST['inputAddress']== "" || $_POST['inputContact']=="" || $_POST['inputEmail'] =="" || $_POST['inputSalary']=="" || $_POST['fetchcourseid']=="" || $_POST['fetchbatchid'] =="")
													{
														echo '<br><div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Enter all Details.</strong></div>';
													 	$flag = 1;
													}
													else
													{
														if(!preg_match("/^([a-zA-Z]+|[a-zA-Z]+[\s]{1}[a-zA-Z]+|[a-zA-Z]+[\s]{1}[a-zA-Z]+[\s]{1}[a-zA-Z]+)$/", $_POST['inputName']))
														{
															echo '<br><div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Enter alphabets only in " Name Field ".</strong></div>';
													 		$flag = 1;
														}
														else
														{
															if(!is_numeric($_POST['inputContact']))
															{
																$flag = 1;
																  echo '<br><div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Enter Numbers only in Contact Number.</strong></div>';
															}
															else
															{
																if(strlen($_POST['inputContact']) != 10)
																{
																	$flag = 1;
															  	echo '<br><div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Enter 10 digit number only.</strong></div>';
																}
																else
																{
																	if (!filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)) {
																		$flag = 1;
																	  echo '<br><div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Invalid Email.</strong></div>';
																	}
																	else
																	{
																		if(!is_numeric($_POST['inputSalary']))
																		{
																			$flag = 1;
																		  echo '<br><div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Enter Numeric Salary only.</strong></div>';
																		}
																	}
																}
															}
														}
													}
													if($flag == 0)
													{
														$insertTrainer = $dtb->processQuery("insert into trainer (trainer_name,contact_no,salary,address,email,course_id) values ('".$_POST['inputName']."','".$_POST['inputContact']."','".$_POST['inputSalary']."','".$_POST['inputAddress']."','".$_POST['inputEmail']."','".$_POST['fetchcourseid']."')");
														if($insertTrainer === TRUE)
														{
															echo '<br><div class="alert alert-dismissible alert-success"><button type="button" class="close"	 data-dismiss="alert">&times;</button><strong>Trainer Added Successfully.</strong></div>';
															$selectTraineridresult = $dtb->processQuery("select trainer_id from trainer where trainer_name = '".$_POST['inputName']."' and email = '".$_POST['inputEmail']."'");
															$trainerid = $dtb->getParam($selectTraineridresult,'trainer_id');
															//echo $trainerid." ".$_POST['fetchbatchid']." ".$_POST['fetchcourseid'];
															$seatresult = $dtb->processQuery("update seat set trainer_id = ".$trainerid." where batch_id=".$_POST['fetchbatchid']." and course_id=".$_POST['fetchcourseid']);
														}
														else
														{
															echo '<br><div class="alert alert-dismissible alert-danger"><button type="button" class="close"	 data-dismiss="alert">&times;</button><strong>Query Failed.</strong></div>';	
														}

														
													}
				  								//print_r($_POST);
				  							}
			  							}
			  						?>
			  						
			  					</div>
			  				</div>
			  				<div class="row">
			  					<div class="col-lg-6 col-md-6">
					    			<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
										  <fieldset>
										  		<legend>Trainer Details</legend>
										  		<div class="form-group">
										  			<label for="inputName" class="col-lg-3 control-label">Name</label>
											      <div class="col-lg-9">
											      	<input type="text" class="form-control" id="inputName" name="inputName" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submitaddtrainer']) && $flag == 1){if(isset($_POST['inputName']))echo $_POST['inputName'];}?>" placeholder="Name">
											      </div>
										  		</div>
										  		<div class="form-group">
										  			<label for="inputAddress" class="col-lg-3 control-label">Address</label>
											      <div class="col-lg-9">
											      	<input type="text" class="form-control" id="inputAddress" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submitaddtrainer']) && $flag == 1){if(isset($_POST['inputAddress']))echo $_POST['inputAddress'];}?>" name="inputAddress" placeholder="Address">
											      </div>
										  		</div>
										  		<div class="form-group">
										  			<label for="inputContact" class="col-lg-3 control-label">Contact Number</label>
											      <div class="col-lg-9">
											      	<input type="text" class="form-control" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submitaddtrainer']) && $flag == 1){if(isset($_POST['inputContact']))echo $_POST['inputContact'];}?>" id="inputContact" name="inputContact" placeholder="Contact Number">
											      </div>
										  		</div>
										  		<div class="form-group">
										  			<label for="inputEmail" class="col-lg-3 control-label">Email</label>
											      <div class="col-lg-9">
											      	<input type="text" class="form-control" id="inputEmail" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submitaddtrainer']) && $flag == 1){if(isset($_POST['inputEmail']))echo $_POST['inputEmail'];}?>" name="inputEmail" placeholder="Email">
											      </div>
										  		</div>
										  		<div class="form-group">
										  			<label for="inputSalary" class="col-lg-3 control-label">Salary</label>
										  			<div class="col-lg-9">
											  			<div class="input-group">
														    <span class="input-group-addon">₹</span>
														    <input type="text" class="form-control" id="inputSalary" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submitaddtrainer']) && $flag == 1){if(isset($_POST['inputSalary']))echo $_POST['inputSalary'];}?>" name="inputSalary" placeholder="Salary">
														  </div>
														</div>
										  		</div>
										  		<div class="form-group">
										  			<label class="col-lg-3 control-label">Course</label>
											      <div class="col-lg-9">
											      	<div class="input-group">
											      		<select class="form-control" id="inputCourse" name="inputCourse" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && $flag == 1){if(isset($_POST['inputCourse']))echo $_POST['inputCourse'];}?>">
											      			<option value="">-----Select Course-----</option>
												      		<?php
												      			$dtb = new DTB();
												      			$course = $dtb->processQuery("select course_id,course_name from course;");

												      			while($courserow = $course->fetch_assoc())
												      			{
												      					$batch = $dtb->processQuery("select batch_id,batch_name,batch_time from batch where course_id=".$courserow['course_id']);
												      					$rowcount = $dtb->processQuery("select count(batch_id) from batch where course_id=".$courserow['course_id']);
												      					$varRowCount = $dtb->getParam($rowcount,"count(batch_id)");
												      					
												      					$data = "";
												      					while ($batchrow = $batch->fetch_assoc()) 
												      					{
												      						$trainer_batch = $dtb->processQuery("select trainer_id,trainer_name from trainer where trainer_id in (select trainer_id from seat where batch_id=".$batchrow['batch_id'].")");

												      						if($trainer_batch->num_rows == 0)
												      						{
												      							$data = $data . $batchrow['batch_id']."$&$".$batchrow['batch_name']." ( ".$batchrow['batch_time']." )"."$&$-$&$";
													      						mysqli_data_seek($trainer_batch,0);
													      						$data = $data . "-%&%";	
												      						}
												      						else
												      						{
													      						$data = $data . $batchrow['batch_id']."$&$".$batchrow['batch_name']." ( ".$batchrow['batch_time']." )"."$&$".$dtb->getParam($trainer_batch,"trainer_id")."$&$";
													      						mysqli_data_seek($trainer_batch,0);
													      						$data = $data . $dtb->getParam($trainer_batch,"trainer_name")."%&%";
													      					}
												      					}
												      					echo "<br>".$courserow['course_id']."^&^".$data;
												      					echo "<option value='".$courserow['course_id']."^&^".$data."^&^".$varRowCount."'>".$courserow['course_name']."</option>";
												      			}
												      		?>
												        </select>
												        <input type="text" hidden id="fetchcourseid" name="fetchcourseid">
												        <input type="text" hidden id="fetchbatchid" name="fetchbatchid">
												        <input type="text" hidden id="fetchtrainerid" name="fetchtrainerid">
												        <span class="input-group-btn">
														      <button class="btn btn-default" type="button" id="checkBatch">Check Batch-Trainer Status</button>
														    </span>
											     		</div>
										      	</div>
										  		</div>
										  		<div class="form-group">
										  			<label class="col-lg-3 control-label">Select Batch</label>
										  			<div class="col-lg-9">
														    <select class="form-control" id="inputBatch">
														    	<option value="">-----Select Batch-----</option>
														    </select>
														</div>
										  		</div>
										  		<div class="form-group">
											      <div class="col-lg-10 col-lg-offset-3">
											        <button type="submit" class="btn btn-success" id="submitaddtrainer" name="submitaddtrainer">Add Trainer</button>
											      </div>
											    </div>
										  </fieldset>
										</form>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="panel panel-primary">
											<div class="panel-body">
											
												<div id="table">
													
												</div>
												
											</div>
											<div class="text-center"><p class="lead">Batch-Trainer Details</p></div>
										</div>
									</div>
								</div>
							</div>
			    	</div>
			    </div>
	    <div class="tab-pane fade" id="batchT">
	    	<br>
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="btn-group btn-group-justified">
									    <a href="#addT" class="btn btn-default" data-toggle="tab">Add Trainer</a>
									    <a href="#batchT" class="btn btn-default" data-toggle="tab">Add Batch to trainer</a>
							</div>
						</div>
					</div>
				</div>
				<br>
		    <p class="lead">Work in progress.</p>
		  </div>
			<div class="tab-pane fade" id="trainerdelete">
				<div class="panel panel-warning">
					  <div class="panel-heading">
					    <h3 class="panel-title">Delete Trainer</h3>
					  </div>
					  <div class="panel-body">
					    	<div class="container">
					    		<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  								<fieldset>
							    		<div class="form-group">
									      <label for="select" class="col-lg-2 control-label">Select Name</label>
									      <div class="col-lg-3">
									        <select class="form-control" id="selectdeleteT" name="selectdeleteT">
									        	<?php
													$dtb = new DTB();
													$result = $dtb->processQuery("select trainer_id,trainer_name,email from trainer where course_id is not null;");
													echo "<option class='disabled'></option>";	
													while ($row = $result->fetch_assoc())
													{
														echo '<option value="'.$row["trainer_id"]."^&^".$row["trainer_name"]."^&^".$row["email"].'">'.$row["trainer_name"].'</option>';
													}
													$dtb->close();
												?>
									        </select>
									       </div>
									       <label class="col-lg-2 control-label">Trainer Id</label>
									       <div class="col-lg-3">
									       		<input type="text" name="fetchtra" id="fetchtra" hidden></input>
									       		<input type="text" class="form-control" name="trainer_id" id="trainer_id" disabled></input>
									       </div>
									    </div>
									    <div class="form-group">
									    	<label for="select" class="col-lg-2 control-label">Email</label>
								      		<div class="col-lg-3">
								      			<input type="text" class="form-control" name="emailT" id="emailT" disabled></input>
								      		</div>
								      		
									    </div>
									    <div class="form-group">
									      <div class="col-lg-5 col-lg-offset-1">
									        <button type="submit" class="btn btn-danger" name="deleteTrainer"><span class="glyphicon glyphicon-trash"></span> Delete Trainer</button>
									      </div>
									    </div>
								    </fieldset>
							     </form>
					    	</div>
					  </div>
				</div>
			</div>
			<div class="tab-pane fade" id="trainerupdate">
				<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">Update Trainer Details</h3>
					  </div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
								<div class="form-group">

							    	<label for="select" class="col-lg-2 control-label">Select Name</label>
						      		<div class="col-lg-3">
								        <select class="form-control" id="selectUpdateT" name="selectUpdateT">
								        	<?php
														$dtb = new DTB();
														$result = $dtb->processQuery("select trainer_id,trainer_name,salary,contact_no,address,email,course_id from trainer where course_id is not null;");
														echo "<option class='disabled' value=''></option>";
														while ($row = $result->fetch_assoc())
														{
															$courseT= $dtb->processQuery("select course_name from course where course_id=".$row['course_id']);
															$batchT = $dtb->processQuery("SELECT batch_name,batch_time from batch where batch_id in (select batch_id from seat where trainer_id =".$row['trainer_id'].");");
															$batchfetcher = "";
															while($rowbatch = $batchT->fetch_assoc())
															{
																$batchfetcher = $batchfetcher.$rowbatch['batch_name']." ( ".$rowbatch['batch_time']." )";
																$batchfetcher = $batchfetcher."\n";
															}
															$course_name = $dtb->getParam($courseT,"course_name");
															echo '<option value="'.$row["trainer_id"]."^&^".$row["trainer_name"]."^&^".$row['salary']."^&^".$row['contact_no']."^&^".$row['address']."^&^".$row['email']."^&^".$course_name."^&^".$batchfetcher.'">'.$row["trainer_name"].'</option>';
														}
														$dtb->close();
													?>
								        </select>
					       			</div>
						      		<label class="col-lg-2 control-label" >Course</label>
							       <div class="col-lg-3">
							       		<input type="text" class="form-control" name="updateCourseT" id="updateCourseT" disabled></input>
							       </div>
							    </div>
							    <div class="form-group">
							    	<label class="col-lg-2 control-label">Batch</label>
							        <div class="col-lg-4">
							       		<textarea class="form-control" name="batch_updateT" id="batch_updateT" rows="5" disabled=""></textarea>
							       		<helpblock>Batches that are taught by the selected trainer.</helpblock>
							        </div>
							        <input type="text" name="fetchtrainerupdateT" id="fetchtrainerupdateT" hidden></input><br><br>
							    </div>
							    <hr style="border-top: 1px grey solid;width: 95%; margin-left: 30px;">
							</fieldset>
							<div class="form-group">
								<label class="col-lg-3 control-label">Select attribute to modify</label>
								<div class="col-lg-3">
						       		<select class="form-control" name="attributeT" id="attributeT">
						       		<option value=""></option>
						       		<option value="contact_no">Contact Number</option>
						       		<option value="salary">Salary</option>
						       		</select>
						        </div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">New Value</label>
						        
						        <div class="col-lg-3">
						        	<input type="text" class="form-control" name="newdetailsT" id="newdetailsT"></input>
						        </div>
							</div>
							<div class="form-group">
						      <div class="col-lg-5 col-lg-offset-3">
						        <button type="submit" class="btn btn-warning" id="updateTrainerSubmit" name="updateTrainerSubmit">Update Member Details</button>
						      </div>
						    </div>
							<hr style="border-top: 1px grey solid;width: 95%; margin-left: 30px;">
							<div class="form-group">
								<div class="container-fluid">
										<table class="table table-striped" id="updateTtable">
											<thead>
											    <tr>
													<th>Trainer ID</th>
													<th>Trainer name</th>
													<th>Contact Number</th>
													<th>Salary</th>
													<th>Address</th>
													<th>Email</th>
													<th>Course Name</th>
												</tr>
											  </thead>
											  <tbody>
											  	<tr>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  	</tr>
											  </tbody>
										</table>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
		  </div>

		  <div class="tab-pane fade" id="courseupdate">
				<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">Update Course Details</h3>
					  </div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
								<div class="form-group">

							    	<label class="col-lg-2 control-label">Select Name</label>
						      		<div class="col-lg-3">
								        <select class="form-control" id="selectUpdateC" name="selectUpdateC">
								        	<?php
														$dtb = new DTB();
														$result = $dtb->processQuery("select course_id,course_name,monthly,monthly_d,quarterly_d,sixmonth_d,yearly_d from course;");
														echo "<option class='disabled' value=''></option>";
														while ($row = $result->fetch_assoc())
														{
															echo '<option value="'.$row["course_id"]."^&^".$row["course_name"]."^&^".$row['monthly']."^&^".$row['monthly_d']."^&^".$row['quarterly_d']."^&^".$row['sixmonth_d']."^&^".$row['yearly_d'].'">'.$row["course_name"].'</option>';
														}
														$dtb->close();
													?>
								        </select>
					       			</div>
						      		<label class="col-lg-2 control-label">Course ID</label>
							       <div class="col-lg-3">
							       		<input type="text" class="form-control" name="updateCourse" id="updateCourse" disabled></input>
							       		<input type="text" name="fetchcustidC" id="fetchcustidC" hidden="">
							       </div>
							    </div>
							    
							    <hr style="border-top: 1px grey solid;width: 95%; margin-left: 30px;">
							</fieldset>
							<div class="form-group">
								<label class="col-lg-3 control-label">Select attribute to modify</label>
								<div class="col-lg-3">
						       		<select class="form-control" name="attributeC" id="attributeC">
							       		<option value=""></option>
							       		<option value="monthly">Monthly Fee</option>
						       		</select>
						        </div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">New Value</label>
						        
						        <div class="col-lg-3">
						        	<input type="text" class="form-control" name="newdetailsC" id="newdetailsC"></input>
						        </div>
							</div>
							<div class="form-group">
						      <div class="col-lg-5 col-lg-offset-3">
						        <button type="submit" class="btn btn-warning" id="updateCourseSubmit" name="updateCourseSubmit">Update Course Details</button>
						      </div>
						    </div>
							<hr style="border-top: 1px grey solid;width: 95%; margin-left: 30px;">
							<div class="form-group">
								<div class="container-fluid">
										<table class="table table-striped" id="updateCtable">
											<thead>
											    <tr>
													<th>Course ID</th>
													<th>Course name</th>
													<th>Monthly Fee</th>
													<th>Monthly Discount</th>
													<th>Quarterly Discount</th>
													<th>Six-Monthly Discount</th>
													<th>Yearly Discount</th>
												</tr>
											  </thead>
											  <tbody>
											  	<tr>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  	</tr>
											  </tbody>
										</table>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
		  </div>

		  <div class="tab-pane fade active in" id="Courses">
		  	<div class="container-fluid">
			    <div class="row">
			    	<div class="col-lg-12"><br>
			    	<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">Course List</h3>
					  </div>
				    	<?php
				    		
							$dtb = new DTB();

							$result = $dtb->processQuery("select * from course;");

							if ($result->num_rows>0)
							{
								echo '<table class="table table-striped ">
										  <thead>
										    <tr>
												<th class="text-center">Course ID</th>
												<th class="text-center">Course name</th>
												<th class="text-center">Monthly Fees</th>
												<th class="text-center">Qtr Fees</th>
												<th class="text-center">Half Yearly Fees</th>
												<th class="text-center">Yearly</th>
											</tr>
										  </thead>
										  <tbody>';
								while ($row = $result->fetch_assoc())
								{
									$monthly = $row['monthly'];
									$qtr = ($monthly*3)-(($monthly*3)*$row['quarterly_d']);
									$hlf = ($monthly*6)-(($monthly*6)*$row['sixmonth_d']);
									$yl = ($monthly*12)-(($monthly*12)*$row['yearly_d']);
										echo '<tr>
									      <td class="text-center">'.$row['course_id'].'</td>
									      <td class="text-center">'.$row['course_name'].'</td>
									      <td class="text-center">'.$monthly.'</td>
									      <td class="text-center">'.$qtr.'</td>
									      <td class="text-center">'.$hlf.'</td>
									      <td class="text-center">'.$yl.'</td>
									      </tr>';	
								}
								echo '</tbody>
									</table>';
							}
							else
								echo "<p class='lead text-center'>List is empty</p>";

							$dtb->close();
				    	?>
				    	</div>
			    	</div>
			    </div>
			  </div>
		  </div>
		  <div class="tab-pane fade" id="Trainers">
		    <div class="container-fluid">
			    <div class="row">
			    	<div class="col-lg-12"><br>
			    	<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">Trainer List</h3>
					  </div>
				    	<?php
				    		
							$dtb = new DTB();

							$result = $dtb->processQuery("select * from trainer;");

							if ($result->num_rows>0)
							{
								echo '<table class="table table-striped ">
										  <thead>
										    <tr>
												<th class="text-center">Trainer ID</th>
												<th class="text-center">Trainer name</th>
												<th class="text-center">Contact No</th>
												<th class="text-center">Salary</th>
												<th class="text-center">Address</th>
												<th class="text-center">Email</th>
												<th class="text-center">Course Speciality</th>
											</tr>
										  </thead>
										  <tbody>';
								while ($row = $result->fetch_assoc())
								{
									if($row['course_id'] != NULL)
									{
										$result1 = $dtb->processQuery("select course_name from course where course_id=".$row['course_id']);
										$course = $result1->fetch_assoc();
											echo '<tr>
										      <td class="text-center">'.$row['trainer_id'].'</td>
										      <td class="text-center">'.$row['trainer_name'].'</td>
										      <td class="text-center">'.$row['contact_no'].'</td>
										      <td class="text-center">'.$row['salary'].'</td>
										      <td class="text-center">'.$row['address'].'</td>
										      <td class="text-center">'.$row['email'].'</td>
										      <td class="text-center">'.$course['course_name'].'</td>
										      </tr>';
									}
								}
								echo '</tbody>
									</table>';
							}
							else
								echo "<p class='lead text-center'>List is empty</p>";

							$dtb->close();
				    	?>
				    	</div>
			    	</div>
			    </div>
			  </div>
		  </div>
		  <div class="tab-pane fade" id="updateM"><br>
		  		<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">Update Member Details</h3>
					  </div>
					<div class="panel-body">
						<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
								<div class="form-group">

							    	<label for="select" class="col-lg-2 control-label">Select Name</label>
						      		<div class="col-lg-3">
								        <select class="form-control" id="selectUpdateM" name="selectUpdateM">
								        	<?php
												$dtb = new DTB();
												$result = $dtb->processQuery("select cust_id,email,username,f_name,l_name,pincode,contact_no from member;");
												echo "<option class='disabled' value=''></option>";	
												while ($row = $result->fetch_assoc())
												{
													echo '<option value='.$row["cust_id"]."^&^".$row["email"]."^&^".$row['username']."^&^".$row['f_name']."^&^".$row['l_name']."^&^".$row['contact_no']."^&^".$row['pincode'].'>'.$row["f_name"]." ".$row["l_name"].'</option>';
												}
												$dtb->close();
											?>
								        </select>
					       			</div>
						      		<label class="col-lg-2 control-label" >Email</label>
							       <div class="col-lg-3">
							       		<input type="text" class="form-control" name="updateEmailM" id="updateEmailM" disabled></input>
							       </div>
							    </div>
							    <div class="form-group">
							    	<label class="col-lg-2 control-label">Customer Id</label>
							        <div class="col-lg-3">
							       		<input type="text" class="form-control" name="cust_id_updateM" id="cust_id_updateM" disabled></input>
							        </div>
							        <input type="text" name="fetchcustupdateM" id="fetchcustupdateM" hidden></input><br><br>
							    </div>
							    <hr style="border-top: 1px grey solid;width: 95%; margin-left: 30px;">
							</fieldset>
							<div class="form-group">
								<label class="col-lg-3 control-label">Select attribute to modify</label>
								<div class="col-lg-3">
						       		<select class="form-control" name="attribute" id="attribute">
						       		<option value=""></option>
						       		<option value="contact_no">Contact Number</option>
						       		<option value="pincode">Pincode</option>
						       		</select>
						        </div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">New Value</label>
						        
						        <div class="col-lg-3">
						        	<input type="text" class="form-control" name="newdetails" id="newdetails"></input>
						        </div>
							</div>
							<div class="form-group">
						      <div class="col-lg-5 col-lg-offset-3">
						        <button type="submit" class="btn btn-warning" id="updateMember" name="updateMember">Update Member Details</button>
						      </div>
						    </div>
							<hr style="border-top: 1px grey solid;width: 95%; margin-left: 30px;">
							<div class="form-group">
								<div class="container-fluid">
										<table class="table table-striped" id="updateMtable">
											<thead>
											    <tr>
													<th>Customer ID</th>
													<th>First name</th>
													<th>Last name</th>
													<th>Contact Number</th>
													<th>Pincode</th>
													<th>Username</th>
												</tr>
											  </thead>
											  <tbody>
											  	<tr>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  		<td></td>
											  	</tr>
											  </tbody>
										</table>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>

		  </div>
		  <div class="tab-pane fade" id="deleteM"><br>
		  		<div class="panel panel-warning">
					  <div class="panel-heading">
					    <h3 class="panel-title">Delete Member</h3>
					  </div>
					  <div class="panel-body">
					    	<div class="container">
					    		<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  								<fieldset>
							    		<div class="form-group">
									      <label for="select" class="col-lg-2 control-label">Select Name</label>
									      <div class="col-lg-3">
									        <select class="form-control" id="select" name="select">
									        	<?php
													$dtb = new DTB();
													$result = $dtb->processQuery("select cust_id,email,username,f_name,l_name from member;");
													echo "<option class='disabled'></option>";	
													while ($row = $result->fetch_assoc())
													{
														echo '<option value='.$row["cust_id"]."^&^".$row["email"]."^&^".$row["username"].'>'.$row["f_name"]." ".$row["l_name"].'</option>';
													}
													$dtb->close();
												?>
									        </select>
									       </div>
									       <label class="col-lg-2 control-label">Member Id</label>
									       <div class="col-lg-3">
									       		<input type="text" name="fetchcust" id="fetchcust" hidden></input>
									       		<input type="text" class="form-control" name="cust_id" id="cust_id" disabled></input>
									       </div>
									    </div>
									    <div class="form-group">
									    	<label for="select" class="col-lg-2 control-label">Email</label>
								      		<div class="col-lg-3">
								      			<input type="text" class="form-control" name="email" id="email" disabled></input>
								      		</div>
								      		<label class="col-lg-2 control-label" >Username</label>
									       <div class="col-lg-3">
									       		<input type="text" class="form-control" name="username" id="username" disabled></input>
									       </div>
									    </div>
									    <div class="form-group">
									      <div class="col-lg-5 col-lg-offset-1">
									        <button type="submit" class="btn btn-danger" name="deleteMember"><span class="glyphicon glyphicon-trash"></span> Delete Member</button>
									      </div>
									    </div>
								    </fieldset>
							     </form>
					    	</div>
					  </div>
				</div>
		  </div>
		  <div class="tab-pane fade" id="Members">
			  <div class="container-fluid">
			    <div class="row">
			    	<div class="col-lg-12"><br>
			    	<div class="panel panel-primary">
					  <div class="panel-heading">
					    <h3 class="panel-title">Member List</h3>
					  </div>
				    	<?php
				    		
							$dtb = new DTB();

							$result = $dtb->processQuery("select * from member;");

							if ($result->num_rows>0)
							{
								echo '<table class="table table-striped ">
										  <thead>
										    <tr>
												<th>Customer ID</th>
												<th>First name</th>
												<th>Last name</th>
												<th>Address</th>
												<th>Pincode</th>
												<th>Contact Number</th>
												<th>Email</th>
												<th>OTP</th>
												<th>Username</th>
												<th>Account Activated?</th>
											</tr>
										  </thead>
										  <tbody>';
								while ($row = $result->fetch_assoc())
								{
									if($row["activate"] == 1)
									{
									  echo '<tr>
									      <td>'.$row['cust_id'].'</td>
									      <td>'.$row['f_name'].'</td>
									      <td>'.$row['l_name'].'</td>
									      <td>'.$row['address'].'</td>
									      <td>'.$row['pincode'].'</td>
									      <td>'.$row['contact_no'].'</td>
									      <td>'.$row['email'].'</td>
									      <td>'.$row['otp'].'</td>
									      <td>'.$row['username'].'</td>';
									      if($row["activate"] == 1)
									      	echo '<td>Activated</td>';
									      else
									      	echo '<td>Not Activated</td>
									    </tr>';
									}
									else
									{
										echo '<tr class="danger">
									      <td>'.$row['cust_id'].'</td>
									      <td>'.$row['f_name'].'</td>
									      <td>'.$row['l_name'].'</td>
									      <td>'.$row['address'].'</td>
									      <td>'.$row['pincode'].'</td>
									      <td>'.$row['contact_no'].'</td>
									      <td>'.$row['email'].'</td>
									      <td>'.$row['otp'].'</td>
									      <td>'.$row['username'].'</td>';
									      if($row["activate"] == 1)
									      	echo '<td>Activated</td>';
									      else
									      	echo '<td>Not Activated</td>
									    </tr>';	
									}
								}
								echo '</tbody>
									</table>';
							}
							else
								echo "<p class='lead text-center'>List is empty</p>";

							$dtb->close();
				    	?>
				    	</div>
			    	</div>
			    </div>
			  </div>
		  </div>

		</div>
		</div>

		<br><br>

	<?php require('../footer.php');?>

	
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>