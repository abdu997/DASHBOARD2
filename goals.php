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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<body>
<div id="wrapper">
        <div><?php include "nav_bar.php"; ?></div>
    <div id="goals">
        <style>
        ul { 
min-height:10px;
list-style: none;
}

 li.goals-li {
     border: 1px solid #c5c5c5;
     background: #f6f6f6;
     width: 75%;
     padding: 1em;
     height: auto;
     margin: 5px;
     color: black
         
}

li:active {
  margin: 0px;
  height: 10px
}
        </style>
    <ul>
         <li class="goals-li">Item 1<ul></ul></li>
         <li class="goals-li">Item 2<ul></ul></li>
         <li class="goals-li">Item 3<ul></ul></li>
         <li class="goals-li">Item 4<ul></ul></li>
    </ul>
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
    <script>$("#goals ul").sortable({
                connectWith: "#goals ul",
                placeholder: "ui-state-highlight"
});
    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</body>

</html>
