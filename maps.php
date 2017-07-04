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
<html>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/map.js"></script>
<style>
    html {
        height: 100%;
    }
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    #map-canvas {
        height: 100%;
    }
    #iw_container .iw_title {
        font-size: 16px;
        font-weight: bold;
    }
    .iw_content {
        padding: 15px 15px 15px 0;
    }
</style>

    <head>
        <div w3-include-html="head.html"></div>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="wrapper">
        <div><?php include "nav_bar.php"; ?></div>
        <div id="map-canvas"></div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/w3data.js"></script>
    <script>
w3IncludeHTML();
    </script>
    </body>
</html>