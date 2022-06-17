<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>

    <title>BooksHelp | Book Upload</title>
    <link rel="icon" type="image/png" href="../Images/PageIcons/upload.png"/>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--Home Page Animation-->
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/animate.css">
    <link rel="stylesheet" href="../CSS/prettyPhoto.css">
    <link rel="stylesheet" href="../CSS/style.css">

    <link rel="stylesheet" href="../CSS/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../CSS/home/slider.css">

    <style>
      .upload{
        text-align: center;

        width: 50%;
        margin-left: 25%;
      }
      .update1{
        text-align: center;
        padding:0px 20px;
        font-weight: 100px;
      }
      .updateinput{
        min-width: 350px;
        height: 40px;
        border:1px solid grey; 
      }
        #branch{
             min-width: 350px;
        height: 40px;
        border:1px solid grey; 
            margin-left:4.6%;
            
        }
        
        pre{
            border: 1px solid black;
        }
        .referpoint{
          margin-left: 25%;
          color: black;
        }
        .footer_nav{
          width: 10%;
          display: inline-block;
          margin-left: 200px;
        }

        @media screen and (max-width: 767px){
            #branch{
               margin-left: 22px;
                min-width: 100px;
                height: 20px;
                
            }
            .update1{
                font-size: 11px;
                padding: 0px;
                font-weight: bold;
                margin-top: -15px;
             
                

            }
            .updateinput{
                min-width: 100px;
                height: 20px;
                
            }
            .upload{
                width: 95%;
                margin-left: 2.5%;
            }
            .br{
                margin-left: -5%;
            }
            .imgblock{
                margin-left: 18%;
            }

            .referpoint{
              margin-left: 2%;
              color: black;
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
                      <a href="../index.html"><h1><span>Books</span>Help</h1></a>
                    </div>
                  </div>
        
                  <div class="navbar-collapse collapse">
                    <div class="menu">
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="../index.php" >Home</a></li>
                        <li role="presentation"><a href="../Book.php" class="active">Books</a></li>
                        <li role="presentation"><a href="../AboutUs.php">About Us</a></li>
                        <li role="presentation  "><a href="../Help.php">Help</a></li>
                        <li role="presentation"><a href="../Contact.php">Contact</a></li>
                         <?php 
                        if(isset($_SESSION['userid']) /*&& $_SESSION['logged']==true*/)
                        {
                          echo '<li role="presentation"><a href="../UserProfile.php">'.$_SESSION['user'],'</a></li>';
                          echo '<li role="presentation"><a href="../User/UserSignOut.php">Sign Out</a></li>';
                        }
                        else
                        {
                          echo '<li role="presentation"><a href="../User/UserLogin.php">Log In</a></li>';
                          echo '<li role="presentation"><a href="../User/UserSignUp.php">Sign Up</a></li>';
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
            <li><a href="../index.php">Home</a></li>
            <li>Books</li>
            <li>Upload Book</li>
        </div>
        </div>
    </div>


    <h2 style="color:green;text-align: center;padding:20px 0px;">Upload a Book to Help other </h2>

    <div class="referpoint">
      <h4>Refer Some points before uploading</h4>
      <ul>
        <li>Please enter all details carefully to help our database.</li>
        <li>Please enter Book Name, Author Name carefully.</li>
        <li>Select appropriate option as per your convenient.</li>
        <li>Select Donate if you want to donate your book to needy one.</li>
        <li>Select Time Share if you want to give your book for some predefined time.</li>
        <li>Select Sell if you want to sell your book. If your book is used then you can sell it at 60% of its price.</li>
      </ul>
    </div>

    <form action="DataBaseInteraction/InsertUploadBook.php" name="book" method="POST" class="upload" enctype="multipart/form-data"><pre>
        <h4 class="update1"> Book Name         :    <input class="updateinput" type="text" name="bname" placeholder="Enter Book Name" required><br/></h4>
        <h4 class="update1"> Author Name       :    <input class="updateinput" type="text" name="aname" placeholder="Author Name of Book" required><br/></h4>
        <h4 class="update1"> Subject           :    <input class="updateinput" type="text" name="sub" placeholder="Book belong to which subject" required><br/></h4>
        <h4 class="update1 br"> Related-Branch    :<select id="branch" name="branch" >
        <option value="Computer/IT">Computer/IT/CSE</option>
        <option value="Mechanical">Mechanical</option>
        <option value="Civil">Civil</option>     
        <option value="Production">Production</option>   
        <option value="Electrical">Electrical</option>
        <option value="Ele & Comm">Ele & Comm</option>
        <option value="Other">Other</option>        
       </select></h4>
      <h4 class="update1">Sharing Option    :   <input type="radio" checked="true" id="book_option1" name="donate" value="donated" onclick="checkDonate()"> <label for="book_option1">Donate</label>  <input type="radio" id="book_option2" name="donate" value="sharing" onclick="checkDonate()"> <label for="book_option2">Time Share</label>  <input type="radio" id="book_option3" name="donate" value="selling" onclick="checkDonate()"> <label for="book_option3">Sell</label>
      </h4>
       <div id="pricediv" style="display: none;">
        <h4 class='update1'> Price             :    <input class='updateinput' type='number' id="price" name='price' placeholder='60% price of original price' value="0" required></h4>
       </div>
        <h4 class="update1 imgblock">Book's Photo      :    <input style="text-align:center;display: inline-block;" type="file" name="pic" accept="image/*" required></h4><br/>
        
        </pre>
        <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Upload Book</button></div><br>


    </form>


  <!-- Footer -->
  <footer class="footer-distributed">

    <div class="footer-left footer_icon">      
      <div class="navbar-brand">
        <a href="../index.php"><h1><span>BOOKS</span>HELP</h1></a>
      </div>

      <p class="footer-links footer_nav" style="margin-left: 100px;">
        <a href="../index.php">Home</a>
        <br/><br/>
        <a href="../Book.php">Books</a>
        <br/><br/>
        <a href="../AboutUs.php">About</a>
        <br/><br/>
        <a href="../Contact.php">Contact</a>     
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
      <script src="../JS/jquery.min.js"></script>
      <script src="../JS/jquery-migrate.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../JS/bootstrap.min.js"></script>
      <script src="../JS/jquery.prettyPhoto.js"></script>
      <script src="../JS/jquery.isotope.min.js"></script>
      <script src="../JS/wow.min.js"></script>
      <script src="../JS/functions.js"></script>


    <script>
      function checkDonate(){
          if(document.getElementById('book_option1').checked){
            document.getElementById('pricediv').style.display = "none";
            document.getElementById('price').value = 0;
          }
          else if(document.getElementById('book_option2').checked){
            document.getElementById('pricediv').style.display = "none";
            document.getElementById('price').value = 0;
          }
          else if(document.getElementById('book_option3').checked){
            document.getElementById('pricediv').style.display = "block";
            document.getElementById('price').value = null;
          }
      }
    </script>
</body>
</html>