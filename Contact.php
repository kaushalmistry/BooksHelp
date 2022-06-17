<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>BooksHelp | Contact</title>
  <link rel="icon" type="image/png" href="Images/PageIcons/contactus.png"/>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/animate.css">
  <link rel="stylesheet" href="CSS/prettyPhoto.css">
  <link rel="stylesheet" href="CSS/style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
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
        .footer_nav{
          width: 10%;
          display: inline-block;
          margin-left: 200px;
        }
        @media (max-width: 767px){
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
              <a href="index.php"><h1><span>BOOKS</span>help</h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php">Home</a></li>
                <li role="presentation"><a href="Book.php">Books</a></li>
                <li role="presentation"><a href="AboutUs.php">About Us</a></li>
                <li role="presentation  "><a href="Help.php">Help</a></li>
                <li role="presentation"><a href="Contact.php" class="active">Contact</a></li>
                                        <?php 
                        if(isset($_SESSION['userid'])) /*&& $_SESSION['logged']==true*/
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
        <li>Contact Us</li>
      </div>
    </div>
  </div>

  <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14735.861381515027!2d72.92684302923561!3d22.580399412858625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e4e5b3d62de8b%3A0x7981471bedf57ae0!2sLambhvel%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1570279607522!5m2!1sen!2sin" width="100%" height="380" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div> 
  <br>
<section id="contact-page">
    <div class="container">
      <div class="center">
        <h2>Contact</h2>
        <h3>Drop Your Message</h3>
        <p>We Welcome Your Precious Feedback.. :) Kindly Share It With Us... </p>
      </div>
      <div class="row contact-wrap">
        <div class="status alert alert-success" style="display: none"></div>
        <div class="col-md-6 col-md-offset-3">
          <form action="message.php" method="post" role="form" class="contactForm" enctype="text/plain">
            <div class="form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" id="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button></div>
            <div id="sendmessage" style="display: none;">Your message has been sent. Thank you!</div>
            <div id="errormessage" style="display: none;">Thank you</div>
          </form>
        </div>
      </div>
      <!--/.row-->
    </div>
    <!--/.container-->
  </section>
  <!--/#contact-page-->


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
  <script src="JS/contactform/contactform.js"></script>

</body>

</html>
