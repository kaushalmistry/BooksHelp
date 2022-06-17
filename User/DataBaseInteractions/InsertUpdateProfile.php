<?php
    session_start();
    $id = $_SESSION['userid'];
    $name = $_POST['name'];
    $uname = $_POST['uname'];
  
   if (isset($_POST['pic'])) {
    echo "Pic";
   } else {
    echo "No change";
   }
    // $photo = $_FILES['pic']['name'];
  
    // $filetmp = $_FILES['pic']['tmp_name'];
 
    // $filetype = $_FILES['pic']['type'];
    // $path = "upload/".$photo;
    

    // if(!empty($name))
    // {
    //     $host = "localhost";
    //     $dbUsername = "root";
    //     $dbPassword = "";
    //     $dbname = "bookshelp";

    //     $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        
    //     if(mysqli_connect_error()){
    //         die('Connection error('.mysqli_connect_errno().')'.mysqli_connect_error());
    //     } else {
    //            $ext = pathinfo($photo, PATHINFO_EXTENSION);
    //             $new = "upload/".strval($id).".".$ext."";
            
    //         move_uploaded_file($filetmp,$new);

    //         $INSERT = "UPDATE user SET 
    //        uidusers='".mysqli_real_escape_string($conn,$name)."', email='".mysqli_real_escape_string($conn,$email)."',  uimage='".mysqli_real_escape_string($conn,$new)."' WHERE uid='".mysqli_real_escape_string($conn,$id)."'";
    //         if ($conn->query($INSERT) === TRUE) {
    //             $_SESSION['user'] = $name;
    //             $message = "Your profile has updated successfully";
    //             echo "<script>
    //             alert('$message');
    //             window.location.href='profile.php';
    //             </script>";
    //         } else {
    //             echo "Error: " . $INSERT . "<br>" . $conn->error;
    //         }
    //         $conn->close();
    //     }

    // } else {
    //     echo "All Fields are required";
    //     die();
    // }
?>