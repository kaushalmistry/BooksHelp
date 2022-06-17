<?php 
require_once("includes/dbh.inc.php");
session_start();
if(isset($_POST["user"])) {
	$email= $_POST["user"];

  
	$result = mysqli_query($con,"SELECT email,uname FROM users WHERE email='".$email."' OR uname='".$email."'");
	$count = mysqli_num_rows($result);
	

	if($count>0)
	{
		echo "<span style='color:green'> You are ready to go!! </span>";
		echo "<script>$('#login-submit').prop('disabled',false);</script>";
	}

	else{
		echo "<span style='color:red'> No User found with this data. </span>";
		echo "<script>$('#login-submit').prop('disabled',true);</script>";
	}
}

elseif (isset($_POST['username'])){
	$uname = $_POST['username'];

	$check = mysqli_query($con,"SELECT uname FROM users WHERE uname = '$uname' AND uid!='".$_SESSION['userid']."'");
	$count = mysqli_num_rows($check);

	if($count>0)
	{
		echo "<span style='color:red'> Username has already taken by another user. </span>";
		echo "<script>$('#update-submit').prop('disabled',true);</script>";
	}
	else{
		echo "<span style='color:green'> Username is available!! </span>";
		echo "<script>$('#update-submit').prop('disabled',false);</script>";
	}
}