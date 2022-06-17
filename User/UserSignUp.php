<!DOCTYPE html>
<html lang="en">
<head>
	<title>BooksHelp | SignUp</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="../Images/PageIcons/signup.png"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<script>


		function userAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_availability.php",
		data:'user='+$("#user").val(),
		type: "POST",
		success:function(data){
		$("#user-availability-status1").html(data);
		$("#loaderIcon").hide();
		},
		error:function (){}
		});
		}

		function emailAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_availability.php",
		data:'mail='+$("#email").val(),
		type: "POST",
		success:function(data){
		$("#email-availability-status1").html(data);
		$("#loaderIcon").hide();
		},
		error:function (){}
		});
		}

		function checkOTP() {
		$("#loaderIcon").show();
		jQuery.ajax({
		url: "check_availability.php",
		data:'otp='+$("#otp").val(),
		type: "POST",
		success:function(data){
		$("#otp-availability-status1").html(data);
		$("#loaderIcon").hide();
		},
		error:function (){}
		});
		}

	</script>
</head>
<body>

<main>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="includes/signup.inc.php" method="post">
					<span class="login100-form-title">
						Sign Up
					</span>

                    <div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="name" placeholder="Enter Full Name">
					
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="uname" placeholder="Create Username"  id="user"  onblur="userAvailability()">
						<span id="user-availability-status1" style="font-size: 12px"></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					



					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" name="email" placeholder="Email conataining @bvmengineering.ac.in" id="email" onblur="emailAvailability()">
						<span id="email-availability-status1" style="font-size: 12px"></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="otp" placeholder="Wait for OTP in email" id="otp" onblur="checkOTP()">
						<span id="otp-availability-status1" style="font-size: 12px"></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-key" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="pwd" placeholder="Create Strong Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="password" name="pwd-repeat" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="signup-submit" id="signup-submit">
							Signup
						</button>

					</div>

			
					<br>
					<div class="text-center">
						<a class="text2" href="UserLogin.php">
							Already have an account? Login Here.
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
</main>

</body>
</html>