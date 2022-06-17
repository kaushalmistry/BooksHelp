<?php
    session_start();
    $bname = $_POST['bname'];
    $aname = $_POST['aname'];
    $sub = $_POST['sub'];
    $branch = $_POST['branch'];
    $option = $_POST['donate'];
    $price = $_POST['price'];
    $photo = $_FILES['pic']['name'];
    
    if($option == "donated"){
        $opt1 = 1;
        $opt2 = 0;
    } else if($option == "sharing"){
        $opt1 = 0;
        $opt2 = 1;
    } else {
        $opt1 = $opt2 = 0;
    } 

    if(!empty($bname))
    {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "final_bookshelp";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if(mysqli_connect_error()){
            die('Connection error('.mysqli_connect_errno().')'.mysqli_connect_error());
        } else {

            $find = "SELECT did FROM department WHERE dname = '".$branch."'";
            $res = $conn->query($find);
            if ($res->num_rows > 0) {
              while($row = $res->fetch_assoc()) {
                $did = $row['did'];
              }
            } else {
              $did = -1;
            }


            $sql = "INSERT INTO `books`(`uid`,`bname`,`aname`,`subject`,`dept`,`price`,`donated`,`lend`,`upload_date`)  VALUES('".$_SESSION['userid']."','".$bname."','".$aname."','".$sub."','".$did."','".$price."','".$opt1."','".$opt2."',CURDATE())";
            if ($conn->query($sql) === TRUE) {
                $ext = pathinfo($photo, PATHINFO_EXTENSION);
                $last_id = $conn->insert_id; // Fetching last inserted id

                $new = "Images/UploadedBooks/".strval($last_id).".".$ext.""; // Changing name of uploaded book photo to its book id
                $sub_sql = "UPDATE `books` SET `bookphoto`='$new' WHERE bid=".$last_id;
                $conn->query($sub_sql);
                $filetmp = $_FILES['pic']['tmp_name'];
                $filetype = $_FILES['pic']['type'];
                $path = "../../Images/UploadedBooks/".strval($last_id).".".$ext."";

                move_uploaded_file($filetmp,$path);
                
                $message = "Thank you for sharing your Book. Book has been uploaded Successfully.";

                echo "<script>
                alert('$message');
                window.location.href='../../UserProfile.php';
                </script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }

    } else {
        echo "All Fields are required";
        die();
    }
?>