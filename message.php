<?php
    session_start();

    $name = $_POST['name'];
    $mail = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['message'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "final_bookshelp";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()){
    die('Connection error('.mysqli_connect_errno().')'.mysqli_connect_error());
    } else {
     
        $sql = "INSERT INTO Contact_Data(Name, Email, Subject, Message) VALUES ('$name', '$mail', '$sub', '$msg')";
        if ($conn->query($sql) === TRUE) {
            
            $message = "Your Message has been sent. Thank You!";
            echo "<script>
            alert('$message');
            window.location.href='contact.php';
            </script>";
        } else {
            echo "Error: ".$sql. "<br>".$conn->error;
        }
        
        $conn->close();
    }

?>