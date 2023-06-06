<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>RESET password</title>
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
				<form class="login100-form validate-form" method="POST" action="reset-process.php">
					<span class="login100-form-title p-b-26">
						Reset Password
					</span>
					<br>
					<br>
					<div class="py-4"></div>
					<span class="login100-form-title p-b-48">
						<img src="./images/gph.png" width="100" height="100">
					</span>
					<br>
					<br>
					<div class="py-4 alert">Enter your account's email</div><br><br>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="sendOtp">
								Send OTP
							</button>
						</div>
					</div>
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