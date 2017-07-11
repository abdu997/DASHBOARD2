<?php
include "connection.php";

$user_id = $_SESSION['user_id'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "INSERT INTO chatrooms (chatroom_name) 
// VALUES ('".$"chatroom_name"]."')";


//  $chatroom_name = $_POST['chatroom_name'];
//  $query = "INSERT INTO `chatrooms` (`chatroom_name`) VALUES ('$chatroom_name');";
//
//  mysql_query($query);

    $statement = $mysqli->prepare("INSERT INTO chatrooms (chatroom_id, chatroom_name, team_id) VALUES(,$chatroom_name)"); //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('sss', $u_name, $u_email, $u_text); //bind values and execute insert query

?>