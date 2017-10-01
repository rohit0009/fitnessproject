<?php require('DBHandler/DB.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	
	<script>
		$(document).ready(function(){
			
			

			
			
		});
	</script>
</head>
<body>
	<div class="container"><br>
	<ul class="nav nav-tabs" id="innertab">
	  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
	  <li><a href="#profile" data-toggle="tab">Profile</a></li>
	  <li class="dropdown">
	    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	      Trainer <span class="caret"></span>
	    </a>
	    <ul class="dropdown-menu">
	      <li><a href="#dropdown1" data-toggle="tab">Add Trainer</a></li>
	      <li class="divider"></li>
	      <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
	    </ul>
	  </li>
	</ul>
	<div id="myTabContent" class="tab-content">
	  <div class="tab-pane fade active in" id="home">
	    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
	  </div>
	  <div class="tab-pane fade" id="profile">
	    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
	  </div>
	  <div class="tab-pane fade" id="dropdown1">
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
																$('#home').removeClass('active in'); 
																$('#dropdown1').addClass('active in');
																$('#innertab > li:nth-child(1)').removeClass('active');
																$('#innertab > li:nth-child(3)').addClass('active');
															});
														</script>";
											if($_POST['inputName']=="" || $_POST['inputAddress']== "" || $_POST['inputContact']=="" || $_POST['inputEmail'] =="" || $_POST['inputSalary']=="" || $_POST['fetchcourseid']=="" || $_POST['fetchbatchid'] =="")
											{
												echo '<br><div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Enter all Details.</strong></div>';
											 	$flag = 1;
											}
											else
											{
												if(!ctype_alpha($_POST['inputName']))
												{
													echo '<br><div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Enter alphabets only.</strong></div>';
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

												echo '<br><div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Trainer Added Successfully.</strong></div>';
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
									      	<input type="text" class="form-control" id="inputName" name="inputName" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && $flag == 1){if(isset($_POST['inputName']))echo $_POST['inputName'];}?>" placeholder="Name">
									      </div>
								  		</div>
								  		<div class="form-group">
								  			<label for="inputAddress" class="col-lg-3 control-label">Address</label>
									      <div class="col-lg-9">
									      	<input type="text" class="form-control" id="inputAddress" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && $flag == 1){if(isset($_POST['inputAddress']))echo $_POST['inputAddress'];}?>" name="inputAddress" placeholder="Address">
									      </div>
								  		</div>
								  		<div class="form-group">
								  			<label for="inputContact" class="col-lg-3 control-label">Contact Number</label>
									      <div class="col-lg-9">
									      	<input type="text" class="form-control" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && $flag == 1){if(isset($_POST['inputContact']))echo $_POST['inputContact'];}?>" id="inputContact" name="inputContact" placeholder="Contact Number">
									      </div>
								  		</div>
								  		<div class="form-group">
								  			<label for="inputEmail" class="col-lg-3 control-label">Email</label>
									      <div class="col-lg-9">
									      	<input type="text" class="form-control" id="inputEmail" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && $flag == 1){if(isset($_POST['inputEmail']))echo $_POST['inputEmail'];}?>" name="inputEmail" placeholder="Email">
									      </div>
								  		</div>
								  		<div class="form-group">
								  			<label for="inputSalary" class="col-lg-3 control-label">Salary</label>
								  			<div class="col-lg-9">
									  			<div class="input-group">
												    <span class="input-group-addon">₹</span>
												    <input type="text" class="form-control" id="inputSalary" value="<?php if($_SERVER['REQUEST_METHOD']=='POST' && $flag == 1){if(isset($_POST['inputSalary']))echo $_POST['inputSalary'];}?>" name="inputSalary" placeholder="Salary">
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
	  
	  <div class="tab-pane fade" id="dropdown2">
	    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
	  </div>
	</div>
	</div>
	<?php include 'footer.php'; ?>
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
