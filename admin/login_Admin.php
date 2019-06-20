<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images/ashok-stambh-logo-png-file.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/css/util.css">
	<link rel="stylesheet" type="text/css" href="loginCSSnJS/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('loginCSSnJS/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="login_Admin_process.php" method="post">
					<span class="login100-form-title p-b-49">
						Admin Login
					</span>
					<?php
						 if(@$_GET['Empty']==true)
						 {
						 ?>
					<div class="alart-light text-danger text-center" id='msg'>
						 <?php echo $_GET['Empty'] ?>
					</div>
					<?php
						 }
						 ?>

					<?php
						 if(@$_GET['Invalid']==true)
						 {
						 ?>
					<div class="alart-light text-danger text-center" id='msg'>
						 <?php echo $_GET['Invalid'] ?>
					</div>
					<?php
						 }
						 ?>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<!-- <span class="label-input100">Username</span> -->
						<input class="input100" type="text" name="username" placeholder="Username...">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<!-- <span class="label-input100">Password</span> -->
						<input class="input100" type="password" name="password" placeholder="Password...">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						<a href="forgot_password.php">
							Forgot password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name='login'>
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="loginCSSnJS/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="loginCSSnJS/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="loginCSSnJS/vendor/bootstrap/js/popper.js"></script>
	<script src="loginCSSnJS/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="loginCSSnJS/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="loginCSSnJS/vendor/daterangepicker/moment.min.js"></script>
	<script src="loginCSSnJS/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="loginCSSnJS/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="loginCSSnJS/js/main.js"></script>
	<script type="text/javascript">
	setTimeout(function(){
		 $('#msg').remove();
	 }, 4000);
	</script>

</body>
</html>
