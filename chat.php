<?php
session_start();
include "php/connection.php";
include "php/chatroom.php";

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

<html lang="en" ng-app="ChatSystem" ng-controller="ChatController">
    <script src="js/angular.min.js"></script>
    <div w3-include-html="head.html"></div>
    <body>
                <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Create Chatroom</h4>
                    </div>
                    <div class="modal-body">
                        <form action="php/chatroom.php" method="post">
                            <div class="form-group">
                                <label>Chatroom Name:</label>
                                <input type="text" class="form-control" name="chatroom_name" required>
                            </div>
                            <p>Pick members to be added into new chatroom</p>
                            <div class="checkbox" ng-repeat="x in members">
                                <label>
                                    <input type="checkbox" name="chatroom_members"> {{ x }}
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="wrapper">
             <div><?php include "nav_bar.php"; ?></div>
            <div id="chat" style="margin-left:50px">
            <div class="panel-head">
                <button id="chat-toggle">Show Chat Rooms</button> 
            </div>
        <div class="panel" id="scroll">
            <div id="clist" class='chat-list'>
                <div class="search-chat">
                    <input placeholder="Search Chatroom" style="width:200px" ng-model="chatSearch">
                    <ul>
                        <li class="chat" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Chatroom
                        </li>
                    </ul>
                </div>
                <div style="margin-top: 90px">
                    <ul ng-repeat="x in chatrooms | filter: chatSearch">
                        <li ng-click='chatRoomMsgs(x.chatroom_id)' id='room' class="chat">{{x.chatroom_name}}</li>
                    </ul>
                </div>
            </div>
            <ul ng-repeat="x in chat">
                <li class="{{ x.class }}">
                    <span class="{{ x.status }}">{{ x.sender }}</span>
                    <span class="time">{{ x.timestamp }}</span>
                    <br>
                    <span class="message">{{ x.message }}</span>
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
    <script>
function updateScroll(){
    var element = document.getElementById("scroll");
    element.scrollTop = element.scrollHeight;
}
        </script>

</body>

</html>
