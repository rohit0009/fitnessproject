<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


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
	<div class="container">
		<?php require('header-admin.php'); ?>


		<br>
		<div class="jumbotron" style="margin-left: 50px;margin-right: 50px;">

		<ul class="nav nav-tabs">
		  <li class="active"><a href="#Courses" data-toggle="tab" aria-expanded="false">Courses</a></li>
		  <li class=""><a href="#Trainers" data-toggle="tab" aria-expanded="true">Trainers</a></li>
		  <li class=""><a href="#Members" data-toggle="tab" aria-expanded="true">Members</a></li>
		  <li class="dropdown">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
		      Dropdown <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
		      <li><a href="#dropdown1" data-toggle="tab">Action</a></li>
		      <li class="divider"></li>
		      <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
		    </ul>
		  </li>
		</ul>
		<div id="myTabContent" class="tab-content">
		  <div class="tab-pane fade" id="Courses">
		    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
		  </div>
		  <div class="tab-pane fade active in" id="Trainers">
		    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.</p>
		  </div>
		  <div class="tab-pane fade" id="Members">
		    <p>
		    	<?php
		    		require '../DBHandler/DB.php';
					$dtb = new DTB();

					$result = $dtb->processQuery("select * from member;");

					if ($result->num_rows>0)
					{
						while ($row = $result->fetch_assoc())
						{
							echo "<table>
									<tr>
										<th>ID</th>
										<th>First name</th>
										<th>Last name</th>
										<th>Gender</th>
										<th>Address</th>
										<th>Contact Number</th>
										<th>Email</th>
										<th>Username</th>
									</tr>
									<tr>
										<td>" .$row[cust_id] ."</td>
										<td>" .$row[f_name] ."</td>
										<td>" .$row[l_name] ."</td>
										<td>" .$row[gender] ."</td>
										<td>" .$row[address] ."</td>
										<td>" .$row[contact_no] ."</td>
										<td>" .$row[email] ."</td>
										<td>" .$row[username] ."</td>
									</tr>
								</table>";			//Or use function display($obj)
						}
					}
					else
						echo "Database is empty";

					$dtb->close();
		    	?>
		    </p>
		  </div>
		  <div class="tab-pane fade" id="dropdown1">
		    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
		  </div>
		  <div class="tab-pane fade" id="dropdown2">
		    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
		  </div>
		</div>

		</div><br><br>

	<?php require '../footer.php'?>

	
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>