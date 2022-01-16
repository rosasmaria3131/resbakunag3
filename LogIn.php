<!DOCTYPE html>
<html>
	<head>
	<title>LOG IN</title>
	<meta name="viewport" content="device-width,initial-scale=.70">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
	</head>
	<body >
		<div id="main">
			<div id="header">

				<div id="navigator">
					<div id="logo">
					<b><a href=Home.php class="header"><img src="css/resbakuna_2-removebg-preview.png"></a></b>
					</div>
						<div id="nav">

						<b>
						<h6>
						<a href="Home.php" ><i class="fas fa-home" style="color:#2e2e2e"></i>&nbsp; HOME</a>&nbsp;&nbsp;&nbsp;
						<a href="Schedule.php"><i class="fas fa-calendar" style="color:#2e2e2e"></i>&nbsp;SCHEDULES</a>&nbsp;&nbsp;&nbsp;
						<a href="LogIn.php" class="active"><i class="fas fa-sign-in-alt" style="color:black"></i>&nbsp;LOG IN</a>&nbsp;&nbsp;&nbsp;
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
						<h1 class="vaccine"> &nbsp;LOG&nbsp;<span class="changecolor">IN</span></h1>
										<label for ="username">Username </label><br>
										<input type="text"  id="username" name="myusername" placeholder="Username" size="50" required="required"><br>
										<label for ="password">Password </label><br>
										<input type="password" id="password" name="mypass" placeholder="Password"  size="50"  required="required"><br>
										<p align="center">

										<button type="submit" name="login" class="blue-buttons">Login</button>

										<?php
										include ('dbconnect.php');
										if(isset($_POST['login']))
							    		{
								            $user=$_POST['myusername'];
								            $pass=$_POST['mypass'];


								            if($user=="" or $pass=="")
								            {
								            	pass;
								            }
								            else
								            {
									           	$user=stripcslashes($user);
									            $pass=stripcslashes($pass);
									            $user=mysqli_real_escape_string($conn,$user);
									            $pass=mysqli_real_escape_string($conn,$pass);

		       									$sql="SELECT * FROM tblusers WHERE Username='$user' and Password='$pass'";
												$result=mysqli_query($conn,$sql);
												$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
												$count=mysqli_num_rows($result);

													if($count==1)
													{


															header("Location: ScheduleAdmin.php");
													}
													else
													{
														echo '<br> Invalid Username or Password';
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