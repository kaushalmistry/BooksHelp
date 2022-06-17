<?php
    session_start();

   	unset($_SESSION['dept']);
   	unset($_SESSION['sharing']);
	unset($_SESSION['search_query']);
    header('location:../Book.php');
?>