<!DOCTYPE html>
<html>
	<head>
	<title>SCHEDULES</title>
	<!--meta name="viewport" content="device-width,initial-scale=.70"!-->
	<link rel="stylesheet" href="css/style.css" media="only screen">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
	</head>
	<body>
				<div id="navigator">

					<div id="logo">
					<b><a href=ScheduleAdmin.php class="header"><img src="css/resbakuna_2-removebg-preview.png"></a></b>
					</div>
						<div id="nav">
							<h6>
									<b>
										<a href="ScheduleAdmin.php" class="active"><i class="fas fa-calendar" style="color:black"></i>&nbsp;SCHEDULES</a>&nbsp;&nbsp;&nbsp;
										<a href="Register.php"><i class="fas fa-users" style="color:#2e2e2e"></i>&nbsp;ADD USER</a>&nbsp;&nbsp;&nbsp;
										<a href="Home.php"><i class="fas fa-sign-out-alt" style="color:#2e2e2e"></i>&nbsp;LOG OUT</a>&nbsp;&nbsp;&nbsp;
									</b>
							</h6>
						</div>	
				</div>
				<br>
				<br>
				<br>
				<br>
				<div id="form">

							<h1 class="vaccine">&nbsp;SCHE<span class="changecolor">DULES</span></h1>

								<table>
									<tr>
										<td class="tdtd">
											<form action="AddSched.php">
					       							 	<button class="btn-addsched" type="submit" name="addsched">Add Schedule</button><br><br>
					       					</form>

												<table id="datas">
													<tr>
		            									<th id="main">Schedule <br>Number</th><th id="main">Name</th><th id="main">Address</th><th id="main">Gender</th><th id="main">Contact<br>Number</th><th id="main">Schedule <br>YYYY/MM/DD</th><th id="main">Vaccine</th><th id="main">Dose</th><th width="120px"></th>
		            								</tr>
		            								<tr id="datas">

					           							 <?php
												             	include( 'dbconnect.php');
												             	$sql="SELECT * FROM tblsched ORDER BY Schedule ASC";
												             	$result=mysqli_query($conn,$sql);

					            								while($row=$result->fetch_assoc())
					                						{
					            						 ?>

												                <td><?php echo $row['SchedNumber'];?> </td> 
												                <td><?php echo $row['Name'];?> </td> 
												                <td><?php echo $row['Address'];?> </td> 
												                <td><?php echo $row['Gender'];?> </td>     
												                <td>0<?php echo $row['Contact_Number'];?> </td>		       
												                <td><?php echo $row['Schedule'];?> </td>   
																<td><?php echo $row['Vaccine'];?> </td>  
																<td><?php echo $row['Dose'];?> </td> 

			            										<td class="form">
			            										<form  class="form" action="Edit.php?id=<?php echo $row['SchedNumber']?>" method="POST">
			            										<button  class="btn-edit" type="submit" name="edit"><i class="fas fa-edit" style="color:black"></i></button>

			            										</form>
			            										<form class="form"  action="ScheduleAdmin.php?id=<?php echo $row['SchedNumber']?> "method="POST">
			            										<button  class="btn-delete" type="submit" name="delete"><i class="fas fa-trash" style="color:black"></i></button>
			            										</form>
			            										</td>  
					       							</tr>


					            						<?php

					                						}
																if(isset($_POST['delete']))
																{
								 									if(!$conn)
																		{
																			die ("Connection failed".mysqli_connect_error());
																		}
																	else
																		{
																			$id=$_GET['id'];
																			$sql="DELETE FROM tblsched WHERE SchedNumber='$id'";
																		
																			if(mysqli_query($conn, $sql))
																				{
														?>
																					<script type="text/javascript">
																						alert("Successfully Deleted.");
																						window.location = "ScheduleAdmin.php";
																					</script>	
														<?php
																				}
																			else
																				{
																					echo "Error updating record: ".mysqli_error($conn);
																				}	
							
																		}

															}

					           							?>



		            							</table>
											</td>
		        					</tr>

								</table>

				</div>
			<br>
			<br>
			<br>
		<div id="footer">
			<div class="center">
				<b>Copyright 2021-2022 by TeamResbakuna. All Rights Reserved.</b>
			</div>

		</div>
	</div>

	</body>

</html>