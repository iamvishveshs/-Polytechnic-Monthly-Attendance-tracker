<?php
session_start();
require "./db.php";
if(isset($_POST['checkOtp']))
{

}
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
						Reset Password OTp
					</span>
					<br>
					<br>
					<div class="py-4"></div>
					<span class="login100-form-title p-b-48">
						<img src="./images/gph.png" width="100" height="100">
					</span>
					<br>
					<br>
					<div class="py-4 alert">Enter OTP</div><br><br>
                    
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="otp">
						<span class="focus-input100" data-placeholder="otp"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="checkOtp">
								Submit OTP
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