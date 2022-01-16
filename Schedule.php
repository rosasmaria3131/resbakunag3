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
					<b><a href=Home.php class="header"><img src="css/resbakuna_2-removebg-preview.png"></a></b>
					</div>
						<div id="nav">
							<h6>
									<b>
										<a href="Home.php" ><i class="fas fa-home" style="color:#2e2e2e"></i>&nbsp; HOME</a>&nbsp;&nbsp;&nbsp;
										<a href="Schedule.php" class="active"><i class="fas fa-calendar" style="color:black"></i>&nbsp;SCHEDULES</a>&nbsp;&nbsp;&nbsp;
										<a href="LogIn.php"><i class="fas fa-sign-in-alt" style="color:#2e2e2e"></i>&nbsp;LOG IN</a>&nbsp;&nbsp;&nbsp;
									</b>
							</h6>
						</div>	
				</div>
				<br>
				<br>
				<br>
				<br>
				<div id="form" class="form-center">

							<h1 class="vaccine"> &nbsp;SCHE<span class="changecolor">DULES</span></h1>

							<td>
								<table>
									<tr>

												<table id="datas" class="stroll">
													<tr>
		            									<th id="main">Schedule <br>Number</th><th id="main">Name</th><th id="main">Address</th><th id="main">Gender</th><th id="main">Schedule <br>YYYY/MM/DD</th><th id="main">Vaccine</th><th id="main">Dose</th>
		            								</tr>
		            								<tr id="main">

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
												                <td><?php echo $row['Schedule'];?> </td>   
																<td><?php echo $row['Vaccine'];?> </td>  
																<td><?php echo $row['Dose'];?> </td> 

					       							 </tr>


					            						<?php
					            					}

?>
		            							</table>



				</div>
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