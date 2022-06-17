<?php
if(isset($_POST['login'])){
	require 'dbh.inc.php';
    // require '../database_connection.php';

	$mailuid = $_POST['username'];
	$password = $_POST['password'];

	if(empty($mailuid) || empty($password) ){
	echo '<script>alert("Empty Fields");
	window.open("../UserLogin.php?error=emptyfield","_self");</script>';
	//header("location: ../login.php?error=emptyfields");
	exit();
	}
	else {
		$sql = "SELECT * FROM users WHERE uname=? OR email=?;";
		$stmt = mysqli_stmt_init($con);
		if (!mysqli_stmt_prepare($stmt,$sql)){
			header("location: ../UserLogin.php?error=sqlerror");
		exit();
		}
		else {
			mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdcheck = password_verify($password, $row['password']);
				if ($pwdcheck == false) {
					echo '<script>alert("Wrong Password");
					window.open("../UserLogin.php?error=wrongpassword","_self");</script>';
					exit();
				}
				elseif ($pwdcheck == true) {
					session_start();
					$_SESSION['userid'] = $row['uid'];
					$_SESSION['user'] = strtoupper($row['uname']);
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];

                    $sub_query = "INSERT INTO login_details(uid, last_activity) VALUES ('".$row['uid']."',now())";
			        $statement = $con->prepare($sub_query);
			        $statement->execute();
			        $_SESSION['login_details_id'] = $con->insert_id;

					$login_msg = "Welcome ".$_SESSION['user'];
					echo '<script>alert("'.$login_msg.'");
						window.open("../../index.php?login=success?set=1","_self");
						</script>';
					// $_SESSION['sett'] = $set;
					exit();

				}
			}
			else {
				echo '<script>alert("No User Found");
					window.open("../UserLogin.php?error=wrongpassword","_self");
				</script>';
				exit();
			}
		}
	}
}
?>