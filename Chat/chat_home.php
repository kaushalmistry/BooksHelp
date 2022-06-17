<!--
//index.php
!-->
<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'final_bookshelp');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
  die("Connection Failed".mysqli_connect_error());
}

session_start();
$iid = $_POST['chat_index'];
if ($iid != '-1'){
  $_SESSION['chat_id'] = $iid;
} else {
  // setcookie('chat_id',);
  unset($_SESSION['chat_id']);
}
include('database_connection.php');

?>

<!DOCTYPE html>
<html>
  <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BooksHelp | Chat</title>
        <link rel="icon" type="image/png" href="../Images/PageIcons/chat.png"/>

        <!--Home Page Animation-->
        <link rel="stylesheet" href="../CSS/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="../CSS/font-awesome.min.css"> -->
        <!-- <link rel="stylesheet" href="../CSS/animate.css"> -->
        <!-- <link rel="stylesheet" href="../CSS/prettyPhoto.css"> -->
        <link rel="stylesheet" href="../CSS/style.css">

        <link rel="stylesheet" href="../CSS/footer.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- <link rel="stylesheet" href="../CSS/home/slider.css"> -->

        <!-- <title>Chat Application using PHP Ajax Jquery</title>   -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <style type="text/css">
          .footer_nav{
            width: 10%;
            display: inline-block;
            margin-left: 200px;
          }
          @media screen and (max-width: 767px){
            .footer_nav{
              display: none;
            }
          }
        </style>
  </head>  
  <body>  

    <!-- Navigation Bar -->
    <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="z-index: 0;">
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
                        <li role="presentation"><a href="../index.php">Home</a></li>
                        <li role="presentation"><a href="../Book.php">Books</a></li>
                        <li role="presentation"><a href="../AboutUs.php">About Us</a></li>
                        <li role="presentation  "><a href="../Help.php">Help</a></li>
                        <li role="presentation"><a href="../Contact.php">Contact</a></li>
                        
                        <?php 
                        if(isset($_SESSION['userid'])) /*&& $_SESSION['logged']==true*/
                        {
                          echo '<li role="presentation"><a href="../UserProfile.php" class="active">'.$_SESSION['user'],'</a></li>';
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
        <li>Profile</li>
        <li>Chat</li>
      </div>
    </div>
  </div>

  <div class="container">
     <br/>     
     <h3 align="center">Let's Chat!!</a></h3>

     <?php
      if (isset($_SESSION['chat_id'])){
          echo "Set";
      } else {
         echo "Not set";
      }
     ?>
     
     <div class="table-responsive">
      <h4 align="center">Users you can chat with.</h4>
      <p align="right">Hi - <?php echo $_SESSION['user']; ?>
      <div id="user_details"></div>
      <div id="user_model_details" style="z-index: 1;"></div>
     </div>
  </div>

<br/><br/><br/>
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


</body>  
</html>  




<script>  
$(document).ready(function(){
  fetch_user();
  setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
 }, 5000);

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }

 function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
 });

 $(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 });

 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog').dialog('destroy').remove();
 });
 
});  
</script>