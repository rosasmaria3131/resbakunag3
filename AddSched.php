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
			<h1 class="vaccine"> &nbsp;ADD <span class="changecolor">SCHEDULES</span></h1>
		<table>

			<tr>
				<td>
					                <div id="form">
					                     <table id="main" class="scroll">
					                     		<tr id="main">
					                    			<th>NEW SCHEDULE</th>
					                     		</tr>
					                     		<tr>

					                      					<td class="form" >
															<form method="POST" class="form" action="">	
									                      		<label for ="name">Name</label><br>
																<input type="text" name="name" size="50"   required="required" placeholder="FIRST NAME M.I LASTNAME"><br>
									                      		<label for ="address">Address (Purok/Street, Barangay, Municipality, City)</label><br>
																<input type="text"  name="address" size="50"  required="required" placeholder="PUROK/STREET,BARANGAY, MUNICIPALITY, CITY"><br>
									                      		<label for ="gender">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for ="contact_number">Contact Number</label><br>
									                      		<select name="gender" required="required">
									                      			<option value="Male">Male</option>
									                      			<option value="Female">Female</option>
									                      		</select>&nbsp;&nbsp;
									                      		
																<input type="tel"  name="contact_number" size="25"  required="required" pattern="[0-9]{11}"><br>
									                      		<label for ="schedule">Schedule</label><br>
																<input type="date"  name="schedule" size="50" required="required"><br>
									                      		<label for ="vaccine">Vaccine</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for ="dose">Dose</label><br>


									                      		<select id="vaccine" name="vaccine" ><br>
									                      			<option value="Sinovac" >Sinovac</option>
									                      			<option value="AstraZeneca" >AstraZeneca</option>
									                      			<option value="Pfizer" >Pfizer </option>
									                      			<option value="Moderna" >Moderna</option>
									                      			<option value="JNJ" >JNJ</option>
									                      		</select>


									                      		<select id="dose" name="dose">
									                      			<option value="First" > First</option>
									                      			<option value="Second" > Second</option>
									                      			<option value="Booster" > Booster</option>
									                      		</select><br><br>

																<button type="submit" name="addsched" class="blue-buttons">Add Schedule</button>&nbsp;&nbsp;
																<button  name="cancel" onclick="window.location.href='ScheduleAdmin.php';" class="cancel">Cancel</button>


	
						<?php


										
												include( 'dbconnect.php');
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

	              								if(isset($_POST['addsched']))
	            									{
														if(!$conn)
														{
															die ("Connection failed".mysqli_connect_error());
														}

										                else
										                	{

				                								$name=$_POST['name'];
				                								$address=$_POST['address'];
				                								$gender=$_POST['gender'];
				                								$contact_number=$_POST['contact_number'];
				                								$schedule=$_POST['schedule'];
				                								$vaccine=$_POST['vaccine'];
				                								$dose=$_POST['dose'];

	                       										$sql = "INSERT INTO  tblsched SET Name='$name',Address='$address', Gender='$gender', Contact_Number='$contact_number', Schedule='$schedule', Vaccine='$vaccine', Dose='$dose'";

																	if(mysqli_query($conn, $sql))
																			{
																				?>
																					<script type="text/javascript">
																						alert("Successfully Added.");
																						window.location = "ScheduleAdmin.php";
																					</script>
																				<?php
																			}
																	else
																			{
																				echo "Error adding record: ".mysqli_error($conn);
																			}
																
	                        								}         
											        }  
						?>
																</div>
																</form>	


														</td>

													</tr>
												</table>
				</td>
				<td>
					<div id="scroll">
												<table id="datas">
													<tr id="datas">
		            									<th id="main">Schedule <br>Number</th><th id="main">Name</th><th id="main">Address</th><th id="main">Gender</th><th id="main">Contact<br>Number</th><th id="main">Schedule<br>YYYY/MM/DD</th><th id="main">Vaccine</th><th id="main">Dose</th><th width="120px"></th>
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
			            										<button  class="btn-delete" type="submit" name="delete"><i class="fas fa-trash" style="color:black"></i></button>

			            									</form>
			            										</td>  
					       							 </tr>
					            						<?php

					                						}
					           							?>


		            							</table>
		            						</div>
				</td>
			</tr>
		</table>
	</div>


	</body>

</html>