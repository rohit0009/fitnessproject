<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">


	<style type="text/css">
		body{
			
		}
		footer {
		  padding: 50px 0;
		}
	</style>
</head>
<body>
	<br>
	<div class="container-fluid" style="margin-left: 50px;margin-right: 50px;">
		<?php require('header-admin.php'); ?>
		
		<br>
		
		
		<ul class="nav nav-tabs" style="background-color: #111;">
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
		      <li><a href="#Members" data-toggle="tab">Member List</a></li>
		      <li class="divider"></li>
		      <li><a href="#Members1" data-toggle="tab">Update Member Details</a></li>
		      <li class="divider"></li>
		      <li><a href="#deleteM" data-toggle="tab">Delete Member</a></li>
		    </ul>
		  </li>				  
		</ul>
			
		<div id="myTabContent" class="tab-content">
		  <div class="tab-pane fade active in" id="Courses">
		    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
		  </div>
		  <div class="tab-pane fade" id="Trainers">
		    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
		  </div>
		  <div class="tab-pane fade" id="deleteM"><br>
		  		<div class="panel panel-danger">
				  <div class="panel-heading">
				    <h3 class="panel-title">Delete Member</h3>
				  </div>
				  <div class="panel-body">
				    Panel content
				  </div>
				</div>
		  </div>
		  <div class="tab-pane fade" id="Members">
		    <p>
		    	<?php
		    		require '../DBHandler/DB.php';
					$dtb = new DTB();

					$result = $dtb->processQuery("select * from member;");

					if ($result->num_rows>0)
					{
						echo "<h5 class='bold text-center'>Member List</h5><br>";
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

					$dtb->close();
		    	?>
		    </p>
		  </div>

		</div>
		</div>

		<br><br>

	<?php require('../footer.php');?>

	
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>