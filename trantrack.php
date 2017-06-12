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
                        <form onSubmit="php/transaction.php" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" id="type" name="type">
                                            <option><i class="fa fa-plus" style="color: green; padding-right: 5px" value="Debit"></i>Debit</option>
                                            <option><i class="fa fa-minus" style="color: red; padding-right: 5px" value="Credit"></i>Credit</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Place/account</label>
                                        <input type="text" class="form-control" id="place" name="place" placeholder="i.e. Walmart">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" class="form-control" rows="2" id="description" name="description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">$</div>
                                                <input type="text" class="form-control"  placeholder="Amount" id="amount" name="amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >Upload Receipt</label>
                                        <input type="file" id="receipt" name="receipt">
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
                                    <th>Date (YMD)</th>
                                    <th>Amount</th>
                                    <th>Receipt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $id_counter = 0;
                                    $receipt_directory = 'uploads\\receipts\\' . ((string) $team_id);
                                    while ($row = mysqli_fetch_assoc($tran_result)){
                                        $id_counter = $id_counter + 1;
                                        $type = $row['type'];
                                        $place = $row['place'];
                                        $desc = $row['description'];
                                        $date = $row['date'];
                                        if ($row['amount'] == ''){
                                            $amount = '$0.00';
                                        } else {
                                          $amount = '$' . $row['amount'];
                                        }
                                        if ($row['receipt'] !== ''){
                                            $receipt = $receipt_directory . '\\' .$row['receipt'];
                                        } else {
                                            $receipt = NULL;
                                        }

                                        $user_id = $row['user_id'];
                                        $user_sql = "SELECT * FROM `test`.`users` WHERE `idusers` = $user_id ";
                                        $user_result = mysqli_query($conn, $user_sql);
                                        $user_row = mysqli_fetch_assoc($user_result);
                                        $user_name = $user_row['first_name'] . ' ' . $user_row['last_name'];
                                ?>
                                <tr>
                                    <td><?php echo $id_counter ?></td>
                                    <?php
                                        if ($type == 'Credit'){
                                     ?>
                                            <td><i class="fa fa-minus" style="color: red; padding-right: 5px"></i>Credit</td>
                                    <?php
                                        }
                                        else{
                                    ?>
                                            <td><i class="fa fa-plus" style="color: green; padding-right: 5px"></i>Debit</td>
                                    <?php
                                        }
                                    ?>
                                    <td><?php echo $user_name; ?></td>
                                    <td><?php echo $place; ?></td>
                                    <td><?php echo $desc; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $amount; ?></td>
                                    <?php
                                        if ($receipt == NULL){
                                     ?>
                                            <td><font color="red">No Receipt</font></td>
                                    <?php
                                        }
                                        else{
                                    ?>
                                        <td><a href="<?php echo $receipt; ?>" target="_blank">Receipt <?php echo $id_counter; ?></a></td>
                                    <?php
                                        }
                                    ?>
                                </tr>
                                <?php
                                    }
                                ?>
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
