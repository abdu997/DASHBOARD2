<?php
session_start();
if(isset($_SESSION['name'])){
header('Location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<div w3-include-html="head.html"></div>

<body>
    
<center>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="margin-bottom:30px">Hello, #Name!</h1>
            </div>
        <div class="row">
            <div class="col-md-4 square" data-toggle="modal" data-target="#myModal">
                <div class="content">
                <center>
                    <h1><i class="fa fa-plus" style="font-size: 60px"></i></h1><br>
                    </center>
                                        Create a Team
                </div>
            </div>
        </div>
    </div>    
</center>
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
<div class="form-group">
        <label>Team Name</label>
<input class="form-control">
    <strong><p>NOTE: The creator of the Team will be assigned the Admin Role (you).</p></strong>
</div>
<div class="form-group">
        <label>User Member #1 E-mail</label>
<input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
</div>
<div class="form-group">
        <label>User Member #2 E-mail</label>
<input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
</div>
<div class="form-group">
        <label>User Member #3 E-mail</label>
<input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
</div>
<div class="form-group">
        <label>User Member #4 E-mail</label>
<input class="form-control" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
</div>
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

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
     <script src="https://apis.google.com/js/platform.js" async defer></script>
    

</body>

</html>
