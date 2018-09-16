<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Imperial Boootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
  <link href="favicon.ico" rel="shortcut icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
    crossorigin="anonymous">



  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  <div id="preloader"></div>

  <!--==========================
  Header Section
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="index.html">
          <img src="img/logo.png" alt="" title="" /></img>
        </a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Header 1</a></h1>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li>
            <a href="index.html">Home</a>
          </li>
          <li class="menu-has-children">
            <a href="#services">Watch</a>
            <ul>
              <li>
                <a href="movies.html">
                  Movies
                </a>
              </li>
              <li>
                <a href="webseries.html">
                  Webseries</a>
              </li>
              <li>
                <a href="albums.html">
                  Albums</a>
              </li>
              <li>
                <a href="animation.html">
                  Animations</a>
              </li>
            </ul>
          </li>

          <li class="menu-has-children">
            <a href="#services">Projects</a>
            <ul>
              <li>
                <a href="#">
                  Completed
                </a>
              </li>
              <li>
                <a href="#">
                  Ongoing</a>
              </li>
              <li>
                <a href="#">
                  Forthcoming</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#">News & Press</a>
          </li>
          <li>
            <a href="investors.html">Investors</a>
          </li>

          <li>
            <a href="contact.html">Contact Us</a>
          </li>
          <li class="menu-active">
            <a href="dreamer-upload.php">Dreamers Section </a>
          </li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->

<!-- =====================================
  Upload Section
====================================== -->

    <form class="contact-form center" action="includes/register.inc.php" method="POST" enctype="multipart/form-data">
      <section id="upload" class="section-bg wow fadeInUp">
        <div class="container">
        <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Upload Here</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam</p>
        </div>
      </div>
        <div class="container wow fadeInUp">
          <div class="form">
            <div class="row">
              <div class="form-group col-md-offset-1 col-md-3 mt-2">
                <label for="lastname">Last Name</label>
              </div>
              <div class="form-group col-md-6">
                <?php
if (isset($_SESSION['formFilled'])) {
    echo '<input id="lastname" type="text" name="lastname" class="form-control" value="' . $_SESSION['lastname'] . '" placeholder="Enter Lastname"/>';
} else {
    echo '<input id="lastname" type="text" name="lastname" class="form-control" placeholder="Enter Lastname"/>'
    ;
}
?>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-offset-1 col-md-3 mt-2">
                <label for="firstname">First Name</label>
              </div>
              <div class="form-group col-md-6">
                <?php
if (isset($_SESSION['formFilled'])) {
    echo '<input type="text" class="form-control" name="firstname" value="' . $_SESSION['firstname'] . '" placeholder="Enter Firstname"/>';
} else {
    echo '<input type="text" class="form-control" name="firstname" placeholder="Enter Firstname"/>'
    ;
}
?>
              </div>


            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-offset-1 col-md-3 mt-2">
              <label for="typeofupload">Type of Upload</label>
            </div>
            <div class="form-group col-md-3">
              <?php if (isset($_SESSION['formFilled'])) {
    echo '<select class="form-control" value="' . $_SESSION['typeofupload'] . '" name="typeofupload">
                            <option>Video</option>
                            <option>Audio</option>
                            <option>Script</option>
                            <option>Other</option>
                          </select>
                          </div>';
} else {
    echo '<select class="form-control" name="typeofupload">
                          <option>Video</option>
                          <option>Audio</option>
                          <option>Script</option>
                          <option>Other</option>
                          </select>
                          </div>';
}

?>
            </div>

            <div class="row">
              <div class="form-group col-md-offset-1 col-md-3 mt-2">
                <label for="email">Email</label>
              </div>
              <div class="form-group col-md-6">
                <?php if (isset($_SESSION['formFilled'])) {
    echo '<input type="email" class="form-control" name="email" value="' . $_SESSION['email'] . '" placeholder="Enter Email Id"/>';
} else {
    echo '<input type="email" class="form-control" name="email" placeholder="Enter Email Id"/>';
}

?>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-offset-1 col-md-3 mt-2">
                <label for="contact">Mobile Number</label>
              </div>
              <div class="form-group col-md-6">
                <?php if (isset($_SESSION['formFilled'])) {
    echo '<input type="text" title="Enter a Valid Phone Number" value="' . $_SESSION['contact'] . '" class="form-control" name="contact" placeholder="Enter Mobile Number"/>';
} else {
    echo '<input type="text" title="Enter a Valid Phone Number" class="form-control" name="contact" placeholder="Enter Mobile Number"/>';
}

?>

              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-offset-1 col-md-3 mt-4">
                <label for="description">Description</label>
              </div>
              <div class="form-group col-md-6">

                <textarea class="form-control" name="Description" rows="3" placeholder="Enter Description"></textarea>

              </div>
            </div>


            <div class="row">
              <div class="form-group col-md-offset-1 col-md-3 mt-2">
                <label for="signature">Upload Signature</label>
              </div>
              <div class="form-group col-md-6">
                <input name="signature" class="mx-3 mb-3" type="file">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-offset-1 col-md-3 mt-2">
                <label for="profilepic">Upload Photo</label>
              </div>
              <div class="form-group col-md-6">
                <input name="profilepic" class="mx-3 mb-3" type="file">
              </div>
            </div>

            <div class="action row mt-5">
              <div class="col-md-offset-4">
              <a href=""><button class="col-md-2 btn-reset" type="reset">Reset</button></a>

              <a href=""><button class="col-md-2 btn-register" onclick="" type="submit" name="submit">Register</button></a>
              </div>
            </div>
            </div>
            </div>
    </section>
    </form>

    <!-- #upload -->

  <!--==========================
  Footer
============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy; Copyright
            <strong>Ansh Vivek</strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by
            <a href="">Ansh Vivek</a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- #footer -->

  <a href="#" class="back-to-top">
    <i class="fa fa-chevron-up"></i>
  </a>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <script src="contactform/contactform.js"></script>


</body>

</html>