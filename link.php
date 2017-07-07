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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.13/r-2.1.1/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />

<div w3-include-html="head.html"></div>

<body>
    <div id="wrapper">
        <div><?php include "nav_bar.php"; ?></div>

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form onSubmit="php/transaction.php" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" class="form-control" id="link" placeholder="Link" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Notes</label>
                                        <textarea type="text" class="form-control" rows="2" id="notes"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">Save Link</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row" ng-app="LinkRepository" ng-controller="LinkController">
                    <div class="col-lg-12">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="max-width: 20px">ID #</th>
                                    <th>Person</th>
                                    <th>Link</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="x in links">
                                    <td>{{ x.link_id }}</td>
                                    <td>{{ x.user }}</td>
                                    <td><a href="{{ x.link }}" target="_blank">{{ x.link }}</a></td>
                                    <td>{{ x.notes }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/w3data.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script>
        w3IncludeHTML();
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.13/r-2.1.1/datatables.min.js"></script>
    <script src="js/link.js"></script>


</body>

</html>
