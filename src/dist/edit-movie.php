<?php
include_once "../includes/connect.local.php";
include_once '../includes/ChromePhp.php';

session_start();

if (isset($_SESSION['privilege'])) {
    if (strcmp($_SESSION['privilege'], "admin") !== 0) {
        // User is not an admin
        header("Location: ../login.php");
        exit();
    }
} else {
    //User is not signed in
    header("Location: ../login.php");
    exit();
}

// Fetch movie
$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM movies WHERE id=$id";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if (mysqli_num_rows($result) == 0) {
    header("Location: ../home.php");
    exit();
} else {
    $movie = mysqli_fetch_assoc($result);
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

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="img-avatar" src="img/avatars/8.jpg" alt="admin@bootstrapmaster.com">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
    </ul>
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
              <i class="nav-icon icon-bell"></i>Got Talent? Upload!</a>
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
    <div class="col-md-8 offset-md-3 mt-5">
    <div class="card">
        <div class="card-header">
            <strong>Select Movie</strong>
        </div>
        <?php
            $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            if (strpos($url, "status=success") !== false) {
                echo '<div class="alert alert-success" role="alert">
                                Movie Updated Successfully
                            </div>';
            } else if (strpos($url, "status=empty") !== false) {
                echo '<div class="alert alert-danger" role="alert">
                                Fill out all the fields!
                            </div>';
            } else if (strpos($url, "status=date") !== false) {
                echo '<div class="alert alert-danger" role="alert">
                                Invalid Date
                            </div>';
            } else if (strpos($url, "status=desc") !== false) {
                echo '<div class="alert alert-danger" role="alert">
                            Description too long
                            </div>';
            } else if (strpos($url, "status=image") !== false) {
                echo '<div class="alert alert-danger" role="alert">
                                We\'re having issues with your Banner
                            </div>';
            } else if (strpos($url, "status=banner") !== false) {
                echo '<div class="alert alert-danger" role="alert">
                                Invalid Banner
                            </div>';
            }

        ?>
        <div class="card-body">
            <form class="form-horizontal" action="../includes/edit_movie.inc.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="movie-name-input">Movie Name</label>
                  <div class="col-md-9">
                      <input class="form-control" id="movie-name" type="text" name="movie-name" placeholder="Enter Movie Name" value="<?php echo $movie['name'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="text-input">Actors</label>
                  <div class="col-md-9">
                      <input class="form-control" id="movie-actors" type="text" name="movie-actors" placeholder="Shahrukh Khan, Amitabh Bacchan,..." value="<?php echo $movie['actors'] ?>">
                      <span class="help-block">Use " , " between the names of the actors.</span>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="movie-date-input">Date Of Release</label>
                  <div class="col-md-9">
                      <input class="form-control" id="movie-date" type="date" name="movie-date" placeholder="Date of Release" value="<?php echo $movie['date'] ?>">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="movie-description-input">Description</label>
                  <div class="col-md-9">
                      <textarea class="form-control" id="movie-description" name="movie-description" rows="9" placeholder="Description.." ><?php echo $movie['description'] ?></textarea>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="movie-duration">Select</label>
                  <div class="col-md-4">
                      <select class="form-control" id="movie-hrs" name="movie-hrs">
                          <option value="" disabled selected>Hours</option>
                          <option value="0">0 Hours</option>
                          <option value="1">1 Hour</option>
                          <option value="2">2 Hours</option>
                          <option value="3">3 Hours</option>
                          <option value="4">4 Hours</option>
                      </select>
                  </div>
                  <div class="col-md-4">
                      <select class="form-control" id="movie-mins" name="movie-mins">
                          <option value="" disabled selected>Minutes</option>
                          <?php
                            for ($i = 0; $i <= 60; $i++) {
                                echo '<option value="' . $i . '">' . $i . ' Minutes</option>';
                            }
                            ?>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="movie-duration">Select</label>
                    <div class="col-md-4">
                        <select class="form-control" id="movie-status" name="movie-status">
                            <option value="" disabled selected>Status of project</option>
                            <option value="completed">Completed</option>
                            <option value="inprogress">In Progress</option>
                            <option value="upcoming">Upcoming</option>
                        </select>
                    </div>
            </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="movie-banner-input">Change Banner</label>
                  <div class="col-md-9">
                      <input id="movie-banner" type="file" name="movie-banner" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="movie-trailer1-input">Change Trailer 1</label>
                  <div class="col-md-9">
                      <input id="movie-trailer1" type="file" name="movie-trailer1">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="movie-trailer2-input">Change Trailer 2</label>
                  <div class="col-md-9">
                      <input id="movie-trailer2" type="file" name="movie-trailer2">
                  </div>
              </div>
              <div class="form-group row">
                  <label class="col-md-3 col-form-label" for="movie-trailer3-input">Change Trailer 3</label>
                  <div class="col-md-9">
                      <input id="movie-trailer3" type="file" name="movie-trailer3">
                  </div>
              </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-sm btn-primary" name="action" value="submit">
                    <i class="fa fa-dot-circle-o"></i> Submit</button>

                <button class="btn btn-sm btn-danger" name="action"  value="delete">
                    <i class="fa fa-trash"></i> Delete Movie</button>
              </div>
          </form>

        </div>
    </div>
</div>
</div>
<!-- sidebar end -->


<footer class="app-footer">
    <div>
        <a href="">Admin Panel</a>
        <span>&copy; 2018 Vibrant Designers.</span>
    </div>
    <div class="ml-auto">
        <span>Designed by</span>
        <a href="">Vibrant Designers</a>
    </div>
</footer>
<!-- CoreUI and necessary plugins-->
<script src="vendors/jquery/js/jquery.min.js"></script>
<script src="vendors/popper.js/js/popper.min.js"></script>
<script src="vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="vendors/pace-progress/js/pace.min.js"></script>
<script src="vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
<script src="vendors/@coreui/coreui/js/coreui.min.js"></script>


<script>
  document.querySelector('#movie-hrs').selectedIndex=<?php echo explode(":", $movie['duration'])[0] + 1; ?>;
  document.querySelector('#movie-mins').selectedIndex=<?php echo explode(":", $movie['duration'])[1] + 1; ?>;
  document.querySelector('#movie-status').value='<?php echo $movie['status']; ?>';

</script>
</body>

</html>