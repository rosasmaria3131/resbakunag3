<!DOCTYPE html>
<html>
	<head>
	<title>ADD USER</title>
	<meta name="viewport" content="device-width,initial-scale=.70">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
	</head>
	<body >
		<div id="main">
			<div id="header">

				<div id="navigator">
					<div id="logo">
					<b><a href=ScheduleAdmin.php class="header"><img src="css/resbakuna_2-removebg-preview.png"></a></b>
					</div>
						<div id="nav">

						<b>
						<h6>
										<a href="ScheduleAdmin.php"><i class="fas fa-calendar" style="color:#2e2e2e"></i>&nbsp;SCHEDULES</a>&nbsp;&nbsp;&nbsp;
										<a href="Register.php"  class="active"><i class="fas fa-users" style="color:black"></i>&nbsp;ADD USER</a>&nbsp;&nbsp;&nbsp;
										<a href="Home.php"><i class="fas fa-sign-out-alt" style="color:#2e2e2e"></i>&nbsp;LOG OUT</a>&nbsp;&nbsp;&nbsp;
						</b>
						</h6>
						</div>	
				</div>
				<br>
				<br>
				<br>
			</div>
			<div id="container">
				<div  id="form" class="form-center">

						<br>

						<form method="POST" action="">
						<h1 class="vaccine"> &nbsp;REGISTRATION&nbsp;<span class="changecolor">FORM</span></h1>
										<label for ="fullname">Full Name</label><br>
										<input type="text" placeholder="Full Name" id="fullname" name="fname" size="50" required="required"><br>


										<label for ="rusername">Username </label><br>
										<input type="text" placeholder="Username"  id="rusername" name="username" size="50" required="required"><br>

										<label for ="rpassword">Password</label><br>
										<input type="password" placeholder="Password" id="rpassword" name="password" size="50" required="required"><br>

										<p align="center">
										<button type="submit" name="adduser" class="blue-buttons">Add User</button>
        								<?php

         								include ('dbconnect.php');
            							if(isset($_POST['adduser']))
              								{
									                $fname=$_POST['fname'];
									                $username=$_POST['username'];
									                $password=$_POST['password'];


							                if ($fname=="" or $username=="" or $password=="") 
							                  {
							                    pass;
							                  }
							                else
							                {
							                  $sql="INSERT INTO tblusers (Full_Name,Username,Password) VALUES('$fname','$username','$password')";
							                  if($conn->query($sql)==TRUE)
							                    {
																				?>
																					<script type="text/javascript">
																						alert("User Added.");
																						window.location = "Register.php";
																					</script>
																				<?php
							                    }
            								}
            								}
        								mysqli_close($conn);
        								?>

										</p>			
								</form>	

				</div>
			</div>
		<div id="footer">

			<div class="center">
				<b>Copyright 2021-2022 by TeamResbakuna. All Rights Reserved.</b>
			</div>


		</div>

		</div>

	</body>
</html>