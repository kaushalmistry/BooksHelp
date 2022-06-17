<?php

if(isset($_POST['signup-submit'])){

	require 'dbh.inc.php';
	$name = $_POST['name'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$password = $_POST['pwd'];
	$passwordrepeat = $_POST['pwd-repeat'];
    $photo="Images/UserProfile/avtar.jpg";
	if(empty($name) || empty($uname) || empty($email) || empty($password) || empty($passwordrepeat)){
		header("location: ../UserSignUp.php?error=emptyfields&uid=".$username."&email=".$email);
	?>
		<script>alert("Empty Fields");</script>
	<?php
		exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("location: ../UserSignUp.php?error=invalidemail&uid");
			exit();
	}
	elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		header("location: ../UserSignUp.php?error=invalidemail&uid=".$username);
		exit();
	}
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
		header("location: ../UserSignUp.php?error=invaliduid&mail=".$email);
		exit();
	}
	elseif ($password !== $passwordrepeat) {
		header("location: ../UserSignUp.php?error=passwordcheck&uid=".$username."&email=".$email);
		exit();
	}
	else {

		$sql = "SELECT uname FROM users WHERE uname=?";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("location: ../UserSignUp.php?error=sqlerror");
		exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$uname);
			mysqli_stmt_execute($stmt); //run this information in Database
			mysqli_stmt_store_result($stmt);
			$resultcheck = mysqli_stmt_num_rows($stmt);
			
			if ($resultcheck > 0) {

				header("location: ../UserSignUp.php?error=usernametaken=".$uname);
			exit();
			}
			
			
			else{
				$sql = "INSERT INTO `users`(`uname`,`name`, `email`, `password`,`profile_pic`) VALUES (?,?,?,?,?)"; 
				$stmt = mysqli_stmt_init($con);
				if (!mysqli_stmt_prepare($stmt,$sql)) {
				header("location: ../UserSignUp.php?error=sqlerror");
				exit();
			}
			else {
                
				$hasedpwd = password_hash($password, PASSWORD_DEFAULT);
				mysqli_stmt_bind_param($stmt,"sssss",$uname,$name,$email,$hasedpwd,$photo);
				mysqli_stmt_execute($stmt); //run this information in Database

				// $sqli = "INSERT INTO login(user_id,username) VALUES(LAST_INSERT_ID(),'$uiduser')";
				// mysqli_query($con,$sqli);
				// $sql1="select * from user where uidusers= '".$username."'";
				// $result1 = mysqli_query($con, $sql1);
				// $row1=mysqli_fetch_assoc($result1);
				// $_SESSION['userid'] = $row1['uid'];
				// $_SESSION['user'] = $username;
    			// $_SESSION['email'] = $email;
				echo '<script>alert("Thank You for signing up!");
					window.open("../UserLogin.php?signup=success","_self");
				</script>';

				exit();
			}


			}
		}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($con);

}
else {
	header("location: ../UserSignUp.php");
	exit();
}
?>