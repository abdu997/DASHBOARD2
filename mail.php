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


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Compose Email
                            <small>w/ rich text editor</small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
<input placeholder="To..." style="border:0px; border-bottom: 2px solid #0080ff; width: 100%; margin-bottom:10px; "/>
<input placeholder="Subject" style="border:0px; border-bottom: 2px solid #0080ff; width: 100%; margin-bottom:20px"/>
<div id="toolbar" style="border: 0px;"></div>
<div id="editor" style="height:500px"></div>
            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/w3data.js"></script>
    <script>
w3IncludeHTML();
    </script>
    <script src="js/jquery.js"></script>
    <script src="https://cdn.quilljs.com/1.2.0/quill.js"></script>
    <script src="https://cdn.quilljs.com/1.2.0/quill.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>   <script>
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],
        [{ 'align': [] }],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        [{ 'header': 1 }, {'header': 2}],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'font': [] }],
        [{ 'list': 'ordered'}, { 'list': 'bullet'}], 
        [{ 'script': 'sub'}, { 'script': 'super'}],
        [{ 'indent': '-1'}, { 'indent': '+1'}],
        [{ 'direction': 'rtl'}],
        [ 'link', 'image', 'video', 'formula' ],
        ['blockquote', 'code-block'],
    ];    
        
        
    var quill = new Quill ('#editor', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
    </script>   
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
