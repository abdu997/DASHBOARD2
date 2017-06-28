
<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);
//echo 'Current PHP version: ' . phpversion();
//require_once('../lib/password.php');

include "connection.php";
session_start();
	
	if(isset($_POST['message']) && isset($_POST['sender'])){
		$message = $_POST['message'];
		$sender = $_POST['sender'];
        
	}

	  $message = mysqli_real_escape_string($conn,$_POST['message']);
      $sender = mysqli_real_escape_string($conn,$_POST['sender']); 
      

	

	$sql = "INSERT INTO chat_log (message,sender,team_id) VALUES ('$message', '$sender','$teamid' )";
	if(mysqli_query($conn, $sql)){
        echo "OK";
    }
	


	

	
?>