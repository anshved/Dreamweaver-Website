
<?php
    session_start();
    if(isset($_SESSION['privilege'])) {
      if(strcmp($_SESSION['privilege'], "admin") !== 0) {
          // User is not an admin
          header("Location: ../login.php");
          exit();
      }
    } else {
      //User is not signed in
      header("Location: ../login.php");
      exit();
    }
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
  <title>Admin Panel</title>
  <!-- Icons-->
  <link href="vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
  <link href="vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <!-- Main styles for this application-->
  <link href="css/style.css" rel="stylesheet">
  <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
  <!-- Global site tag (gtag.js) - Google Analytics-->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    // Shared ID
    gtag('config', 'UA-118965717-3');
    // Bootstrap ID
    gtag('config', 'UA-118965717-5');
  </script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  <header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/home.php">
      <!-- <img class="navbar-brand-full" src="../img/dreamweaver.png" width="200" height="100" alt="Dreamweaver Logo"> -->
      DREAMWEAVER PRODUCTIONS <!-- <img class="navbar-brand-minimized" src="../img/dreamweaver.png" width="200" height="100" alt="Dreamweaver Logo"> -->
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <ul class="nav navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <img class="img-avatar" src="img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Account</strong>
          </div>
          <a class="dropdown-item" href="../includes/logout.inc.php">
            <i class="fa fa-lock"></i> Logout</a>
        </div>
      </li>
    </ul> -->
  </header>
  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
          </li>
          <li class="nav-title">Add / Edit / delete </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-puzzle"></i>Movies</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="add-movies.php">
                  <i class="nav-icon icon-puzzle"></i>Add Movies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="edit-movies.php">
                  <i class="nav-icon icon-puzzle"></i>Edit Movies</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-cursor"></i>Albums</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="add-albums.php">
                  <i class="nav-icon icon-cursor"></i>Add Albums</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="edit-albums.php">
                  <i class="nav-icon icon-cursor"></i>Edit Albums</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-star"></i>Web Series</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="add-webseries.php">
                  <i class="nav-icon icon-star"></i> Add Web Series </a>
                <a class="nav-link" href="edit-webseries.php">
                  <i class="nav-icon icon-star"></i> Edit Webseries</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-bell"></i>Animation</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="add-animations.php">
                  <i class="nav-icon icon-bell"></i> Add Animation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="edit-animations.php">
                  <i class="nav-icon icon-bell"></i>Edit Animation</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-bell"></i>Homepage Slider</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="add-images.php">
                  <i class="nav-icon icon-bell"></i> Add Images</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="edit-images.php">
                  <i class="nav-icon icon-bell"></i> Edit Images</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-bell"></i>Dreamer Section</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="view-dreams.php">
                  <i class="nav-icon icon-bell"></i> View dreams</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
              <i class="nav-icon icon-bell"></i>News</a>
            <ul class="nav-dropdown-items">
              <li class="nav-item">
                <a class="nav-link" href="add-news.php">
                  <i class="nav-icon icon-bell"></i> Add News</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="edit-news.php">
                  <i class="nav-icon icon-bell"></i>Edit News</a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    
  </div>
  <footer class="app-footer">
    <div>
      <a href="https://coreui.io">CoreUI</a>
      <span>&copy; 2018 creativeLabs.</span>
    </div>
    <div class="ml-auto">
      <span>Powered by</span>
      <a href="https://coreui.io">CoreUI</a>
    </div>
  </footer>
  <!-- CoreUI and necessary plugins-->
  <script src="vendors/jquery/js/jquery.min.js"></script>
  <script src="vendors/popper.js/js/popper.min.js"></script>
  <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendors/pace-progress/js/pace.min.js"></script>
  <script src="vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
  <script src="vendors/@coreui/coreui/js/coreui.min.js"></script>
  <!-- Plugins and scripts required by this view-->
  <script src="vendors/chart.js/js/Chart.min.js"></script>
  <script src="vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>