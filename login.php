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
    
    <div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1137272249733687";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Log in</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" id='email' autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" id='pass' type="password" min="8" max="16" value="">
  
                                </div>

                         <div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>
   
                            <div class="g-signin2" data-onsuccess="onSignIn"></div>
                                <button id = "login" class="btn btn-lg btn-success btn-block">Login</button>

                            <a href="register.html">Register here</a>
                            <a href="password.html">Forgot Your Password?</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--     <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Failed Log in</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group has-error">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group has-error">
                                    <input class="form-control" placeholder="Password" name="password" type="password" min="8" max="16" value="">
                                    <br>
                                    <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  The entered email address/password does not match our records.
</div>
                                </div>


                                <a  class="btn btn-lg btn-success btn-block" style="background-color: rgba(255,255,255, 0.4);">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

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
