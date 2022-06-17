<?php
    require 'includes/dbh.inc.php';
    session_start();

    $id = $_SESSION['userid'];
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $pic = $_FILES['pic']['name'];

    $_SESSION['user'] = $uname;
    $_SESSION['name'] = $name;
    if (!empty($pic)) {

        $ext = pathinfo($pic, PATHINFO_EXTENSION);

        $new = "Images/UserProfile/".strval($id).".".$ext.""; // Changing name of uploaded book photo to its book id
        $filetmp = $_FILES['pic']['tmp_name'];
        $filetype = $_FILES['pic']['type'];
        $path = "../Images/UserProfile/".strval($id).".".$ext."";

        move_uploaded_file($filetmp,$path);

        $sql = "UPDATE users SET name='$name', uname='$uname', profile_pic='".$new."' WHERE uid = '$id'";

        if ($con->query($sql) === TRUE){
            $message = "Profile Updated successfully";
            echo "<script>
            alert('$message');
            window.location.href='../UserProfile.php';
            </script>";
        }

   } else {
        $sql = "UPDATE users SET name='$name', uname='$uname' WHERE uid ='$id'";

        if ($con->query($sql) === TRUE){
            $message = "Profile Updated successfully";
            echo "<script>
            alert('$message');
            window.location.href='../UserProfile.php';
            </script>";
        }
   }
?>