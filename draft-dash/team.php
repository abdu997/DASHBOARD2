<html>

<head>
    <title>Dashboard Draft</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--FrameWorks-->
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--Fonts-->
    <link rel="stylesheet" href="css/raleway.css">

    <!--Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/ionicons-2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link href='lib/fullcalendar.min.css' rel='stylesheet' />
</head>

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4; position: fixed">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> &nbsp;Menu</button>
    <span class="w3-bar-item w3-right">Logo</span>
</div>

<body class="w3-light-grey" style="margin-top: 43px">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar">
        <br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="walrus-baby.jpg" class="w3-circle w3-margin-right" style="width:46px; height: 46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <h4>Welcome, <strong>Abdul</strong></h4>
            </div>
        </div>
        <hr>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>&nbsp; Personal Dashboard</a>
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>&nbsp; Account Settings</a>
            <a onclick="document.getElementById('team_create').style.display='block'" class="w3-bar-item w3-button w3-padding"><i class="fa fa-plus fa-fw"></i>&nbsp; Create Team</a>
            <hr>
            <a href="#" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>&nbsp; Team Name</a>
            <br>
            <br>
        </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px;">
        <!-- Header -->
        <header class="w3-container">
            <h3 style="padding-top: 25px; padding-bottom: 25px;"><b><i class="fa fa-dashboard"></i> Team Name Dashboard</b></h3>
        </header>

        <!--modal-->
        <div id="team_create" class="w3-modal">
            <div class="w3-modal-content w3-animate-top w3-card-4" style="padding: 25px; background: #f1f1f1!important">
                <span onclick="document.getElementById('team_create').style.display='none'" class="w3-button w3-display-topright" style="font-size: 20px">&times;</span>
                <div class="w3-container">
                    <h4>Create a Team</h4>
                    <form>
                        <label>Team Name<span class="asterisk">*</span>
                        </label>
                        <input class="w3-input w3-border-0" type="text" required>
                        <label>Member #1</label>
                        <input class="w3-input w3-border-0" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="e-mail" required>
                        <label>Member #2</label>
                        <input class="w3-input w3-border-0" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="e-mail" required>
                        <label>Member #3</label>
                        <input class="w3-input w3-border-0" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="e-mail" required>
                        <label>Member #4</label>
                        <input class="w3-input w3-border-0" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="e-mail" required>
                        <input class="w3-button" type="submit" value="Create" style="background: white; margin-top: 10px">
                        <p><small>NOTE: You will be the Admin for the team. You can set up a team without members, and add members later.</small>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="w3-container">
            <div class="row">
                <div class="col-md-6" style="padding-right: 0px">
                    <div class="tile-bg">
                        <h3><i class="fa fa-comments fa-fw icon"></i>Chat</h3>
                        <?php include 'chat.php';?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tile-bg">
                        <h3><i class="fa fa-list-ol fa-fw icon"></i>Personal To Do</h3>
                        <?php include 'personal-todo.php';?>
                    </div>
                    <div class="tile-bg">
                        <h3><i class="fa fa-map-marker fa-fw icon"></i>Team Map</h3>
                        <?php //include 'team-map.php';?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile-bg">
                        <h3><i class="fa fa-calendar fa-fw icon"></i>Team Calendar</h3>
                        <?php include 'team-calendar.php';?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!--Javascript-->
    <script for="sidebar">
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
    </script>
    <script for="modal">
        // Get the modal
        var modal = document.getElementById('team_create');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>