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

//fetch_user.php

include('database_connection.php');

//session_start();

$query = "
SELECT * FROM users 
WHERE uid != '".$_SESSION['userid']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped" style="color:black;">
 <tr style="color:black;font-weight: bold;">
  <th>Username</th>
  <th>Status</th>
  <th>Action</th>
 </tr>
';

foreach($result as $row)
{
 $status = '';
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['uid'], $connect);
 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="label label-success">Online</span>';
 }
 else
 {
  $status = '<span class="label label-danger">Offline</span>';
 }
 $output .= '
 <tr>
  <td>'.$row['uname'].' '.count_unseen_message($row['uid'], $_SESSION['userid'], $connect).'</td>
  <td>'.$status.'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['uid'].'" data-tousername="'.$row['uname'].'">Start Chat</button></td>
 </tr>
 ';
}

// $output .= '</table>';
// $sql = "SELECT user_id FROM login where username='$f'";
// $a = mysqli_query($con,$sql);
// $array = mysqli_fetch_assoc($a);
     
echo $output;

?>