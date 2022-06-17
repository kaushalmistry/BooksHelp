<?php
    session_start();
    $bid = $_POST['book_id'];
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

            
            $sql = "UPDATE books set bname='$bname', aname = '$aname', subject = '$sub', dept = '$did', price = '$price', donated = '$opt1', lend = '$opt2', upload_date = CURDATE() WHERE bid = ".$bid;

            if ($conn->query($sql) === TRUE) {
                # code...

                if(!empty($photo)){
                    $ext = pathinfo($photo, PATHINFO_EXTENSION);

                    $new = "Images/UploadedBooks/".strval($bid).".".$ext.""; // Changing name of uploaded book photo to its book id
                    $sub_sql = "UPDATE `books` SET `bookphoto`='$new' WHERE bid=".$bid;
                    $conn->query($sub_sql);
                    $filetmp = $_FILES['pic']['tmp_name'];
                    $filetype = $_FILES['pic']['type'];
                    $path = "../../Images/UploadedBooks/".strval($bid).".".$ext."";

                    move_uploaded_file($filetmp,$path);
                }

                $message = "Book Details Updated successfully";
                echo "<script>
                alert('$message');
                window.location.href='../../UserProfile.php';
                </script>";
            } else {
                $message = "Something went wrong. Please try again later.";
                echo "<script>
                alert('$message');
                window.location.href='../../UserProfile.php';
                </script>";
            }
            
        }
        $conn->close();
    } else {
        echo "All Fields are required";
        die();
    }
?>