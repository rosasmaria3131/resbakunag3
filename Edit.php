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

					<h1 class="vaccine"> &nbsp;EDIT <span class="changecolor">SCHEDULES</span></h1>
				<table>


					<tr>
						<td>

						<?php

								require ('dbconnect.php');

									if(isset($_POST['edit']))
										{
						                    $id=$_GET['id'];
						                    $sql="Select * from tblsched where SchedNumber='$id'";
						                    $result=mysqli_query($conn,$sql);
					    ?>

					               			<div id="form">
					                     	<table id="main">
					                     		<tr id="main">
					                    			<th>Schedule Number : <?php echo $id;?></th>
					                     		</tr>
					                     		<tr>
					    <?php
					                      				while ($row=mysqli_fetch_row($result))
					                      					{

					    ?>
					                      					<td class="form" >
															<form method="POST" class="form" action="">	
									                      		<label for ="name">Name</label><br>
																<input type="text" name="name" size="50"  value="<?php echo $row[1]?>" required="required"><br>
									                      		<label for ="address">Address</label><br>
																<input type="text"  name="address" size="50"  value="<?php echo $row[2]?>" required="required"><br>
									                      		<label for ="gender">Gender</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="contact_number">Contact Number</label><br>

									                      		<select name="gender" required="required">
									                      			<option value="Male" <?php if($row[3]=="Male") echo $row[3]="selected";?>>Male</option>
									                      			<option value="Female" <?php if($row[3]=="Female") echo $row[3]="selected";?>>Female</option>

									                      		</select>&nbsp;&nbsp;

																<input type="tel"  name="contact_number" size="25"  value="0<?php echo $row[4]?>" pattern="[0-9]{11}"><br>
									                      		<label for ="schedule">Schedule</label><br>
																<input type="date"  name="schedule" size="50"  value="<?php echo $row[5]?>" required="required"><br>
									                      		<label for ="vaccine">Vaccine</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for ="dose">Dose</label><br>


									                      		<select id="vaccine" name="vaccine" ><br>
									                      			<option value="Sinovac" <?php if($row[6]=="Sinovac") echo $row[6]="selected";?>>Sinovac</option>
									                      			<option value="AstraZeneca" <?php if($row[6]=="AstraZeneca") echo $row[6]="selected";?>>AstraZeneca</option>
									                      			<option value="Pfizer" <?php if($row[6]=="Pfizer")  echo $row[6]="selected";?>>Pfizer </option>
									                      			<option value="Moderna" <?php if($row[6]=="Moderna") echo $row[6]="selected";?>>Moderna</option>
									                      			<option value="JNJ" <?php if($row[6]=="JNJ") echo $row[6]="selected";?>>JNJ</option>
									                      		</select>


									                      		<select id="dose" name="dose">
									                      			<option value="First" <?php if($row[7]=="First") echo $row[7]="selected";?>> First</option>
									                      			<option value="Second" <?php if($row[7]=="Second") echo $row[7]="selected";?>> Second</option>
									                      			<option value="Booster" <?php if($row[7]=="Booster") echo $row[7]="selected";?>> Booster</option>
									                      		</select><br><br>

																<button type="submit" name="update" class="blue-buttons">Save</button> &nbsp;
																<button type="submit" name="cancel" class="cancel">Cancel</button>
						<?php

					                  					    }
										}
									if (isset($_POST['cancel']))
									{
 										if(!$conn)
										{
											die ("Connection failed".mysqli_connect_error());
										}
										else
										{
											header("location: ScheduleAdmin.php");	
										}
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

	              								if(isset($_POST['update']))
	            									{
														if(!$conn)
														{
															die ("Connection failed".mysqli_connect_error());
														}

										                else
										                	{

				                								$id=$_GET['id'];
				                								$name=$_POST['name'];
				                								$address=$_POST['address'];
				                								$gender=$_POST['gender'];
				                								$contact_number=$_POST['contact_number'];
				                								$schedule=$_POST['schedule'];
				                								$vaccine=$_POST['vaccine'];
				                								$dose=$_POST['dose'];

	                       										$sql = "UPDATE tblsched SET Name='$name', Address='$address', Gender='$gender', Contact_Number='$contact_number', Schedule='$schedule', Vaccine='$vaccine', Dose='$dose' WHERE SchedNumber='$id'";
																	if(mysqli_query($conn, $sql))
																			{
																				?>
																					<script type="text/javascript">
																						alert("Successfully Edited.");
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
																</div>
																</form>

														</td>

													</tr>
												</table>
				</td>
				<td>
					<div  id="scroll">
												<table id="datas">
													<tr id="datas">
		            									<th id="main">Schedule <br>Number</th><th id="main">Name</th><th id="main">Address</th><th id="main">Gender</th><th id="main">Contact<br>Number</th><th id="main">Schedule<br> YYYY/MM/DD</th><th id="main">Vaccine</th><th id="main">Dose</th><th width="120px"></th>
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
			            										<button  class="btn-edit" type="submit" name="edit"><i class="fas fa-edit" style="color:black"></i></button>&nbsp;&nbsp;
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


	</body>

</html>