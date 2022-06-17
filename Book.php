<?php
  session_start();
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "final_bookshelp";

  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  if (mysqli_connect_error()) {
    die('Connection error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
  }

  
  $results_per_page = 2;      // Show this number of books per page

  if (isset($_GET["page"])) {
    $page  = $_GET["page"];
  } else {
    $page = 1;
  };
  $start_from = ($page - 1) * $results_per_page;

  $total_pages;
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BooksHelp | Books</title>
  <link rel="icon" type="image/png" href="Images/PageIcons/books.png"/>

  <!--Home Page Animation-->
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/animate.css">
  <link rel="stylesheet" href="CSS/prettyPhoto.css">
  <link rel="stylesheet" href="CSS/style.css">

  <link rel="stylesheet" href="CSS/footer.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="CSS/home/slider.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <style>
    .info {
      width: 100%;
      text-align: center;
      text-align: justify;
      padding: 20px 200px;
      color: green;
    }

    .dropdown .dropbtn {
      border: none;
      outline: none;
      color: white;
      background-color: inherit;
    }

    .dropdown:hover .dropbtn {
      color: black;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }

    .btn {
      background: green;
    }

    .books {
      width: 80%;
      padding: 10px;
      align-content: center;
    }

    .bookphoto {
      width: 230px;
      height: 250px;
      margin-left: -7.5%;
      border-top-left-radius: 15px;
      border-bottom-left-radius: 20px;
    }

    .bookbtn {
      background-color: gray;
      color: white;
      font-size: 17px;
      border: 1px solid black;
      margin: 8px;
    }

    .bookbtn:hover {
      background-color: white;
      color: green;
    }

    .search1 {
      width: 150px;
      background-color: #9cd9ac;
      border-radius: 5px;
      margin-left: 5px;
      color: black;
      border: silver;
    }

    .searchbtn {
      background-color: darkgreen;
      color: white;
      border-radius: 8px;
    }

    .searchbtn:hover {
      background-color: lightgreen;
      color: black;
    }

    .col-sm-5 h3 {
      border: none;
      margin-top: 2px;
    }

    .col-sm-5 pre {
      box-shadow: 5px 5px gray;
      width: 150%;
    }


    .sortbuttons {
      border-style: none;
      color: black;
      background-color: transparent;
      width: 100%;
      height: 100%;
      font-size: 15px;
      text-align: left;
      outline: none;
    }

    .cover {
      width: 200px;
      height: 250px;
      margin-left: 300px;
      margin-right: 50px;
      background: url(Images/Backgrounds/page.jpg);
      background-size: 200px 240px;
      transform-style: preserve-3d;
      perspective: 500px;
      background-color: white;
      float: left;
      box-shadow: 5px 5px 5px gray;
      margin-bottom: 70px;
      border-top-left-radius: 25px;
      border-bottom-left-radius: 25px;
    }

    .bookdiv {
      position: relative;
      transform-origin: 0 50%;
      transition: all 0.3s ease;
      width: 100%;
      height: 100%;
      background-color: white;
      padding: 0px;
      color: darkblue;
      margin-bottom: 60px;
      background-size: cover;
    }

    .cover:hover .bookdiv {
      transform: rotateY(-55deg);
    }

    .corner-text-wrapper {
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      -o-transform: rotate(45deg);
      transform: rotate(45deg);
      clip: rect(0px, 141.421px, 70.7107px, 0px);
      height: 141.421px;
      position: absolute;
      right: -20.7107px;
      top: -20.7107px;
      width: 141.421px;
      z-index: 1;
    }

    .corner-text {
      color: white;
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      transform: rotate(-45deg);
      left: 20px;
      top: 20px;
      background-color: blue;
      display: block;
      height: 100px;
      position: absolute;
      width: 100px;
      z-index: 2;
    }

    .corner-text h5 {
      position: relative;
      font-family: "HelveticaNeue-CondensedBold", "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
      font-weight: 700;
      /*top: -185px;
      left: 10px;*/
      display: block;
      color:white;
      text-align:right;
    }


    .content {
      border: 1px solid #CCCCCC;
      height: auto;
      line-height: 400px;
      overflow: hidden;
    }

    .pagination {
      display: inline-block;
      margin-left: 20%;
    }

    .pagination a {
      color: black;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
    }

    .pagination a.active {
      background-color: #4CAF50;
      color: white;
    }

    .pagination a:hover:not(.active) {
      background-color: #ddd;
    }
    .footer_nav{
      width: 10%;
      display: inline-block;
      margin-left: 200px;
    }


    @media screen and (max-width: 767px) {

      .info,h3 {
        font-size: 1.5rem;
        padding: 20px 20px;
      }

      .bookphoto {
        width: 100px;
        height: 100px;
        margin-left: -18%;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
      }

      .bookdiv {

      }

      .cover {
        width: 75px;
        height: 100px;
        margin: 0px;
        margin-left: 10%;
        margin-right: 10%;
        background-size: 75px 100px;
        box-shadow: 2px 2px gray;
        background-color: blue;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
      }

      .cover:hover .bookdiv {
        transform: rotateY(-60deg);
      }

      h3 {
        font-weight: bold;
        font-size: 10px;
        padding: 0px;
        padding-left: 5px;
        margin-top: 4px;
      }

      .bookbtn {
        margin: 5px;
        font-size: 10px;
        border: 1px solid black;
        border-radius: 3px;
      }

      .col-sm-5 pre {
        padding: 0px;
        box-shadow: 5px 5px gray;
        font-weight: bold;
        width: 80%;
        margin-left: -20px;
        float: left;
      }

      .col-sm-5 {
        padding: 0px;
        width: 75%;
        margin-left: 25%;
      }

      .row {
        width: 130%;
      }
       
      .content {
        border: 1px solid #CCCCCC;
        line-height: 0px;
      }

      .corner-text-wrapper {
        clip: rect(0px, 120.421px, 20.7107px, 0px);
        height: 141.421px;
        position: absolute;
        right: -20.7107px;
        top: -20.7107px;
        width: 141.421px;     
      }

      .corner-text {
        color: white;  
        left: 20px;
        top: 20px;
        background-color: blue;
        display: block;
        height: 100px;
        position: absolute;
        width: 100px;
        z-index: 2;
      }

      .corner-text h5 {
        position: relative;
        font-family: "HelveticaNeue-CondensedBold", "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        font-weight: 600;
        top: -8px;
        /*left: 10px;*/
        display: block;
        color:white;
        text-align:right;
        font-size: 5px;
      }
      .footer_nav{
        display: none;
      }
    }

  </style>


</head>

<body>



  <!-- Navigation Bar -->
  <header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
              <a href="index.php">
                <h1><span>Books</span>Help</h1>
              </a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php">Home</a></li>
                <li role="presentation"><a href="BookTransaction/ClearBook.php" class="active">Books</a></li>
                <li role="presentation"><a href="AboutUs.php">About Us</a></li>
                <li role="presentation  "><a href="Help.php">Help </a></li>
                <li role="presentation"><a href="Contact.php">Contact</a></li>
                <?php
                if (isset($_SESSION['userid'])) /*&& $_SESSION['logged']==true*/ {
                  echo '<li role="presentation"><a href="UserProfile.php">' . $_SESSION['user'], '</a></li>';
                  echo '<li role="presentation"><a href="User/UserSignOut.php">Sign Out</a></li>';
                } else {
                  echo '<li role="presentation"><a href="User/UserLogin.php">Log In</a></li>';
                  echo '<li role="presentation"><a href="User/UserSignUp.php">Sign Up</a></li>';
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>


  <div id="breadcrumb" id="home">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Books</li>


        <li class="dropdown">
          <button class="dropbtn">Department
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <form action="BookTransaction/SortBooks.php" method="post">

              <input type="hidden" name="check" value="1">
              <a class='depmin'><input type='submit' name='Department' value='Computer/IT' class='sortbuttons'></a>
              <a class='depmin'><input type='submit' name='Department' value='Mechanical' class='sortbuttons'></a>
              <a class='depmin'><input type='submit' name='Department' value='Civil' class='sortbuttons'></a>
              <a class='depmin'><input type='submit' name='Department' value='Production' class='sortbuttons'></a>
              <a class='depmin'><input type='submit' name='Department' value='Electrical' class='sortbuttons'></a>
              <a class='depmin'><input type='submit' name='Department' value='Ele & Comm' class='sortbuttons'></a>
              <a class='depmin'><input type='submit' name='Department' value='Other' class='sortbuttons'></a>

            </form>
          </div>
        </li>

        <li class="dropdown">
          <button class="dropbtn">More
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <form action="BookTransaction/SortBooks.php" method="post">

              <input type="hidden" name="check" value="2">
              <a><input type="submit" name="share" value="Donated Books" class="sortbuttons"></a>
              <a><input type="submit" name="share" value="Time Shared Books" class="sortbuttons"></a>
              <a><input type="submit" name="share" value="Books On Sell" class="sortbuttons"></a>              

            </form>
          </div>
        </li>

        <?php
        if (isset($_SESSION['userid'])) {
          echo "<li><a href='BookTransaction/UploadBook.php'>Upload Book For Sharing</a></li>";
        }
        ?>
        <li>
          <form action="BookTransaction/SortBooks.php" method="post" style="float:right;visibility:visible;">
            <input type="hidden" name="check" value="3">
            <input type="text" name="srch" class="search1" placeholder=" search">
            <input type="submit" value="search" class="searchbtn">
          </form>
        </li>



      </div>
    </div>
  </div>

  <div class="info">

    <h2 style="color:blue, text-align:center;">BOOKS for SHARING</h2>
  </div>


  <div class="books">
    <?php
    if(isset($_SESSION['userid'])){
      if (isset($_SESSION['dept'])) {
        $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.want_to_buy = 0 AND  books.view = 0 AND books.dept = '".$_SESSION['dept']."'";
        $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.want_to_buy = 0  AND books.view = 0 AND books.dept = '".$_SESSION["dept"]."' LIMIT " . $start_from . "," . $results_per_page . "";
      } elseif (isset($_SESSION['sharing'])){
        if ($_SESSION['sharing'] == 'D') {
          $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.dept = 0 AND  books.view = 0 AND books.donated = 1 ";
          $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.want_to_buy = 0  AND books.view = 0 AND books.donated = 1 LIMIT " . $start_from . "," . $results_per_page . "";
        } elseif ($_SESSION['sharing'] == 'T') {
          $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.dept = 0 AND  books.view = 0 AND books.lend = 1 ";
          $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.want_to_buy = 0  AND books.view = 0 AND books.lend = 1 LIMIT " . $start_from . "," . $results_per_page . "";
        } else {
          $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.dept = 0 AND  books.view = 0 AND books.price != 0 ";
          $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.want_to_buy = 0  AND books.view = 0 AND books.price != 0 LIMIT " . $start_from . "," . $results_per_page . "";
        }
      } elseif (isset($_SESSION['search_query'])) {
        
        $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.want_to_buy = 0 AND  books.view = 0 AND (CONCAT(books.bname, books.aname, books.subject, department.dname, books.price)) LIKE '%".$_SESSION['search_query']."%'";
        $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.want_to_buy = 0  AND books.view = 0 AND (CONCAT(books.bname, books.aname, books.subject, department.dname, books.price)) LIKE '%".$_SESSION['search_query']."%' LIMIT ". $start_from . "," . $results_per_page . "";

      } else {
        $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.want_to_buy = 0 AND  books.view = 0";
        $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.uid != '".$_SESSION['userid']."' AND books.want_to_buy = 0  AND books.view = 0 LIMIT " . $start_from . "," . $results_per_page . "";
      }
    } else {
      if (isset($_SESSION['dept'])) {
        $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.dept = 0 AND  books.view = 0 AND books.dept = '".$_SESSION['dept']."'";
        $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE  books.want_to_buy = 0  AND books.view = 0 AND books.dept = '".$_SESSION["dept"]."' LIMIT " . $start_from . "," . $results_per_page . "";
      } elseif (isset($_SESSION['sharing'])){
        if ($_SESSION['sharing'] == 'D') {
          $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.dept = 0 AND  books.view = 0 AND books.donated = 1 ";
          $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE  books.want_to_buy = 0  AND books.view = 0 AND books.donated = 1 LIMIT " . $start_from . "," . $results_per_page . "";
        } elseif ($_SESSION['sharing'] == 'T') {
          $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.dept = 0 AND  books.view = 0 AND books.lend = 1 ";
          $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE  books.want_to_buy = 0  AND books.view = 0 AND books.lend = 1 LIMIT " . $start_from . "," . $results_per_page . "";
        } else {
          $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.dept = 0 AND  books.view = 0 AND books.price != 0 ";
          $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE  books.want_to_buy = 0  AND books.view = 0 AND books.price != 0 LIMIT " . $start_from . "," . $results_per_page . "";
        }
      } elseif (isset($_SESSION['search_query'])) {
        
        $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.want_to_buy = 0 AND  books.view = 0 AND (CONCAT(books.bname, books.aname, books.subject, department.dname, books.price)) LIKE '%".$_SESSION['search_query']."%'";
        $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE  books.want_to_buy = 0  AND books.view = 0 AND (CONCAT(books.bname, books.aname, books.subject, department.dname, books.price)) LIKE '%".$_SESSION['search_query']."%' LIMIT ". $start_from . "," . $results_per_page . "";

      } else {
        $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE books.want_to_buy = 0 AND  books.view = 0";
        $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did WHERE  books.want_to_buy = 0  AND books.view = 0 LIMIT " . $start_from . "," . $results_per_page . "";
      }
    }


      $rnum1 = $conn->query($sql1);
      if ($rnum1->num_rows < $results_per_page) {
        $total_pages = 1;
      } else {
        $total_pages = ceil($rnum1->num_rows / $results_per_page);
      }
      $rnum = $conn->query($sql2);
      if ($rnum->num_rows > 0) {

        while ($row = $rnum->fetch_assoc()) {

            echo "<div class='row m-3'>";
            echo "<div class='cover'>";

            echo "<div class='bookdiv'>";
            echo "<img src=" . $row['bookphoto'] . " class='bookphoto col-sm-6'  alt='No Photo Found'></a>
                            ";
            if ($row['donated']) {
              echo "<div class='corner-text-wrapper'>
                    <div class='corner-text'>
                    <h5>Donated</h5>
                    </div>
                    </div>";
            }
            else if ($row['lend']) {
              echo "<div class='corner-text-wrapper'>
                    <div class='corner-text'>
                    <h5 style='color:white;text-align:right;'>Time Shared</h5>
                    </div>
                    </div>";
            }
            echo "</div>";
            echo "</div>";
            echo "<div class='col-sm-5'>";
            echo "<pre>";
              echo "<h3> Name          : ".$row['bname']."</h3>";
              echo "<h3> Author Name   : ".$row['aname']."</h3>";
              echo "<h3> Subject       : ".$row['subject']."</h3>";
              echo "<h3> Department    : ".$row['dname']."</h3>";
              if ($row['donated']){
              echo "<h3> Sharing Option: Donated</h3>";
              } else if ($row['lend']){
                echo "<h3> Sharing Option: Time Shared</h3>";
              } else {
                echo "<h3> Sharing Option: Sell at price - ".$row['price']."</h3>";
              }
              if (isset($_SESSION['userid'])) {
                echo "<div class='col-xs-6 text-left'>";
                echo "<form action='ShowUser.php' method='POST'>";
                echo "<input type='hidden' name='user' value=".$row['uid'].">";
                echo "<input type='submit' value='See Details' class='bookbtn'>";
                echo "</form>";
                echo "</div>";
                echo "<div class='col-xs-6 text-right'>";
                echo "<form action='BookTransaction/WantThisBook.php' method='POST'>";
                echo "<input type='hidden' name='owner_id' value=".$row['uid'].">";
                echo "<input type='hidden' name='book_id' value=".$row['bid'].">";
                echo "<input type='hidden' name='book_name' value='".$row['bname']."'>";
                echo "<input type='submit' value='Want this Book' class='bookbtn'>";
                echo "</form>";
                echo "</div>";
              } else {
                echo "<div class='col-xs-6 text-left'>";
                echo "<input type='submit' value='See Details' class='bookbtn' onclick='dont_show()'>";
                echo "</div>";
              }
            echo "</pre>";
            echo "</div>";
            echo "</div>";
        }
        echo "<div class='pagination'>";
        if ($total_pages < 3) {
          $npages = $total_pages;
        } else {
          $npages = 2;
        }
        if ($page < 3) {
          $pagetodisplay = 1;
        } else {
          $pagetodisplay = $page;
        }
        $temp1 = $total_pages;
        if ($temp1 < 3) {
        } else {
          if ($page > 2) {
            echo " <a href='book.php?page=" . ($page - 2) . "'";
            echo ">&laquo;</a>";
          }
        }
        $temp;
        for ($i = $pagetodisplay; $i <= ($pagetodisplay + $npages); $i++) {
          if ($i > $total_pages) {
            $temp = $i;
          } else { // print links for all pages
            echo "<a href='book.php?page=" . $i . "'";
            if ($i == $page)  echo " class='active'";
            else  echo " class='notcurPage'";
            echo ">" . $i . "</a> ";
            $temp = $i;
          }
        };

        if ($temp < $total_pages) {
          echo "<a href='Book.php?page=" . ($temp + 1) . "'";
          echo ">&raquo;</a>";
        }
        echo "</div>";
      } else {
        echo "<h4 style='text-align:center;color:red;'>No results found. Currently, there is no book available under this section.</h4>";
      }

    ?>

  </div>





  <!-- Footer -->
  <footer class="footer-distributed">

    <div class="footer-left footer_icon">      
      <div class="navbar-brand">
        <a href="index.php"><h1><span>BOOKS</span>HELP</h1></a>
      </div>

      <p class="footer-links footer_nav" style="margin-left: 100px;">
        <a href="index.php">Home</a>
        <br/><br/>
        <a href="Book.php">Books</a>
        <br/><br/>
        <a href="AboutUs.php">About</a>
        <br/><br/>
        <a href="Contact.php">Contact</a>     
      </p>
    </div>
  
      
  
    <div class="footer-center">
  
      <div class="footer_middle">
        <i class="fa fa-map-marker"></i>
        <p style="position: absolute;"><span>C-2, Anand</span> Gujarat, India</p>
      </div>
  
      <div class="footer_middle">
        <i class="fa fa-phone"></i>
        <p style="position: absolute;"><span><br></span>+91 81-53-047061</p>
      </div>
  
      <div class="footer_middle">
        <i class="fa fa-envelope"></i>
        <p style="position: absolute;"><span><br></span><a href="mailto:support@company.com">support@BooksHelp.com</a></p>
      </div>
  
    </div>
  
    <div class="footer-right">
  
      <p class="footer-company-about">
        <span>About the BooksHelp</span>
        We are here to help everyone.
        Our motto is to provide a platform where anyone can share and receive books.
        We hope that it will be helpful.
      </p>
  
      <div class="footer-icons">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>
      </div>
    </div>

    <div class="copyright">
        &copy; BooksHelp. All Rights Reserved.
        <div class="credits" style="font-family: initial;color: grey">
          Designed by <a href="#">Kaushal</a></div>
      </div>

      <div class="pull-right">
        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x" style="color: grey"></i></a>
      </div>
  </footer>



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="JS/jquery.min.js"></script>
  <script src="JS/jquery-migrate.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="JS/bootstrap.min.js"></script>
  <script src="JS/jquery.prettyPhoto.js"></script>
  <script src="JS/jquery.isotope.min.js"></script>
  <script src="JS/wow.min.js"></script>
  <script src="JS/functions.js"></script>

  <!-- <script src="JS/home/slider.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


  <script>
    $(document).ready(function() {
      $('.dropdown-submenu a.test').on("click", function(e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });

    });
  </script>
  <script type="text/javascript">
    function dont_show(){
      alert("Please Login to See Details");
    }
  </script>

</body>

</html>