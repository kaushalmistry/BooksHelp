<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>BooksHelp | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="../Images/PageIcons/login.png"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

    
    <style>
    .field-icon {
	float: right;
	margin-left: -10px;
	margin-right: 10px;
	margin-top: -33px;
	position: relative;
	z-index: 2;
	}

	.login100-social-item {
	  font-size: 25px;
	  color: #fff;

	  display: -webkit-box;
	  display: -webkit-flex;
	  display: -moz-box;
	  display: -ms-flexbox;
	  display: flex;
	  justify-content: center;
	  align-items: center;
	  width: 150px;
	  height: 50px;
	  border-radius: 5%;
	  margin: 5px;
	}

	.login100-social-item:hover {
	  color: #fff;
	  background-color: #333333;
	}

	.bg1{
		background-color: #3b5998;
	}
    </style>


	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
			url: "check_availability2.php",
			data:'user='+$("#uname_or_email").val(),
			type: "POST",
			success:function(data){
			$("#user-availability-status1").html(data);
			$("#loaderIcon").hide();
			},
			error:function (){}
			});
		}
	</script>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="includes/login.inc.php" method="post">
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Email/Username" id="uname_or_email" onblur="userAvailability()" required>
						<span id="user-availability-status1" style="font-size: 12px"></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" id="password-field" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password m-l-220"></span>

					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login" value="Login" id="login-submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="ForgetPassword.php">
							Username / Password
						</a>
					</div>
                    
                    <br>
                    <div class="text-center p-t-90">
						<a class="txt2" href="UserSignUp.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>

				
				</form>
					
				
			</div>
		</div>
	</div>	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<!-- <script src="js/main.js"></script> -->
    	<script>		
		$(".toggle-password").click(function() {
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
			input.attr("type", "text");
			} else {
			input.attr("type", "password");
			}
		});
	</script>

</body>
</html>