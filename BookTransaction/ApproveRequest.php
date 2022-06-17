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
	$opt = $_POST['sharing'];


	$sql = "UPDATE books SET view = 1 WHERE bid = '$book_id'";
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

		if ($opt) {
			$time = $_POST['share_time'];
			if (strpos($time, "15") !== FALSE){
				$sql1 = "INSERT INTO transaction(from_id, to_id, book_id, lend, borrow_date, due_date) VALUES ($owner_id, $rec_id, $book_id, 1, CURDATE(), DATE_ADD(CURDATE(),INTERVAL 15 DAY))";

				$conn->query($sql1);


		        // Send mail to the owner informing someone is interested in his book
		        $mail = new PHPMailer(true);

				try {
				    $mail->isSMTP();                        // Send using SMTP
				    $mail->Host       = 'smtp.gmail.com';   // Set the SMTP server to send through
				    $mail->SMTPAuth   = true;               // Enable SMTP authentication
				    $mail->Username   = $Mail_User;         // SMTP username
				    $mail->Password   = $Mail_Pass;         // SMTP password
				    $mail->SMTPSecure = 'tls';              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				    $mail->Port       = 587;                // TCP port to connect to, use 465 for HPMailer::ENCRYPTION_SMTPS` above

				    //Recipients
				    $mail->setFrom($Mail_User, 'BooksHelp');

				    $mail->addAddress($owner_email,$owner_uname);     // Add a recipient

				    $body = 'Dear <b>'.$owner_uname.'</b>,
					    		<br> You just approved the request made by a BooksHelp user <b>'.$rec_uname.'</b>.
					    		<br> Name of the book : <b>'.$book_name.'</b>
					    		<br> We have recorded the transaction of the book <b>'.$book_name.'</b> from you to the user <b>'.$rec_uname.'</b>.
					    		<br> You have lended your book to the user for 15 Days.
					    		<br> Make sure you handed over the book to <b>'.$rec_uname.'</b>.
					    		<br> Thank You very much for sharing. :)
					    		<br> Thanks and Regards,
					    		<br> BooksHelp Team';
				    // Content
				    $mail->isHTML(true);                                  // Set email format to HTML
				    $mail->Subject = 'Request Approval.';
				    $mail->Body    = $body;
				    $mail->AltBody = strip_tags($body);

				    $mail->send();
				} catch (Exception $e) {
					echo "owner not send";
				}

				        // Send mail to the owner informing someone is interested in his book
		        $mail = new PHPMailer(true);

				try {
				    $mail->isSMTP();                       // Send using SMTP
				    $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
				    $mail->SMTPAuth   = true;              // Enable SMTP authentication
				    $mail->Username   = $Mail_User;        // SMTP username
				    $mail->Password   = $Mail_Pass;        // SMTP password
				    $mail->SMTPSecure = 'tls';             // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				    $mail->Port       = 587;               // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS` above

				    //Recipients
				    $mail->setFrom($Mail_User, 'BooksHelp');

				    $mail->addAddress($rec_email,$rec_uname);     // Add a recipient

				    $body = 'Dear <b>'.$rec_uname.'</b>,
					    		<br> Your request for the book <b>'.$book_name.'</b> has been approved by the owner of the book <b>'.$owner_uname.'</b>.
					    		<br> Name of the book : <b>'.$book_name.'</b>.
					    		<br> We have recorded the transaction of the book <b>'.$book_name.'</b> from <b>'.$owner_uname.'</b> to you.
					    		<br> You have borrowed the book from the user for 15 Days.
					    		<br> Make sure you take the book from <b>'.$owner_uname.'</b>.
					    		<br> Thank You very much for participating in transaction. :)
					    		<br> Thanks and Regards,
					    		<br> BooksHelp Team';
				    // Content
				    $mail->isHTML(true);                                  // Set email format to HTML
				    $mail->Subject = 'Request Approval.';
				    $mail->Body    = $body;
				    $mail->AltBody = strip_tags($body);

				    $mail->send();
				} catch (Exception $e) {
					echo "rec not send";
				}
			} elseif (strpos($time, "1") !== FALSE){
				$sql1 = "INSERT INTO transaction(from_id, to_id, book_id, lend, borrow_date, due_date) VALUES ($owner_id, $rec_id, $book_id, 1, CURDATE(), DATE_ADD(CURDATE(),INTERVAL 1 MONTH))";

				$conn->query($sql1);


		        // Send mail to the owner informing someone is interested in his book
		        $mail = new PHPMailer(true);

				try {
				    $mail->isSMTP();                        // Send using SMTP
				    $mail->Host       = 'smtp.gmail.com';   // Set the SMTP server to send through
				    $mail->SMTPAuth   = true;               // Enable SMTP authentication
				    $mail->Username   = $Mail_User;         // SMTP username
				    $mail->Password   = $Mail_Pass;         // SMTP password
				    $mail->SMTPSecure = 'tls';              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				    $mail->Port       = 587;                // TCP port to connect to, use 465 for HPMailer::ENCRYPTION_SMTPS` above

				    //Recipients
				    $mail->setFrom($Mail_User, 'BooksHelp');

				    $mail->addAddress($owner_email,$owner_uname);     // Add a recipient

				    $body = 'Dear <b>'.$owner_uname.'</b>,
					    		<br> You just approved the request made by a BooksHelp user <b>'.$rec_uname.'</b>.
					    		<br> Name of the book : <b>'.$book_name.'</b>
					    		<br> We have recorded the transaction of the book <b>'.$book_name.'</b> from you to the user <b>'.$rec_uname.'</b>.
					    		<br> You have lended your book to the user for 1 Month.
					    		<br> Make sure you handed over the book to <b>'.$rec_uname.'</b>.
					    		<br> Thank You very much for sharing. :)
					    		<br> Thanks and Regards,
					    		<br> BooksHelp Team';
				    // Content
				    $mail->isHTML(true);                                  // Set email format to HTML
				    $mail->Subject = 'Request Approval.';
				    $mail->Body    = $body;
				    $mail->AltBody = strip_tags($body);

				    $mail->send();
				} catch (Exception $e) {
					echo "owner not send";
				}

				        // Send mail to the owner informing someone is interested in his book
		        $mail = new PHPMailer(true);

				try {
				    $mail->isSMTP();                       // Send using SMTP
				    $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
				    $mail->SMTPAuth   = true;              // Enable SMTP authentication
				    $mail->Username   = $Mail_User;        // SMTP username
				    $mail->Password   = $Mail_Pass;        // SMTP password
				    $mail->SMTPSecure = 'tls';             // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				    $mail->Port       = 587;               // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS` above

				    //Recipients
				    $mail->setFrom($Mail_User, 'BooksHelp');

				    $mail->addAddress($rec_email,$rec_uname);     // Add a recipient

				    $body = 'Dear <b>'.$rec_uname.'</b>,
					    		<br> Your request for the book <b>'.$book_name.'</b> has been approved by the owner of the book <b>'.$owner_uname.'</b>.
					    		<br> Name of the book : <b>'.$book_name.'</b>.
					    		<br> We have recorded the transaction of the book <b>'.$book_name.'</b> from <b>'.$owner_uname.'</b> to you.
					    		<br> You have borrowed the book from the user for 1 Month.
					    		<br> Make sure you take the book from <b>'.$owner_uname.'</b>.
					    		<br> Thank You very much for participating in transaction. :)
					    		<br> Thanks and Regards,
					    		<br> BooksHelp Team';
				    // Content
				    $mail->isHTML(true);                                  // Set email format to HTML
				    $mail->Subject = 'Request Approval.';
				    $mail->Body    = $body;
				    $mail->AltBody = strip_tags($body);

				    $mail->send();
				} catch (Exception $e) {
					echo "rec not send";
				}
			} else {
				$sql1 = "INSERT INTO transaction(from_id, to_id, book_id, lend, borrow_date, due_date) VALUES ($owner_id, $rec_id, $book_id, 1, CURDATE(), DATE_ADD(CURDATE(),INTERVAL 6 MONTH))";

				$conn->query($sql1);


		        // Send mail to the owner informing someone is interested in his book
		        $mail = new PHPMailer(true);

				try {
				    $mail->isSMTP();                        // Send using SMTP
				    $mail->Host       = 'smtp.gmail.com';   // Set the SMTP server to send through
				    $mail->SMTPAuth   = true;               // Enable SMTP authentication
				    $mail->Username   = $Mail_User;         // SMTP username
				    $mail->Password   = $Mail_Pass;         // SMTP password
				    $mail->SMTPSecure = 'tls';              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				    $mail->Port       = 587;                // TCP port to connect to, use 465 for HPMailer::ENCRYPTION_SMTPS` above

				    //Recipients
				    $mail->setFrom($Mail_User, 'BooksHelp');

				    $mail->addAddress($owner_email,$owner_uname);     // Add a recipient

				    $body = 'Dear <b>'.$owner_uname.'</b>,
					    		<br> You just approved the request made by a BooksHelp user <b>'.$rec_uname.'</b>.
					    		<br> Name of the book : <b>'.$book_name.'</b>
					    		<br> We have recorded the transaction of the book <b>'.$book_name.'</b> from you to the user <b>'.$rec_uname.'</b>.
					    		<br> You have lended your book to the user for 6 Months.
					    		<br> Make sure you handed over the book to <b>'.$rec_uname.'</b>.
					    		<br> Thank You very much for sharing. :)
					    		<br> Thanks and Regards,
					    		<br> BooksHelp Team';
				    // Content
				    $mail->isHTML(true);                                  // Set email format to HTML
				    $mail->Subject = 'Request Approval.';
				    $mail->Body    = $body;
				    $mail->AltBody = strip_tags($body);

				    $mail->send();
				} catch (Exception $e) {
					echo "owner not send";
				}

				        // Send mail to the owner informing someone is interested in his book
		        $mail = new PHPMailer(true);

				try {
				    $mail->isSMTP();                       // Send using SMTP
				    $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
				    $mail->SMTPAuth   = true;              // Enable SMTP authentication
				    $mail->Username   = $Mail_User;        // SMTP username
				    $mail->Password   = $Mail_Pass;        // SMTP password
				    $mail->SMTPSecure = 'tls';             // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
				    $mail->Port       = 587;               // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS` above

				    //Recipients
				    $mail->setFrom($Mail_User, 'BooksHelp');

				    $mail->addAddress($rec_email,$rec_uname);     // Add a recipient

				    $body = 'Dear <b>'.$rec_uname.'</b>,
					    		<br> Your request for the book <b>'.$book_name.'</b> has been approved by the owner of the book <b>'.$owner_uname.'</b>.
					    		<br> Name of the book : <b>'.$book_name.'</b>.
					    		<br> We have recorded the transaction of the book <b>'.$book_name.'</b> from <b>'.$owner_uname.'</b> to you.
					    		<br> You have borrowed the book from the user for 6 Months.
					    		<br> Make sure you take the book from <b>'.$owner_uname.'</b>.
					    		<br> Thank You very much for participating in transaction. :)
					    		<br> Thanks and Regards,
					    		<br> BooksHelp Team';
				    // Content
				    $mail->isHTML(true);                                  // Set email format to HTML
				    $mail->Subject = 'Request Approval.';
				    $mail->Body    = $body;
				    $mail->AltBody = strip_tags($body);

				    $mail->send();
				} catch (Exception $e) {
					echo "rec not send";
				}
			}


		} else {
			$sql1 = "INSERT INTO transaction(from_id, to_id, book_id) VALUES ($owner_id, $rec_id, $book_id)";

			$conn->query($sql1);


	        // Send mail to the owner informing someone is interested in his book
	        $mail = new PHPMailer(true);

			try {
			    $mail->isSMTP();                        // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';   // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;               // Enable SMTP authentication
			    $mail->Username   = $Mail_User;         // SMTP username
			    $mail->Password   = $Mail_Pass;         // SMTP password
			    $mail->SMTPSecure = 'tls';              // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;                // TCP port to connect to, use 465 for HPMailer::ENCRYPTION_SMTPS` above

			    //Recipients
			    $mail->setFrom($Mail_User, 'BooksHelp');

			    $mail->addAddress($owner_email,$owner_uname);     // Add a recipient

			    $body = 'Dear <b>'.$owner_uname.'</b>,
				    		<br> You just approved the request made by a BooksHelp user <b>'.$rec_uname.'</b>.
				    		<br> Name of the book : <b>'.$book_name.'</b>
				    		<br> We have recorded the transaction of the book <b>'.$book_name.'</b> from you to the user <b>'.$rec_uname.'</b>.
				    		<br> Make sure you handed over the book to <b>'.$rec_uname.'</b>.
				    		<br> Thank You very much for sharing. :)
				    		<br> Thanks and Regards,
				    		<br> BooksHelp Team';
			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Request Approval.';
			    $mail->Body    = $body;
			    $mail->AltBody = strip_tags($body);

			    $mail->send();
			} catch (Exception $e) {
				echo "owner not send";
			}

			        // Send mail to the owner informing someone is interested in his book
	        $mail = new PHPMailer(true);

			try {
			    $mail->isSMTP();                       // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;              // Enable SMTP authentication
			    $mail->Username   = $Mail_User;        // SMTP username
			    $mail->Password   = $Mail_Pass;        // SMTP password
			    $mail->SMTPSecure = 'tls';             // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			    $mail->Port       = 587;               // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS` above

			    //Recipients
			    $mail->setFrom($Mail_User, 'BooksHelp');

			    $mail->addAddress($rec_email,$rec_uname);     // Add a recipient

			    $body = 'Dear <b>'.$rec_uname.'</b>,
				    		<br> Your request for the book <b>'.$book_name.'</b> has been approved by the owner of the book <b>'.$owner_uname.'</b>.
				    		<br> Name of the book : <b>'.$book_name.'</b>.
				    		<br> We have recorded the transaction of the book <b>'.$book_name.'</b> from <b>'.$owner_uname.'</b> to you.
				    		<br> Make sure you take the book from <b>'.$owner_uname.'</b>.
				    		<br> Thank You very much for participating in transaction. :)
				    		<br> Thanks and Regards,
				    		<br> BooksHelp Team';
			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Request Approval.';
			    $mail->Body    = $body;
			    $mail->AltBody = strip_tags($body);

			    $mail->send();
			} catch (Exception $e) {
				echo "rec not send";
			}
		}



	}
	$message = "You just approved the request.<br>
    			Make sure you have handed over the book to the Receiver.";
  	echo "<script> alert('You just approved the request of the book. Make Sure you handed over the book to the receiver.');
  		window.location.href('../UserProfile.php');
  	 </script>";
?>