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
    $tid = $row2['team_id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.13/r-2.1.1/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />

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
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form onSubmit="php/transaction.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" id="type">
                                            <option><i class="fa fa-plus" style="color: green; padding-right: 5px"></i>Debit</option>
                                            <option><i class="fa fa-minus" style="color: red; padding-right: 5px"></i>Credit</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Place/account</label>
                                        <input type="text" class="form-control" id="place" placeholder="i.e. Walmart">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" class="form-control" rows="2" id="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control" id="date">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control"  placeholder="Amount" id="amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >Upload Receipt</label>
                                        <input type="file" id="receipt">
                                    </div>
                                    <button type="submit" class="btn btn-default">Post Transaction</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="max-width: 20px">ID #</th>
                                    <th>Debit/Credit</th>
                                    <th>Person</th>
                                    <th>Place/Account</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Receipt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><i class="fa fa-minus" style="color: red; padding-right: 5px"></i>Credit</td>
                                    <td>Abdul Amoud</td>
                                    <td>Namecheap</td>
                                    <td>Server bill</td>
                                    <td>2011/04/25</td>
                                    <td>$50</td>
                                    <td><a href="img/receipt.jpg" target="_blank">receipt_1</a>
                                    </td>
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


</body>

</html>