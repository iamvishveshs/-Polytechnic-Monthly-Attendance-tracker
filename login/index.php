<?php
session_start();
if(isset($_SESSION['role']))
{
	if($_SESSION['role']=="teacher")
    {
        header("Location:../teacher");
    }
    else if($_SESSION['role']=="admin")
    {
        header("Location:../admin");
    }
	else if($_SESSION['role']=="CteacherId")
	{
		header("Location:../classTeacher");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login - Attendance management system</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="loginProcess.php">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<br>
					<br>
					<div class="py-4"></div>
					<span class="login100-form-title p-b-48">
						<img src="./images/gph.png" width="100" height="100">
					</span>
					<br>
					<br><?php
						if(isset($_REQUEST['alert']))
						{
							?>
					<div class="py-4 alert">
						<?php
							echo $_REQUEST['alert'];
						?>
					</div>
					<br><br>
					<?php
						}
					?>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
					
					<div class="text-center"><p>
						<a href="./reset-password.php" class="text-link">Forgot Password?</a>
					</p></div>
					<br>
					<br><br>
					<br>
				</form>
			</div>
		</div>
	</div>
	
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>