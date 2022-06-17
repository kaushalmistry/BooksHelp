<?php
    session_start();
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'final_bookshelp');

    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if(!$conn){
       die("Connection Failed".mysqli_connect_error());
    }
    if ($_POST['check']==1) { // Sort based on department
        unset($_SESSION['sharing']);
        unset($_SESSION['search_query']);
        $find = "SELECT did FROM department WHERE dname = '".$_POST['Department']."'";
        $res = $conn->query($find);
        if ($res->num_rows > 0) {
          while($row = $res->fetch_assoc()) {
            $did = $row['did'];
          }
        } else {
          $did = -1;
        }
        $_SESSION['dept'] = $did;
    }
    else if ($_POST['check']==2) {  // Sort based on sharing option
        unset($_SESSION['dept']);
        unset($_SESSION['search_query']);
        $x = $_POST['share'];
        if ($x == 'Donated Books'){
            $_SESSION['sharing'] = 'D';
        } elseif ($x == 'Time Shared Books') {
            $_SESSION['sharing'] = 'T';
        } else {
            $_SESSION['sharing'] = 'P';
        }
    }
    else {  // Searching
        unset($_SESSION['dept']);
        unset($_SESSION['sharing']);
        $_SESSION['search_query'] = $_POST['srch'];
    }
    header('location:../Book.php');
?>