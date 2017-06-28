
<?php

ini_set('display_errors', 1); 
error_reporting(E_ALL);
//echo 'Current PHP version: ' . phpversion();
//require_once('../lib/password.php');

include "connection.php";
session_start();
 
      
$tid = $_SESSION['team_id'];

 if(!isset($_POST['functionname'])){
     if($_POST['functionname'] == 'updateChatLog'){
         updateChatLog();
     }
 }
	
function updateChatLog(){
    $sql = "SELECT message,sender,time FROM chat_log WHERE team_id = $team_id ORDER BY time DESC ";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0) {
        header("content-type: application/json");
        echo json_encode($rows);
    }
    
}

	

	
?>