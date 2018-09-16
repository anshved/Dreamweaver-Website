
<?php
  session_start();
?>
<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <!-- Icons-->
    <link href="dist/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="dist/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="dist/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="dist/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="dist/css/style.css" rel="stylesheet">
    <link href="dist/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
  </head>
  
  <body class="app flex-row align-items-center">
  
    <div class="container">
    
      <div class="row justify-content-center">
        <div class="col-md-4">
      
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                
                <h1>Login</h1>
                <?php
                  if (isset($_SESSION['u_id'])) {
                    header("Location: dist/index.html");
                  } else {
                    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    if (strpos($url, "login=error") !== false) {
                      echo '<div class="alert alert-danger" role="alert">
                              Invalid Email / Password
                            </div>';
                    } elseif (strpos($url, "login=empty") !== false) {
                      echo '<div class="alert alert-danger" role="alert">
                              Fill out all the fields!
                            </div>';
                    } 
                  }
                ?>
                <p class="text-muted">Sign In to your account</p>
                <form action="includes/login.inc.php" method="POST">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-user"></i>
                      </span>
                    </div>
                    <input class="form-control" name="email" type="text" placeholder="Email">
                  </div>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                    </div>
                    <input class="form-control" name="pass" type="password" placeholder="Password">
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button name="submit" class="btn btn-primary px-4" type="submit">Login</button>
                    </div>
                    <div class="col-6 text-right">
                      <button class="btn btn-link px-0" type="button">Forgot password?</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="dist/vendors/jquery/js/jquery.min.js"></script>
    <script src="dist/vendors/popper.js/js/popper.min.js"></script>
    <script src="dist/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/vendors/pace-progress/js/pace.min.js"></script>
    <script src="dist/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="dist/vendors/@coreui/coreui/js/coreui.min.js"></script>
  </body>
</html>
