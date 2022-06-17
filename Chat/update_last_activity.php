
<?php

//update_last_activity.php

include('database_connection.php');

session_start();

$query = "
UPDATE login_details 
SET last_activity = now() 
WHERE login_details_id = '".$_SESSION["login_details_id"]."' AND uid = '".$_SESSION['userid']."'
";

$statement = $connect->prepare($query);

$statement->execute();

?>