<?php
session_start();
include "php/connection.php";
if(!isset($_SESSION['name'])){
    
header('Location:index.php');
}

$uid = $_SESSION['user_id'];
$sql = "SELECT t_id FROM `team_user` where u_id = '$uid'";
$result1 = mysqli_query($conn, $sql);



?>
    
<!DOCTYPE html>
<html lang="en">

<div w3-include-html="head.html"></div>

<body>
    

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="margin-bottom:30px">Hello, <?php echo $_SESSION['name']?> !</h1>
            </div>
<?php while($row = mysqli_fetch_assoc($result1)){ 
        $tid = $row['t_id'];
        $sql = "SELECT team_name FROM `team` WHERE team_id = '$tid'";
        $result2 = mysqli_query($conn, $sql);
        $row2 = mysqli_fetch_assoc($result2);
        $teamname = $row2['team_name'];
    ?>
    <!-- Change the div below to whatever you want the team to look like on the page. Use the echo $teamname to display the recently created team name. -->
    <div class="col-md-4 square">
        <div onclick="window.location.href='index.php?teamname=<?php echo $teamname;?>'" id="<?php echo $teamname;  ?>" class="content"><h1><i class="fa fa-laptop" style="font-size: 60px"></i></h1><br><?php echo $teamname;  ?></div>
    </div>
    <?php
        }
    ?>


<div class="col-md-4 square" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px">
                <div class="content">

                    <h1><i class="fa fa-plus" style="font-size: 60px"></i></h1><br>
                                        Create a Team
                </div>
            </div>
</div>
    </div>


    <modal>
          <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Build a Team</h4>
        </div>
        <div class="modal-body">
            <form method="post">
                <div class="form-group">
        <label>Team Name</label>
<input id='t_name' name="teamname" class="form-control" required>
    <strong><p>NOTE: The creator of the Team will be assigned the Admin Role (you).</p></strong>
</div>
<div class="form-group">
        <label>User Member #1 E-mail</label>
<input id='email1' name = 'email1' class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
</div>
<div class="form-group">
        <label>User Member #2 E-mail</label>
<input id='email2' name = 'email2' class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
</div>
<div class="form-group">
        <label>User Member #3 E-mail</label>
<input id='email3' name = 'email3' class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
</div>
<div class="form-group">
        <label>User Member #4 E-mail</label>
<input id='email4' name = 'email4' class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                <button id="submit" type="submit" class="btn btn-default">Submit</button>
</div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    </modal>

    <!-- jQuery -->
    <script src="js/w3data.js"></script>
    <script>
w3IncludeHTML();
    </script>
    <script src="js/jquery.js"></script>
    <script src='js/ajax/login_ajax.js'></script>
    <script>
    $(document).ready(function(){
		  
		  $("#submit").click(function(e) {
		 e.preventDefault();
		var teamname = $("#t_name").val();
        if (/\S/.test(teamname)) {
              var email1 = $("#email1").val();
        var email2 = $("#email2").val();
        var email3 = $("#email3").val();
        var email4 = $("#email4").val();
        
			
			
					$.ajax({
					type: "POST",
						url: "php/create_team.php",
						data:{
							email1 : email1,
							email2 : email2,
							email3 : email3,
							email4 : email4,
                            teamname: teamname
						},
						success: function(html){
							if (html.indexOf("success") >= 0){
								window.location.reload();
							}
							else{
                                console.log("Something went wrong!");
                            }
						}
					});
    
}
       
      
		
		
		  });
    });
                              
</script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
     <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script>
        ('div').click()
        </script>
    

</body>

</html>

<!--  
    <div class="col-md-4 square">
        <div class="content"><h1><i class="fa fa-laptop" style="font-size: 60px"></i></h1><br>name</div>
    </div>
</div>
<div class="col-md-4 square" data-toggle="modal" data-target="#myModal">
                <div class="content">

                    <h1><i class="fa fa-plus" style="font-size: 60px"></i></h1><br>
                                        Create a Team
                </div>
            </div>
-->