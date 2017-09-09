
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
		$("#select").on("change",function(){
			if($(':selected').val() == "")
			{
				$("#email").attr({value: ""});
				$("#username").attr({value: ""});
			}
			var data = $(':selected').val().split('^&^');
			$("#cust_id").attr({value: data[0]});
			$("#fetchcust").attr({value: data[0]});
			$("#email").attr({value: data[1]});
			$("#username").attr({value: data[2]});
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
			      <li><a href="#dropdown2" data-toggle="tab">Delete Course</a></li>
			    </ul>
		  </li>
		  <li class="dropdown">
		  		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
		  			Trainer <span class="caret"></span>
		  		</a>
		  		<ul class="dropdown-menu">
			      <li><a href="#Trainers" data-toggle="tab">Trainer List</a></li>
			      <li class="divider"></li>
			      <li><a href="#dropdown3" data-toggle="tab">Update Trainer Details</a></li>
			      <li class="divider"></li>
			      <li><a href="#drop" data-toggle="tab">Delete Trainer</a></li>
			    </ul>
		  </li>
		  <li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		      Member <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
		      <li><a href="#Members" data-toggle="tab">Member List <span class="badge"><?php $dtb =new DTB(); $result = $dtb->processQuery("select count(cust_id) from member;"); echo $dtb->getParam($result,"count(cust_id)"); $dtb->close();?></span></a></li>
		      <li class="divider"></li>
		      <li><a href="#Members1" data-toggle="tab">Update Member Details</a></li>
		      <li class="divider"></li>
		      <li><a href="#deleteM" data-toggle="tab">Delete Member</a></li>
		    </ul>
		  </li>				  
		</ul>
		<?php if($_SERVER['REQUEST_METHOD'] == 'POST') 
		{ 
			$dtb = new DTB();
			if(isset($_REQUEST['deleteMember']))
			{
				if($_REQUEST['fetchcust']!="")
				{
					$dtb->processQuery(" DELETE FROM `member` WHERE `member`.`cust_id` =".$_REQUEST['fetchcust']);
					echo '<br><div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Member Deleted!</div>';
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
						  <strong>Select a Member</div>';
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
			$dtb->close();
		} 
		?>
		<div id="myTabContent" class="tab-content">
		  <div class="tab-pane fade active in" id="Courses">
		    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
		  </div>
		  <div class="tab-pane fade" id="Trainers">
		    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
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
									       <label class="col-lg-2 control-label" >Member Id</label>
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
								echo '<table class="table table-striped table-hover ">
										  <thead>
										    <tr>
												<th>Customer ID</th>
												<th>First name</th>
												<th>Last name</th>
												<th>Address</th>
												<th>Contact Number</th>
												<th>Email</th>
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
									      <td>'.$row['contact_no'].'</td>
									      <td>'.$row['email'].'</td>
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
									      <td>'.$row['contact_no'].'</td>
									      <td>'.$row['email'].'</td>
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