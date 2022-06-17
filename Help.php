<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <title>BooksHelp | Help</title>
  <link rel="icon" type="image/png" href="Images/PageIcons/help.png"/>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/animate.css">
  <link rel="stylesheet" href="CSS/prettyPhoto.css">
  <link rel="stylesheet" href="CSS/style.css">
  <!-- <link href="CSS/icofont/icofont.min.css" rel="stylesheet"> -->
  <link href="CSS/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- <link href="CSS/venobox/venobox.css" rel="stylesheet"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="CSS/footer.css">

    <style>

        /*<!-- FAQs Section  -->*/
        section {
          padding: 60px 0;
          overflow: hidden;
        }

        .section-title {
          text-align: center;
          padding-bottom: 30px;
        }

        .section-title h2 {
          font-size: 13px;
          letter-spacing: 1px;
          font-weight: 700;
          padding: 8px 20px;
          margin: 0;
          background: #f3f8ec;
          color: #8fc04e;
          display: inline-block;
          text-transform: uppercase;
          border-radius: 50px;
        }

        .section-title h3 {
          margin: 15px 0 0 0;
          font-size: 32px;
          font-weight: 700;
        }

        .section-title h3 span {
          color: #1BBD36;
        }

                /*--------------------------------------------------------------
        # F.A.Q
        --------------------------------------------------------------*/
        .faq {
          background: #f5faf0;
        }

        .faq .section-title h2 {
          background: #e9f3dd;
        }

        .faq .faq-list {
          padding: 0 100px;
        }

        .faq .faq-list ul {
          padding: 0;
          list-style: none;
        }

        .faq .faq-list li + li {
          margin-top: 15px;
        }

        .faq .faq-list li {
          padding: 20px;
          background: #fff;
          border-radius: 4px;
          position: relative;
        }

        .faq .faq-list a {
          display: block;
          position: relative;
          font-family: "Poppins", sans-serif;
          font-size: 16px;
          line-height: 24px;
          font-weight: 500;
          padding: 0 30px;
          outline: none;
        }

        .faq .faq-list .icon-help {
          font-size: 24px;
          position: absolute;
          right: 0;
          left: 20px;
          color: #cbe1ac;
        }

        .faq .faq-list .icon-show, .faq .faq-list .icon-close {
          font-size: 24px;
          position: absolute;
          right: 0;
          top: 0;
        }

        .faq .faq-list p {
          margin-bottom: 0;
          padding: 10px 0 0 0;
        }

        .faq .faq-list .icon-show {
          display: none;
        }

        .faq .faq-list a.collapsed {
          color: #343a40;
        }

        .faq .faq-list a.collapsed:hover {
          color: #8fc04e;
        }

        .faq .faq-list a.collapsed .icon-show {
          display: inline-block;
        }

        .faq .faq-list a.collapsed .icon-close {
          display: none;
        }

        @media (max-width: 1200px) {
          .faq .faq-list {
            padding: 0;
          }
        }

        /*End of section FAQs*/
    
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
        
        .topic-list{
          padding-bottom: 8px;
          font-size: 23px;
        }
        
        .query{         
          float: right;
          margin-top: 2%;
          margin-left: 10%;
          width: 50%;
          background-color: transparent;
        }

        .query1{     
          float: left;
          margin-top: 2%;
          margin-left: 10%;
          width: 50%;
          margin-bottom: 10%;
          background-color: transparent;
        }
        .data1{
          color: white;
          text-shadow:1px 1px 1px green;
        }
        
        .queryimage{
          width:30%; 
          margin-top: 2%;
          margin-left: 10%;
          border-radius: 10px;        
          float: left;
          -webkit-box-shadow: 0 0 10px #fff;
          box-shadow: 0 0 10px #fff;
          border: 1px solid black;          
        }
        .queryimage2{
          width:30%; 
          margin-top: 2%;
          margin-right: 10%;
          border-radius: 10px; 
          float: right;
          -webkit-box-shadow: 0 0 10px #fff;
          box-shadow: 0 0 10px #fff;
          border: 1px solid black;
        }
        .q11{
          background-color: transparent;
          margin-bottom: 5%;
          height: 30%;
          width: 100%;
          display: inline-block;
          position: relative;
        }
        .q21{
          background-color: transparent;
          margin-bottom: 5%;
          height: 30%;
          width: 100%;
          display: inline-block;
          position: relative;
        }
        
        .footer_nav{
          width: 10%;
          display: inline-block;
          margin-left: 200px;
        }
        
      
        @media screen and (max-width: 767px) {
            .topic-list{
              font-size: 1.5rem;
            }
            .data1{
              font-size: 1rem;
              color: white;
              text-shadow:0.5px 0.5px 0.5px white;
            }
            .query{
              margin-top: 0%;     
            }
            .query1{
              margin-top: 0%;
            }
            .queryimage{
              -webkit-box-shadow: 0 0 5px #fff;
              box-shadow: 0 0 5px #fff;
              height: 180px;
            }
            
            .queryimage2{
              -webkit-box-shadow: 0 0 5px #fff;
              box-shadow: 0 0 5px #fff;
              height: 150px;
            }
            .footer_nav{
              display: none;
            }
           
        }        
        
        .base1{
            height: 100%;
            width: 100%;
            background-color: white;
            color: black;
            background-image:  url(Images/Backgrounds/helpback.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;               
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
                <li role="presentation  "><a href="Help.php" class="active">Help</a></li>
                <li role="presentation"><a href="Contact.php" >Contact</a></li>
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
        <li>Help</li>
      </div>
    </div>
  </div>

      <div class="row" style="background: #08012e;width: 103.5%;">
          <div class="col-lg-12 text-center" style="background: #08012e;">
            <h2 class="section-heading text-uppercase" style="font-size: 35px;color:white;text-shadow:2px 2px 2px white;">Help </h2>
          
          </div>
      </div>
  
    <div class="base1">
    
        <div class="q11">
    
        <img src="Images/Help/uploadBook.PNG" class="queryimage">
        <div class="query">
        <h2 class="data1">How to Upload a book</h2>
        <h3 class="data1">* In order to upload books user have to be logged in. </h3>
        <h3 class="data1">* After Log in you can upload book directly from your profile or from books section.</h3>
        <h3 class="data1">* User must enter all required details about books to upload.</h3>
        <h3 class="data1">* After successful uploading, you can see the book in your profile section.</h3>
        
             </div>
        </div>
        
        
      <div class="q21">
          <img src="Images/Help/updateBook.PNG" class="queryimage2">
        <div class="query1">
        <h2 class="data1">How to Update book details</h2>
        <h3 class="data1">* In order to update book details user have to be logged in. </h3>
        <h3 class="data1">* After Log in you can update you book's details from your profile section.</h3>
        <h3 class="data1">* You can also delete the book from the same section.</h3>
        <h3 class="data1">* And that's it! You can see the changes. Hurray.</h3>
        
        
        </div>
        </div>
        
    </div>
    
        <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="zoom-in">
          <h2>F.A.Q</h2>
          <h3>FAQs about the <span>BooksHelp</span></h3>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapsed" href="#faq-list-1">How to upload book? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse" data-parent=".faq-list">
                <p>
                  You will find an option saying "upload book for sharing" in book section as well as in your profile section. From there you can upload book easily.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Which are the options available for sharing a book? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                <p>
                    Currently, we have included three option for sharing. User can sell his book or donate to needful or he can share his book for some predefined time like, 15 days or months(We can say one type of library).  
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">How the transaction will occure? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                <p>
                  We are providing a platform where users can upload their unused books and also can search for the book of their interest. You can say we are the bridge. Users can see the book and the details of book holder. If book holder finds it worthy to give the book then he can accept the request from his profile section. And then after the receiver has to take the book from the holder in person.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">What to do if i want any book? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                <p>
                  While browsing through all the books if you find a book that you want then, there is an option given for that specific book saying "Want this Book". You have to click that option and then the request will be sent to the holder of the book. Then after you both can have chat or if you know each other then you can also talk in person. And if owner accepts your request then you can get that book.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">What if I want to take my request back? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                <p>
                  You can always take back your request from your profile section. There you will find the book in which you have shown interest in the section. There is the option saying "Cancel request".
                </p>
              </div>
            </li>
            
            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-6" class="collapsed">How will I know that some user is interested in my book? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-6" class="collapse" data-parent=".faq-list">
                <p>
                  At first you will receive an email stating all the details about the request. And you can check it in your profile section. Then it is up to you to allow or decline the request. You will find appropriate option there.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-7" class="collapsed">For how much time I can borrow or lend any book? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-7" class="collapse" data-parent=".faq-list">
                <p>
                  Currently, we have provided 3 options to borrow or lend the book. Those are 15 days, 1 Month or 6 Months. The owner user of the book will decide that for how much time he want to lend his book.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End F.A.Q Section -->    
    
    
    
    
    
    
    
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
