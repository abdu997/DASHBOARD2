<?php
include "connection.php";

session_start();


$user_id = $_SESSION['user_id'];
$tid = $_SESSION['team_id'];




if(isset($_POST['chatroom_name'])){
    $chatroom_name = $_POST['chatroom_name'];
    $chatroom_name = mysqli_real_escape_string($conn,$_POST['chatroom_name']);
}
else{
       echo "Something went wrong with post";
   }
   
   $abdul = "INSERT INTO chatrooms (chatroom_name,team_id) VALUES ('$chatroom_name', '$tid')";
   if(mysqli_query($conn, $abdul)){
       header("Location: ../chat.php");
   }
   else{
       echo "error";
   }
   
   


?>