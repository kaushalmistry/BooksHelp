<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	require '../mailer/vendor/autoload.php';
	require '../mailer/credentials.php';

	session_start();
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'final_bookshelp');

	$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	if(!$conn){
	die("Connection Failed".mysqli_connect_error());
	}
	$book_id = $_POST['book_id'];
	$rec_id = $_POST['rec_id'];
	$owner_id = $_SESSION['userid'];
	$book_name = $_POST['book_name'];
	// echo $book_id."<br>";
	// echo $owner_id."<br>";
	// echo $rec_id."<br>";
	// echo $book_name;

	$sql = "UPDATE books SET want_to_buy=0, interested_user=Null WHERE bid = '$book_id'";
	if ($conn->query($sql) === TRUE){
		// Find details of owner of the book
        $find = "SELECT uname,email FROM users WHERE uid = '".$owner_id."'";
        $res = $conn->query($find);
        if ($res->num_rows > 0) {
          while($row = $res->fetch_assoc()) {
            $owner_uname = $row['uname'];
            $owner_email = $row['email'];
          }
        }


      	// Find details of Interested user in the book
        $find = "SELECT uname,email FROM users WHERE uid = '".$rec_id."'";
        $res = $conn->query($find);
        if ($res->num_rows > 0) {
          while($row = $res->fetch_assoc()) {
            $rec_uname = $row['uname'];
            $rec_email = $row['email'];
          }
        }


        // Send mail to the owner informing someone is interested in his book
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

		    $mail->addAddress($rec_email,$rec_uname);     // Add a recipient

		    $body = 'Dear <b>'.$rec_uname.'</b>,
			    		<br> The request for your book has been declined by the owner of the book.
			    		<br> Name of the book : <b>'.$book_name.'</b>
			    		<br> A BooksHelp user <b>'.$owner_uname.'</b> has declined your request for this book.
			    		<br> Your Profile section has been updated accordingly.
			    		<br> Thanks and Regards,
			    		<br> BooksHelp Team';
		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Request Cancelation.';
		    $mail->Body    = $body;
		    $mail->AltBody = strip_tags($body);

		    $mail->send();
		} catch (Exception $e) {
		}

        $message = "Process Successful.";
        echo "<script>
        alert('$message');
        window.location.href='../UserProfile.php';
        </script>";
	}
?>