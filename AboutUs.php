
<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <title>BooksHelp | About Us</title>
  <link rel="icon" type="image/png" href="Images/PageIcons/aboutus.png"/>       
   
  <link rel="stylesheet" href="Special CSS/agency.min.css"> 
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/animate.css">

  <link rel="stylesheet" href="CSS/prettyPhoto.css">
 
  <link rel="stylesheet" href="CSS/style.css">
 
  <link rel="stylesheet" href="CSS/footer.css">
      
  <style>
      
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
        
        .contain{
          text-align: center;
          
        }
        .contain26{
          display: inline-block;
        }

        .team{
            /* align-items: center; */
            /* text-align: center; */
            padding: 49px 10px;
            /* align-content: center;  */
            position: relative;
            /* margin-left: 100px; */
            /* display: inline-block; */
        }
        .cont29 {
            position: relative;
            width: 50%;
            border-radius: 20px;
        }
        
        .image29 {
          display: block;
          width: 100%;
          height: auto;
        }
        
        .overlay29 {
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          background-color:aliceblue;
          overflow: hidden;
          width: 100%;
          height: 0;
          transition: .5s ease;
          border: 1.5px solid black;
        }
        
        .cont29:hover .overlay29 {
          height: 45%;
        }
        
        .text29 {
          /* color: white; */
          font-size: 20px;
          position: absolute;
          top: 50%;
          left: 50%;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
          text-align: center;
        }
        .one_row{
          display: flex;
	        justify-content: center;
	        -ms-align-items: center;
	        align-items: center;
          padding: 0px 20px;
        }
        .list-unstyled li a:hover{
          color:blue;
        }
        
       
        .Tnames{
          margin-left: 67%;
        }
        .footer_nav{
          width: 10%;
          display: inline-block;
          margin-left: 200px;
        }
        .about_members{
          margin-top: 50px;
        }
        
        @media(max-width:747px){
          .Tnames{
           margin-left: -67%;
          }
          .footer_nav{
            display: none;
          }
          .about_members{
            margin-top: 0px;
          }
          .mobile_view{
            margin-left: 100px;
          }
        }
      
        .rounded-circle{border-radius:50%!important}
        .img-fluid{max-width:100%;height:auto}
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
              <a href="index.php"><h1><span>BOOKS</span>help</h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php">Home</a></li>
                <li role="presentation"><a href="BookTransaction/ClearBook.php">Books</a></li>
                <li role="presentation"><a href="AboutUs.php" class="active">About Us</a></li>
                <li role="presentation  "><a href="Help.php">Help</a></li>
                <li role="presentation"><a href="Contact.php">Contact</a></li>
                <?php 
                    if(isset($_SESSION['userid']))
                    {
                      echo '<li role="presentation"><a href="UserProfile.php">'.$_SESSION['user'],'</a></li>';
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
        <li>About Us</li>
      </div>
    </div>
  </div>
   


  <section class="page-section" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About Us</h2>
            <h3 class="section-subheading text-muted">Books are forever</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="Images/Team/1.jpg" alt="">
                </div>
                <div class="timeline-panel about_members">
                  <div class="timeline-heading" style="color: black;">
                    <h4>Janardan Pethani</h4>
                    <h4 class="subheading">Team Leader</h4>
                  </div>
                   <ul class="list-unstyled one_row Tnames"  >
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="Images/Team/kaushal.jpg" alt="">
                </div>
                <div class="timeline-panel about_members" style="color: black;">
                  <div class="timeline-heading">
                    <h4>Kaushal Mistry</h4>
                    <h4 class="subheading">Team : Back-End</h4>
                  </div>
                   <ul class="list-unstyled one_row" style="margin-left:-67%" >
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="Images/Team/3.jpg" alt="">
                </div>
                <div class="timeline-panel about_members">
                  <div class="timeline-heading" style="color: black;">
                    <h4>Jainil Panchal</h4>
                    <h4 class="subheading">Team : Back-End</h4>
                  </div>
                  <ul class="list-unstyled one_row Tnames"  >
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </li>
              <li class="timeline-inverted" style="color: black;">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="Images/Team/4.jpg" alt="">
                </div>
                <div class="timeline-panel about_members">
                  <div class="timeline-heading">
                    <h4>Parth Narodia</h4>
                    <h4 class="subheading">Team: Front-End</h4>
                  </div>
                   <ul class="list-unstyled one_row" style="margin-left:-67%" >
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </li>
                <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="Images/Team/5.jpg" alt="">
                </div>
                <div class="timeline-panel about_members">
                  <div class="timeline-heading" style="color: black;">
                    <h4>Marvin Raval</h4>
                    <h4 class="subheading">Team: Documentation and Front-End</h4>
                  </div>
                   <ul class="list-unstyled one_row Tnames"  >
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </li>
                <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="Images/Team/4.jpg" alt="">
                </div>
                <div class="timeline-panel about_members" style="color: black;">
                  <div class="timeline-heading">
                    <h4>Bhavesh Varma</h4>
                    <h4 class="subheading">Team : Back-End</h4>
                  </div>
                   <ul class="list-unstyled one_row mobile_view" style="margin-left:-67%" >
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" style="padding: 3px 20px;"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
              </li>
              <li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Mentor
                    <br>Dr. Mayur M Vegad
                    <br>BVM</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>


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
