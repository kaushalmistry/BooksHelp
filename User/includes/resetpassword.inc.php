<?php
	require 'dbh.inc.php';

	$email = $_COOKIE['mail'];
	$password = $_POST['passwd'];
	$hasedpwd = password_hash($password, PASSWORD_DEFAULT);

	$sql = "UPDATE users SET password = ? WHERE email = ?";
	$stmt = mysqli_stmt_init($con);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		echo '<script>alert("Something went wrong! Please try again later.");
			window.open("../ForgetPassword.php?error=sqlerror","_self");
		</script>';
	}else{
		mysqli_stmt_bind_param($stmt,"ss",$hasedpwd,$email);	
		mysqli_stmt_execute($stmt);
		echo '<script>alert("Password Updated Successfully");	
			window.open("../UserLogin.php?update=success","_self");
		</script>';
	} 

	mysqli_stmt_close($stmt);
?>