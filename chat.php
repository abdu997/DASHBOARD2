<?php
session_start();
include "php/connection.php";

if(!isset($_SESSION['name'])){
header('Location: login.php');
}

if(isset($_GET['teamname'])){
    $teamname = $_GET['teamname'];
    $sql = "SELECT team_id FROM `team` WHERE team_name = '$teamname'";
    $result2 = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($result2);
    $team_id = $row2['team_id'];
}

?>
<!DOCTYPE html>

<html lang="en">
    <script src="js/angular.min.js"></script>
    <div w3-include-html="head.html"></div>
    <body>
        <div id="wrapper">
            <div><?php include "nav_bar.php"; ?></div>
            <div id="chat" style="margin-left:50px">
            <div class="panel-head">
                <button id="chat-toggle">Show Chats</button>    
            </div>
        <div class="panel" ng-app="ChatSystem" ng-controller="ChatController" >
            <div id="clist">
                <div class="search-chat">
                    <input placeholder="Search Chatroom" style="width:200px" ng-model="chatSearch">
                    <ul>
                        <li class="chat"><i class="fa fa-plus"></i> Add Chatroom
                        </li>
                    </ul>
                </div>
                <div style="margin-top: 80px">
                    <ul ng-repeat="x in chatrooms | filter: chatSearch | unique: 'chatroom_name'">
                        <li class="chat">{{x.chatroom_name}}</li>
                    </ul>
                </div>

            </div>
            <ul>
                <li class="smessage">
                    <span class="sender">Abdul</span>
                    <span class="time">6:00pm</span>
                    <br>
                    <span class="message">Hello, how are you?</span>
                </li>
            <li class="rmessage">
                <span class="receiver">Yousef</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shut up!</span>
            </li>
        </ul>
    </div>
    <div class="panel-foot">
        <form>
            <input class="message-input"  placeholder="Type message here..." required>
            <input type="submit">
        </form>
    </div>
    </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/w3data.js"></script>
    <script>
w3IncludeHTML();
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $("#chat-toggle").click(function(e) {
            e.preventDefault();
            $("#clist").toggleClass("chat-list");
        });

    </script>
    <script src="js/chat.js"></script>

</body>

</html>
