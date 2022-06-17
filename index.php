<?php
  session_start();
  define('DB_SERVER', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'final_bookshelp');

  $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
  if(!$connection){
    die("Connection Failed".mysqli_connect_error());
  }
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BooksHelp</title>

        <link rel="icon" type="image/png" href="Images/PageIcons/home.ico"/>

        <!--Home Page Animation-->
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/font-awesome.min.css">
        <link rel="stylesheet" href="CSS/animate.css">
        <link rel="stylesheet" href="CSS/prettyPhoto.css">
        <link rel="stylesheet" href="CSS/style.css">

        <link rel="stylesheet" href="CSS/footer.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="CSS/home/slider.css">
                
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	  	  <script type="text/javascript">
	        google.charts.load('current', {'packages':['corechart']});
	        google.charts.setOnLoadCallback(drawChart);
	        google.charts.setOnLoadCallback(drawChart1);

	        function drawChart() {
	          var data = google.visualization.arrayToDataTable([
	            ['date', 'no of books'],
    	  		   <?php 	  			 
        	  		  $query4 = "SELECT * FROM books order by upload_date desc"; 
        	  		  $run4=mysqli_query($connection, $query4); 
        	  		  $array4=mysqli_fetch_assoc($run4);
        	  		  $last_date=$array4['upload_date'];
        	  		  //echo $last_date;
        	  		  
        	  		  $query5 = "SELECT * FROM books order by upload_date asc"; 
        	  		  $run5=mysqli_query($connection, $query5); 
        	  		  $array5=mysqli_fetch_assoc($run5);
        	  		  $first_date=$array5['upload_date'];
        	  		  //echo $first_date;
        	  		
        	  		  $start = strtotime($first_date);
        	  		  $end = strtotime($last_date);
        	  		  $days_between = ceil(abs($end - $start) / 86400);
        	  		  //echo $days_between;
        	  		  
        	  		  $interval = ceil($days_between / 5) ;  
        	  		  $skip=0;
        	  		  $date=$first_date;
          	  		$temp=false;
          	  		while($skip <=5)
          	  		{
          	  		  if(($date > $last_date))
          	  		  {
          	  			  $date = $last_date;
          	  			  $temp=true;
          	  		  }   
          	  		  $query2 = "SELECT * FROM `books` WHERE DATE_FORMAT(STR_TO_DATE(`upload_date`, '%Y-%m-%d'), '%Y-%m-%d') <= DATE_FORMAT(STR_TO_DATE('$date','%Y-%m-%d'), '%Y-%m-%d')";  
          	  		  $run2 = mysqli_query($connection, $query2); 
          	  		  $row2 = mysqli_num_rows($run2);
          	  		  //print " ".$row2." "; 	
          	  			if($temp || ($skip == 5)){
          	  				echo "['".$date."',".$row2."]"; 
                    } else{
          	  				echo "['".$date."',".$row2."],";
                    }
          	  		   //DATE_ADD($date, INTERVAL $interval DAY);
          	  		  $date=date('Y-m-d', strtotime($date. ' + '.$interval.' days'));
          	  		  $skip=$skip+1;
          	  		  if($temp){
          	  			   break;
          	  		  }
          	  		 }
    	  		     ?>	
    	          ]);

    	          var options = {
    	            title: 'book',
    	            curveType: 'function',
    	            legend: { position: 'bottom' }
    	          };
    	          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
    	          chart.draw(data, options);
  	        }
	          function drawChart1() {
  	          var data1 = google.visualization.arrayToDataTable([
  	            ['department', 'no of books']
    	  		   <?php 
    	  		  
    	            $query9 ="SELECT * from department";
    	            $run5=mysqli_query($connection, $query9);
    	              
    	              
    	  		      while($array4=mysqli_fetch_assoc($run5))
    	            {   
                      echo ",";
    	                $query10="SELECT count(bname) as no_of_books from books where dept = '".$array4['did']."'";
    	                $run6=mysqli_query($connection, $query10);
    	                $array5=mysqli_fetch_assoc($run6);
    	                  
    	                echo "['".$array4['dname']."',".$array5['no_of_books']."]";  
    	            }
    	              
    	         ?>
  	           ]);
  	           var options1 = {
  	              title: 'departmentwise',
  	              pieHole: 0.4,	   
  	           };
  	          var chart1 = new google.visualization.PieChart(document.getElementById('curve_chart1'));
  	          chart1.draw(data1, options1);
	          }
	    </script>

      <style>
        .book{
          /* align-items: center; */
          text-align: center;
          padding: 49px 20px;
          align-content: center; 
        }
        .container26{
          box-shadow: 0 0 35px rgba(0,0,0,0.1);
          padding: 20px 30px;
          /* text-align: center; */
          /* position:relative; */
          display: inline-block;
          text-align: justify;
          width: 60%;
          border-radius: 10px;
        }
        .container26::before{
          color: #71c55d;
          content: "";
          display: inline-block;
          font: 70px/1 FontAwesome;
          position: absolute;
          right: 43px;
          /* text-align: left; */
          top: -29px;
        }
        .container26 h2{
            text-align: center;
            color: green;
            font-family: fantasy;
            margin-bottom: 15px;
        }
        .container26 p{
          text-align: justify;
          color: gray;
          font-size: 18px;
          font-family: monospace;
        }

        #curve_chart{
          width: 50%; height: 500px;display:inline-block;
        }
        #curve_chart1{
          width: 49%; height: 500px;display:inline-block;
        }
        a[ class="btn-slide animation animated-item-3" ]:target ~ #start .book {
            -webkit-transform: translateY( 0px);
            transform: translateY( 0px );
        }
        #img-res{
            display: block;
            max-width: 100%;
            height: auto;
        }

        .footer_icon{
          width:20%;
          display: inline-block;
        }
        .footer_nav{
          width: 10%;
          display: inline-block;
          margin-left: 200px;
        }


        @media(max-width:767px){
              .book{
                  padding-left: 0px;
                  padding-right: 0px;
              }
              .container26{
                  width: 80%;
              }
              #curve_chart{
                /*margin:0% 0%;*/
                width: 100%; 
                height: 350px;                
                display:block;
              }
              #curve_chart1{
                /*margin:0% 5%;*/
                width: 100%; 
                height: 350px;
               /* display:inline-block;*/
              }
              .footer_nav{
                display: none;
              }
          }
      </style>
</head>
<body> <!-- onload="drawChart();drawChart1()"> -->



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
                      <a href="index.php"><h1><span>Books</span>Help</h1></a>
                    </div>
                  </div>
        
                  <div class="navbar-collapse collapse">
                    <div class="menu">
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="index.php" class="active">Home</a></li>
                        <li role="presentation"><a href="BookTransaction/ClearBook.php">Books</a></li>
                        <li role="presentation"><a href="AboutUs.php">About Us</a></li>
                        <li role="presentation  "><a href="Help.php">Help</a></li>
                        <li role="presentation"><a href="Contact.php">Contact</a></li>
                        
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

    <section id="main-slider" class="no-margin">
            <div class="carousel slide">
              <div class="carousel-inner">
                <div class="item active" style="background-image: url(Images/Backgrounds/Home_BG.jpg)">
                  <div class="container">
                    <div class="row slide-margin">
                      <div class="col-sm-6">
                        <div class="carousel-content">
                          <h2 class="animation animated-item-1">Welcome to <span style="color: chartreuse">BooksHelp</span></h2>
                          <p class="animation animated-item-2" style="color:white;"><b>So many books, so little time...</b></p>
                          <a class="btn-slide animation animated-item-3" href="#start">Let's start</a>
                        </div>
                      </div>
        
                      <div class="col-sm-6 hidden-xs animation animated-item-4">
                        <div class="slider-img" style="margin-left:200px;margin-top:100px;">
                        <img src="Images/Backgrounds/books1.png"   id="img-res" width="300" height="380">
                        </div>
                      </div>
        
                    </div>
                  </div>
                </div>
                <!--/.item-->
              </div>
              <!--/.carousel-inner-->
            </div>
            <!--/.carousel-->
    </section>
    <!--/#main-slider-->

    <div class="book" id="start">

              <div class="container26">
                        <h2>Books</h2>
                        <p>Books play a significant role in our life. 
                            They say that “When you open a book, you open a new world”. 
                            I believe that everyone would agree with this statement as books have become inevitable to mankind. 
                            For the majority of people, books are part of their everyday life.  
                            A book is like a best friend who will never walk away from you.
                            A book communicates knowledge, and not only knowledge but wisdom of all kinds. 
                            They say that “The more you read, the more well-read you are”. 
                            In simple terms what this means is that the more you read the more exposed you are, your attitudes, your ideas and your imagination changes. 
                            I believe that my personality, behaviour, ideas and knowledge are all built on the books I have read. Nothing can add to our intellect more than reading a book.</p>
              </div>

    </div>
    
    <!-- =============================Charts ========================================= -->
  
    <div id="curve_chart" ></div>
    <div id="curve_chart1"></div>
    

<!--=============================SLIDER================================================-->
    <div class="slideshow26">

      <div class="myslide26">
        <q>A room without books is like a body without a soul.</q>
        <p class="author26"> Marcus Tullius Cicero</p>
      </div>
      
      <div class="myslide26">
        <q>Books are the quietest and most constant of friends; they are the most accessible and wisest of counselors, and the most patient of teachers.</q>
        <p class="author26"> Charles W. Eliot</p>
      </div>
      
      <div class="myslide26">
        <q>So many books, so little time.</q>
        <p class="author26"> Frank Zappa</p>
      </div>
      
      <a class="prev26" onclick="plusSlides(-1)">❮</a>
      <a class="next26" onclick="plusSlides(1)">❯</a>
      
      </div>
      
      <div class="dotc26">
        <span class="dot26" onclick="currentSlide(1)"></span> 
        <span class="dot26" onclick="currentSlide(2)"></span> 
        <span class="dot26" onclick="currentSlide(3)"></span> 
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
 
      <script src="JS/home/slider.js"></script>

</body>
</html>