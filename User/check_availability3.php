<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	require '../mailer/vendor/autoload.php';
	require '../mailer/credentials.php';

	require_once("includes/dbh.inc.php");

	$email = $_COOKIE['mail'];
	if(!empty($email)) {

	  
		$result =mysqli_query($con,"SELECT email FROM users WHERE email='".$email."'");
		$count=mysqli_num_rows($result);
		

		if($count>0)
		{

			$random = rand(100000,999999);
    		setcookie("cod", $random);
			// Sending OTP via email
	    
			$mail = new PHPMailer(true);

			try {
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = $Mail_User;                     // SMTP username
			    $mail->Password   = $Mail_Pass;                               // SMTP password
			    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			    //Recipients
			    $mail->setFrom($Mail_User, 'BooksHelp');

			    $mail->addAddress($email);     // Add a recipient

			    $body = 'Here is your One Time Password to reset your password.
			    		<br> Kindly do not share it with others.
			    		<br> OTP : <b>'.$random.'</b>
			    		<br> Regards,
			    		<br> BooksHelp Team';
			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Reset Password';
			    $mail->Body    = $body;
			    $mail->AltBody = strip_tags($body);

			    $mail->send();
			    echo "<span style='color:green'> Check your email for OTP.</span>";
		 		echo "<script>$('#verify-button').prop('disabled',false);</script>";
			} catch (Exception $e) {
			    echo "<span style='color:green'> OTP could not be sent. Please re-enter your email</span>";
		 		echo "<script>$('#verify-button').prop('disabled',true);</script>";
			}

		
		}

		else{
			echo "<span style='color:red'> No User found with this email. </span>";
			echo "<script>$('#verify-button').prop('disabled',true);</script>";
		}
	}
?>