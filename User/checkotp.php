<?php 
require_once("includes/dbh.inc.php");

if(!empty($_POST["otp"])) {
	$otp = $_POST["otp"];
	$code = $_COOKIE['cod'];
	if($otp == $code){
		echo "<span style='color:green'> Email Verified. </span>";
	 	echo "<script>$('#reset').prop('disabled',false);</script>";		
	}else{
		echo "<span style='color:red'> Wrong OTP. </span>";
		echo "<script>$('#reset').prop('disabled',true);</script>";
	}
}
?>