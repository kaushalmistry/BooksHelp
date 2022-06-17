<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../mailer/vendor/autoload.php';
require '../mailer/credentials.php';

require_once("includes/dbh.inc.php");
if(!empty($_POST["user"])) {
	$user= $_POST["user"];


	$badword=$_POST["user"];
	$answer=hate_bad($badword);

	$result =mysqli_query($con,"SELECT uname FROM users WHERE uname='$user'");
	$count=mysqli_num_rows($result);


	if($answer == "yes")
	{
		echo "<span style='color:red'>  Username contains inappropriate words  .</span>";
	 	echo "<script>$('#signup-submit').prop('disabled',true);</script>";
	} 
	else if($count>0)
	{
		echo "<span style='color:red'>Username already exists .</span>";
	 	echo "<script>$('#signup-submit').prop('disabled',true);</script>";
	}
	else{
		echo "<span style='color:green'> Username available for Registration .</span>";
	 	echo "<script>$('#signup-submit').prop('disabled',false);</script>";
	}
}
if(!empty($_POST["mail"])) {

	$email= $_POST["mail"];

	$check = "@bvmengineering.ac.in";

		$result =mysqli_query($con,"SELECT email FROM users WHERE email='$email'");
		$count=mysqli_num_rows($result);

	
	if(strpos($email, $check) == false){
		echo "<span style='color:red'> You do not belong to the institute. </span>";
		echo "<script>$('#signup-submit').prop('disabled',true);</script>";
	}
	else if($count>0)
	{
		echo "<span style='color:red'> User has already registered. </span>";
		echo "<script>$('#signup-submit').prop('disabled',true);</script>";
	} 
	else
	{		
		echo "<span style='color:green'> Email available for Registration .</span>";
	 	echo "<script>$('#signup-submit').prop('disabled',false);</script>";

	    $random = rand(100000,999999);
	    setcookie("code", $random);


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

		    $body = 'Here is your One Time Password to verify your email address.<br> OTP : <b>'.$random.'</b>';
		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'OTP for Registration';
		    $mail->Body    = $body;
		    $mail->AltBody = strip_tags($body);

		    $mail->send();
		    echo "<span style='color:green'> Check your email for OTP.</span>";
	 		echo "<script>$('#signup-submit').prop('disabled',false);</script>";
		} catch (Exception $e) {
		    echo "<span style='color:green'> OTP could not be sent. Please re-enter your email</span>";
	 		echo "<script>$('#signup-submit').prop('disabled',false);</script>";
		}


	}
}


if(!empty($_POST["otp"])) {
	$otp = $_POST["otp"];
	$code = $_COOKIE['code'];
	if($otp == $code){
		echo "<span style='color:green'> Email Verified. </span>";
	 	echo "<script>$('#signup-submit').prop('disabled',false);</script>";		
	}else{
		echo "<span style='color:red'> Wrong OTP. </span>";
		echo "<script>$('#signup-submit').prop('disabled',true);</script>";
	}
}

function hate_bad($str)
{  $bad = file('list_of_bad_words.txt',FILE_IGNORE_NEW_LINES);


    for($i=0; $i < sizeof($bad); $i++)
    { 
    $count=0;
$store=0; 
while(!($store > strlen($str)-1)){

$count=$store;
$store=$count+1;
   $piece='';
  
for($j=0; $j < strlen($bad[$i]); $j++)
{
if($count > strlen($str)-1)
{
    break;
}
$piece=$piece.$str[$count];

$count =$count+1;


}  
if(strlen($piece) > strlen($bad[$i]) ){

    continue;
   }
      
     
            if($bad[$i] == $piece)
            {
             return "yes";
            }
        

}
    }

    return "no";
}
?>