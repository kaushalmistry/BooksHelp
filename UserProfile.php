<?php
  define('DB_SERVER', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'final_bookshelp');

  $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
  if(!$conn){
    die("Connection Failed".mysqli_connect_error());
  }

  session_start();
  if(!isset($_SESSION['userid'])){
    header("location:index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>BooksHelp | Profile</title>
    <link rel="icon" type="image/png" href="Images/PageIcons/profile.png"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!--Home Page Animation-->
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/animate.css">
    <link rel="stylesheet" href="CSS/prettyPhoto.css">
    <link rel="stylesheet" href="CSS/style.css">

    <link rel="stylesheet" href="CSS/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="CSS/home/slider.css">

    <style>
        .info{
          width: 100%;
          text-align: center;
          text-align: justify;
          padding: 20px 200px;
          color: green;
          font-family : monospace;
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
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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

        .btn{
          background: green;
          
        }
        
        .profile{
          text-align: center;
          border: 2px solid green;
          width: 100%;
        }
        
        .user_link{
          color: blue;
        }
        .user_link:hover{
          color:green;
        }
         
        .profilepic{
          border-radius:50%;
          border: 8px solid gray;
          box-shadow:rgba(0,0,0,0.1);
          margin : 20px;
            height: 255px;
            width: 255px;
        }
        .username{
          text-align: center;
          font-family: monospace;
          font-weight: 100px;
          padding: 0px 20px 20px 20px;
        }
        .update{
          color:white;
        }
        .update:hover{
          color:black;
        }
        
        .Myprofile{
            text-align: justify;
            margin: 0px 20%;
            padding-left: 5%;
            width: 60%;
            box-shadow: 5px 5px gray;
            
        }
        .Myprofile h3{
            margin-top: -1%;
        }
        .bookphoto{
            max-width: 200px;
            height: 250px;
            box-shadow: 5px 5px #4e524e;
            border: 5px solid #93eb91;
            margin-left: 300px;
            margin-right: 50px;
            border-radius: 20px;
            padding: 0px;
            color: darkblue;
            margin-bottom: 60px;
            background-size: cover;
        }
          .bookbtn{
              background-color: gray;
              color: white;
              font-size: 17px;
              border: 1px solid black;
              margin: 8px;
              
          }
          .bookbtn:hover{
              background-color: white;
              color: green;
          }
           .col-sm-5 h3{
              border: none;
              margin-top: 2px;
            

          }
          .col-sm-5 pre{
              box-shadow: 5px 5px gray;
              text-align: justify;
          }
        
          .user_info{
            display: flex;
            flex-direction: row;
            margin-left:25%;
          }
          .footer_nav{
            width: 10%;
            display: inline-block;
            margin-left: 200px;
          }
        
         @media screen and (max-width: 767px) { 
             .info, h3{
                 font-size: 1.5rem;
                 padding: 20px 20px;
             }                                                        
                .bookphoto{
              height: 130px;
              width: 100px;
              box-shadow: 5px 5px #4e524e;
              border: 5px solid #93eb91;
              margin-left: 20px;
             
              border-radius: 10px;
           
            
          }
              .col-sm-5 h3{
                 font-weight: bold; 
                  font-size: 10px;
                 padding: 0px;
                padding-left: 5px;
                 
                  margin-top: 4px;
             }
            
             .bookbtn{
                 margin: 5px;
                 font-size: 10px;
                 border: 1px solid black;
                 border-radius: 3px;
             }
             .bookdiv{  
                 padding: 0%;
                 float: left;
                 margin: 0%;                
                 width: 30%;                 
             }
            
             .col-sm-5 pre{               
                padding: 0px;
                box-shadow: 5px 5px gray;
                font-weight: bold; 
                width: 55%;
             }
             .col-sm-5{
                padding: 0px;             
             }
             .row{                 
                 width: 110%;
             }
             .Myprofile{
                width: 80%;
                margin-left: 10%;
                padding-left: 5%;
                overflow-x: hidden;           
             }
             .Myprofile h3{
                font-weight: bold; 
                font-size: 12px;
                margin-left: -50%;
                padding: 0%;
                margin-top: -10px;
                display: inline;
             }
            
            .profilepic{
                border-radius:50%;
                border: 8px solid #9a7dfa;
                box-shadow:rgba(0,0,0,0.1);
                margin : 20px;
                height: 150px;
                width: 150px;
            }

            .user_info{
              display: flex;
              flex-direction: row;
              margin-left:2%;
              font-size: 12px;
            }
            .user_info .btn{
              width: 20%;
            }

            .profile_text{
              font-size: 1.5rem;
              font-weight: bold;
            }
            .profile_text1{
              font-size: 1rem;
            }
            .profile_text2{
              font-size: 1rem;
              margin-left: -80px;
            }
            .btn{
              height: 30px;
              padding: 0px 2px;
              font-size: 1rem;
            }
            .footer_nav{
              display: none;
            }         
        }
      </style>
</head>

<body>

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
                      <a href="index.php"><h1><span>Books</span>Help</h1></a>
                    </div>
                  </div>
        
                  <div class="navbar-collapse collapse">
                    <div class="menu">
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="index.php">Home</a></li>
                        <li role="presentation"><a href="Book.php">Books</a></li>                        
                        <li role="presentation  "><a href="Help.php">Help</a></li>
                        <li role="presentation"><a href="Contact.php">Contact</a></li>
                        <li role="presentation"><a href="AboutUs.php">About Us</a></li>
                        <?php 
                          if(isset($_SESSION['userid']))
                          {
                            echo '<li role="presentation"><a href="UserProfile.php" class="active">'.$_SESSION['user'],'</a></li>';
                            echo '<li role="presentation"><a href="User/UserSignOut.php">Sign Out</a></li>';
                          }
                          else
                          {
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

    <div id="breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Books</li>
        <li>Profile</li>
        <li><a href="UpdateProfile.php">Update Profile</a></li>
        <li><a href='BookTransaction/UploadBook.php'>Upload Book For Sharing</a></li>
      </div>
    </div>
  </div>



  
  <div class="profile">
      <?php
            $sql = "SELECT * from users  where uid='".$_SESSION['userid']."'"; 
            $rnum = $conn->query($sql);
            if ($rnum->num_rows > 0) {
                while($row = $rnum->fetch_assoc()){
                    echo "<img src=".$row['profile_pic']." class='profilepic'>";
                    echo "<h2 class='profile_text'>".$row['name']."</h2>";
                    
                    echo "<pre class='Myprofile'>
                       <h3>Name       : ".$row['name']."</h3>
                       <h3>Username   : ".$row['uname']."</h3>
                       <h3>Email      : ".$row['email']."</h3> ";
                        

                    echo "</pre>";   
                    echo "<div class='col-sm-12'>
                          <form action='Chat/chat_home.php' method='POST' style='margin:20px 0px;'>
                          <input type='hidden' name='chat_index' value='-1'>
                          <input type='submit' class='btn btn-info' value='See Your Chats'>
                          </form></div>";
                        
                        
                }
            }

            echo '<hr style="height:2px;border-width:0;color:gray;background-color:gray;width:80%;margin-left:10%;">';
           
            echo "<h2 class='profile_text' style='text-align: center; padding:30px 0px;'>Books In which You have shown interest.</h2>";

            $sql3 = "SELECT * from books INNER JOIN department ON books.dept = department.did INNER JOIN users ON books.uid = users.uid where books.want_to_buy = 1 AND books.view = 0 AND books.interested_user = '".$_SESSION['userid']."'";
            
            $rnum = $conn->query($sql3);
            if($rnum->num_rows > 0){
                while($row = $rnum->fetch_assoc()){
                  echo "<div class='user_info'>
                        <form action='ShowUser.php' method='POST'>
                        <input type='hidden' value='".$row['uid']."' name='user'>
                        <h4 class='profile_text2'>Owner User : <input type='submit' class='user_link' value='".$row['name']."'></h4>
                        </form>";
                  echo "<form action='Chat/chat_home.php' method='POST' class='col-sm-6' style='margin-left:20px;'>
                          <input type='hidden' name='chat_index' value='".$row['uid']."'>
                          <input type='submit' class='btn btn-info' value='Chat with ".$row['name']."'>
                          </form></div>";

                  echo "<div class='row m-3'>";
                    echo "<div class='bookdiv'>";
                            echo "<img src=".$row['bookphoto']." class='bookphoto col-sm-6'  alt='No Photo Found'></a>
                            ";
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
                            echo "<div class='col-xs-6 text-left'>";
                            echo "<form action='BookTransaction/CancelRequest.php' method='POST'>";
                            echo "<input type='hidden' name='owner_id' value=".$row['uid'].">";
                            echo "<input type='hidden' name='book_id' value=".$row['bid'].">";
                            echo "<input type='hidden' name='book_name' value='".$row['bname']."'>";
                            echo "<input type='submit' value='Cancel Request' class='bookbtn'>";
                            echo "</form>";
                            echo "</div>";
                            echo "</pre>";
                            echo "</div>";
                            echo "</div>";

                    }
            } else {
              echo "<h4 class='text-center profile_text1'>The Books in which you have shown your interest will be shown here.</h4>";
              echo "<h4 class='text-center profile_text1'>To find book of your interest please visit Books Page.</h4>";
            }



            echo '<hr style="height:2px;border-width:0;color:gray;background-color:gray;width:80%;margin-left:10%;">';
           
            echo "<h2 class='profile_text' style='text-align: center; padding:30px 0px;'>Interested Users </h2>";
 
            $sql2 = "SELECT * from books INNER JOIN department ON books.dept = department.did INNER JOIN users ON books.interested_user = users.uid where books.view = 0 AND books.uid='".$_SESSION['userid']."' AND books.want_to_buy = 1";
            
            $rnum = $conn->query($sql2);
            if($rnum->num_rows > 0){
                while($row = $rnum->fetch_assoc()){
                  echo "<div class='profile_text2' style='display: flex;flex-direction: row;margin-left:25%'>
                        <form action='ShowUser.php' method='POST'>
                        <input type='hidden' value='".$row['uid']."' name='user'>
                        <h4 class='profile_text2'>Interested User : <input type='submit' class='user_link' value='".$row['name']."'></h4>
                        </form>";
                  echo "<form action='Chat/chat_home.php' method='POST' class='col-sm-6' style='marginleft:20px;'>
                          <input type='hidden' name='chat_index' value='".$row['uid']."'>
                          <input type='submit' class='btn btn-info' value='Chat with ".$row['name']."'>
                          </form></div>";

                  echo "<div class='row m-3'>";
                    echo "<div class='bookdiv'>";
                            echo "<img src=".$row['bookphoto']." class='bookphoto col-sm-6'  alt='No Photo Found'></a>
                            ";
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
                            if ($row['lend']){
                              echo "<div class='col-xs-6 text-left'>";
                              echo "<form action='BookTransaction/ApproveRequest.php' method='POST'>";
                              echo "<input type='hidden' name='book_id' value=".$row['bid'].">";
                              echo "<input type='hidden' name='rec_id' value=".$row['uid'].">";
                              echo "<input type='hidden' name='book_name' value='".$row['bname']."'>";
                              echo "<input type='hidden' name='sharing' value='1'>";
                              echo "<select id='share_time' name='share_time'>
                                    <option value='15'>Share for 15 days</option>
                                    <option value='1'>Share for 1 month</option>
                                    <option value='6'>Share for 6 month</option>
                              </select>";
                              echo "<input type='submit' value='Lend Book' class='bookbtn'>";
                              echo "</form>";
                              echo "</div>";
                            } else {
                              echo "<div class='col-xs-6 text-left'>";
                              echo "<form action='BookTransaction/ApproveRequest.php' method='POST'>";
                              echo "<input type='hidden' name='book_id' value=".$row['bid'].">";
                              echo "<input type='hidden' name='rec_id' value=".$row['uid'].">";
                              echo "<input type='hidden' name='book_name' value='".$row['bname']."'>";
                              echo "<input type='hidden' name='sharing' value='0'>";
                              echo "<input type='submit' value='Approve Request' class='bookbtn'>";
                              echo "</form>";
                              echo "</div>";
                            }
                            echo "<div class='col-xs-6 text-right'>";
                            echo "<form action='BookTransaction/DeclineRequest.php' method='POST'>";
                            echo "<input type='hidden' name='book_id' value=".$row['bid'].">";
                            echo "<input type='hidden' name='rec_id' value=".$row['uid'].">";
                            echo "<input type='hidden' name='book_name' value='".$row['bname']."'>";
                            echo "<input type='submit' value='Decline request' class='bookbtn'>";
                            echo "</form>";
                            echo "</div>";

                            echo "</pre>";
                            echo "</div>";
                            echo "</div>";

                    }
            } else {
              echo "<h4 class='text-center profile_text1'>The users which are interested in the book uploaded by you will be shown here.</h4>";
            }

            
            
            echo '<hr style="height:2px;border-width:0;color:gray;background-color:gray;width:80%;margin-left:10%;">';
            
            echo "<h2 class='profile_text' style='text-align: center; padding:30px 0px;'>Books Uploaded By You </h2>";
            $sql1 = "SELECT * from books INNER JOIN department ON books.dept = department.did where books.view = 0 AND books.uid='".$_SESSION['userid']."'";

            
            $rnum = $conn->query($sql1);
            if($rnum->num_rows > 0){
                while($row = $rnum->fetch_assoc()){
                    
                  echo "<div class='row m-3'>";
                    echo "<div class='bookdiv'>";
                            echo "<img src=".$row['bookphoto']." class='bookphoto col-sm-6'  alt='No Photo Found'></a>
                            ";
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
                            echo "<div class='col-xs-6 text-left'>";
                            echo "<form action='BookTransaction/UpdateBook.php' method='POST'>";
                            echo "<input type='hidden' name='book_id' value=".$row['bid'].">";
                            echo "<input type='submit' value='Update Details' class='bookbtn'>";
                            echo "</form>";
                            echo "</div>";
                            echo "<div class='col-xs-6 text-right'>";
                            echo "<form action='BookTransaction/DeleteBook.php' method='POST'>";
                            echo "<input type='hidden' name='book_id' value=".$row['bid'].">";
                            echo "<input type='hidden' name='interested_user' value=".$row['interested_user'].">";
                            echo "<input type='hidden' name='book_name' value='".$row['bname']."'>";
                            echo "<input type='submit' value='Delete Book' class='bookbtn'>";
                            echo "</form>";
                            echo "</div>";

                            echo "</pre>";
                            echo "</div>";
                            echo "</div>";

                    }
            } else {
              echo "<h4 class='text-center profile_text1'>The books uploaded by you will be shown here.</h4>";
              echo "<h4 class='text-center profile_text1'>Currently you have not uploaded any books.</h4>";
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
</body>
</html>