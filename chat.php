<?php
session_start();
include "php/connection.php";
include "php/transaction.php";

if(!isset($_SESSION['name'])){
header('Location: login.php');
}

$_SESSION['lastUpdate'] = //TIME NOW//;

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
            <div>
                <?php include "nav_bar.php"; ?>
            </div>
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
                            <li class="chat">Member</li>
                            <li class="chat">Member</li>
                            <li class="chat">Member</li>
                            <li class="chat">Member</li>
                            <li class="chat">Member</li>
                        </ul>
                    </div>
                    <ul id="chatbox">
                        <?php 
                        
                    function drawNewMessages(){
                        
                        while($row = mysqli_fetch_assoc($result)){
                        if ($row['sender'] != $_SESSION['name']){
                            echo "<li class='smessage'>
                            <span class='sender'>".$row['sender']."</span>
                            <span class='time'>".$row['message']."</span>
                            <br>
                            <span class='message'>".$row['message']."</li>";
                        }
                        else{
                            echo ";
                        }
                    }
}
                        ?>
                    </ul>
        q               
                    </div>
                <div class="panel-foot">
                    <form>
                        <input class="message-input" placeholder="Type message here...">
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
        <script>
            $("#submit").click(function(e) {
                e.preventDefault();
                var message = $("#message-input").value;
                var time = //time.now();
                    var sender = $SESSION['name'];

                $.ajax({
                    type: "POST",
                    url: "php/send_chat.php",
                    data: {
                        message: message,
                        sender: sender
                    },
                    success: function(html) {
                        if (html.trim() == 'OK') {
                            updateChat();
                        }
                    }



                })

            });
            //Call updateChat() evey x milliseconds.
            setInterval(updateChat, 5000);

            function updateChat() {
                $.ajax({
                    type: "POST",
                    url: "php/update_chat.php",
                    data: {
                        functioname: 'updateChatLog'
                    },
                    success: function(data) {
                        //TODO: Inspect data and see how to append messages to ul
                        var resultSet = data;
                        
                        
                        $.("#chatbox").append("<li class='rmessage'><span class='receiver'>Me</span><span class='time'>".$row['time']."</span><br><span class='message'>".$row['message']."</span></li>");
                        
                        /*<li class='rmessage'>
                            <span class='receiver'>Me</span>
                            <span class='time'>".$row['time']."</span>
                            <br>
                            <span class='message'>".$row['message']."</span>
                        </li>"*/
                    }



                })

            });
        </script>
    </body>

    </html>