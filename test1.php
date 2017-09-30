<?php require('DBHandler/DB.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
						var row = $('<tr></tr>').attr({ class: ["class1", "class2", "class3"].join(' ') }).appendTo(mytable);
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
		});
	</script>
</head>
<body>
	<div class="container"><br>
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
	  <li><a href="#profile" data-toggle="tab">Profile</a></li>
	  <li class="disabled"><a>Disabled</a></li>
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
	  						<br><div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Failed.</strong></div>
	  					</div>
	  				</div>
	  				<div class="row">
	  					<div class="col-lg-6 col-md-6">
			    			<form class="form-horizontal">
								  <fieldset>
								  		<legend>Trainer Details</legend>
								  		<div class="form-group">
								  			<label for="inputName" class="col-lg-3 control-label">Name</label>
									      <div class="col-lg-9">
									      	<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
									      </div>
								  		</div>
								  		<div class="form-group">
								  			<label for="inputAddress" class="col-lg-3 control-label">Address</label>
									      <div class="col-lg-9">
									      	<input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Address">
									      </div>
								  		</div>
								  		<div class="form-group">
								  			<label for="inputContact" class="col-lg-3 control-label">Contact Number</label>
									      <div class="col-lg-9">
									      	<input type="text" class="form-control" id="inputContact" name="inputContact" placeholder="Contact Number">
									      </div>
								  		</div>
								  		<div class="form-group">
								  			<label for="inputEmail" class="col-lg-3 control-label">Email</label>
									      <div class="col-lg-9">
									      	<input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
									      </div>
								  		</div>
								  		<div class="form-group">
								  			<label for="inputSalary" class="col-lg-3 control-label">Salary</label>
								  			<div class="col-lg-9">
									  			<div class="input-group">
												    <span class="input-group-addon">₹</span>
												    <input type="text" class="form-control" id="inputSalary" name="inputSalary" placeholder="Salary">
												  </div>
												</div>
								  		</div>
								  		<div class="form-group">
								  			<label class="col-lg-3 control-label">Course</label>
									      <div class="col-lg-9">
									      	<div class="input-group">
									      		<select class="form-control" id="inputCourse">
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
									        <button type="submit" class="btn btn-success">Add Trainer</button>
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
