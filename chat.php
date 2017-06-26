<?php
session_start();
include "php/connection.php";
include "php/transaction.php";

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

$tran_sql = "SELECT * FROM `test`.`transaction` WHERE `team_id` = $team_id ORDER BY `timestamp`";
$tran_result = mysqli_query($conn, $tran_sql);

?>
<!DOCTYPE html>
<html lang="en">

<div w3-include-html="head.html"></div>

<body>
<div id="wrapper">
        <div><?php include "nav_bar.php"; ?></div>
<div id="chat" style="margin-left:50px">
        <div class="panel-head">
        <button id="chat-toggle">Show Chats</button>    
    </div>

    <div class="panel">
        <div id="clist">
            <div class="search-chat">
                <input placeholder="Search Chatroom" style="width:200px">
                <ul>
                    <li class="chat"><i class="fa fa-plus"></i> Add Chatroom
                    </li>
                </ul>
            </div>
            <ul style="margin-top:80px">
                <li class="chat">Member
                </li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
                <li class="chat">Member</li>
            </ul>
        </div>
        <ul>
            <li class="smessage">
                <span class="sender">Abdul</span>
                <span class="time">6:00pm</span>
                <br>
                <span class="message">Hello, how are you?</span>
            </li>
            <li class="smessage">
                <span class="sender">Abdul</span>
                <span class="time">6:00pm</span>
                <br>
                <span class="message">Responsive stylesheet scripting
Brand development
Project mapping
Web page structuring
Localize recurring elements
Utilize PHP functions</span>
            </li>
            <li class="rmessage">
                <span class="receiver">Yousef</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shut up!</span>
            </li>
            <li class="rmessage">
                <span class="receiver">Yousef</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shujhkjt up!</span>
            </li>
            <li class="rmessage">
                <span class="receiver">Yousef</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shuasdat up!</span>
            </li>
            <li class="smessage">
                <span class="sender">Abdul</span>
                <span class="time">6:00pm</span>
                <br>
                <span class="message">Hello, how are you?</span>
            </li>
            <li class="smessage">
                <span class="sender">Abdul</span>
                <span class="time">6:00pm</span>
                <br>
                <span class="message">Responsive stylesheet scripting
Brand development
Project mapping
Web page structuring
Localize recurring elements
Utilize PHP functions</span>
            </li>
            <li class="rmessage">
                <span class="receiver">Me</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shut up!</span>
            </li>
            <li class="rmessage">
                <span class="receiver">Me</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shujhkjt up!</span>
            </li>
            <li class="rmessage">
                <span class="receiver">Me</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shuasdat up!</span>
            </li>
            <li class="smessage">
                <span class="sender">Abdul</span>
                <span class="time">6:00pm</span>
                <br>
                <span class="message">Hello, how are you?</span>
            </li>
            <li class="smessage">
                <span class="sender">Abdul</span>
                <span class="time">6:00pm</span>
                <br>
                <span class="message">Responsive stylesheet scripting
Brand development
Project mapping
Web page structuring
Localize recurring elements
Utilize PHP functions</span>
            </li>
            <li class="rmessage">
                <span class="receiver">Me</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shut up!</span>
            </li>
            <li class="rmessage">
                <span class="receiver">Me</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shujhkjt up!</span>
            </li>
            <li class="rmessage">
                <span class="receiver">Me</span>
                <span class="time">8:00pm</span>
                <br>
                <span class="message">Shuasdat up!</span>
            </li>
            
        </ul>
    </div>
    <div class="panel-foot">
        <form>
            <input class="message-input"  placeholder="Type message here...">
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
</body>

</html>
