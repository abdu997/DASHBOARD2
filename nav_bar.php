<?php

if(!isset($_SESSION['name'])){
header('Location: login.php');
}

# TODO: Make this work with team_id rather than team_name
if(isset($_GET['teamname'])){
    $teamname = $_GET['teamname'];
    $sql = "SELECT team_id FROM `team` WHERE team_name = '$teamname'";
    $result2 = mysqli_query($conn, $sql);
    $row2 = mysqli_fetch_assoc($result2);
    $tid = $row2['team_id'];
    $_SESSION['team_id'] = $tid;
}

if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
}



?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Dashboard</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $name  ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="php/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        <li>
                            <a href="team.php"><i class="fa fa-fw fa-power-off"></i> Change Team</a>
                        </li>
                        <li>
                            <a href="register.html"><i class="fa fa-pencil-square-o"></i> Register</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="calendar.php"><i class="fa fa-calendar"></i> Calendar</a>
                    </li>
                    <li>
                        <a href="chat.php"><i class="fa fa-comments"></i> Chat</a>
                    </li>
                    <li>
                        <a href="trantrack.php"><i class="fa fa-money fa-fw"></i> Transaction Tracker</a>
                    </li>
                    <li>
                        <a href="mail.php"><i class="fa fa-envelope"></i> Mail</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>



 