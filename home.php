<?php

require 'includes/connect.local.php';

$sql = "SELECT image_name FROM slides";
$result = mysqli_query($conn, $sql) or die("Error");
$slides = mysqli_fetch_all($result, MYSQLI_NUM);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Dreamweaver Productions</title>
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
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126292348-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-126292348-2');
  </script>

</head>

<body>
  <!--==========================
  Hero Section
  ============================-->
  <!-- <section id="hero">
    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="img/logo.jpg" alt="Dreamweaaver">
        </div>

        <h1>Welcome to Dreamweaver Productions</h1>
        <h2>We create
          <span class="rotating">beautiful graphics, functional websites, working mobile apps</span>
        </h2>
        <div class="actions">
          <a href="#about" class="btn-get-started">Get Started</a>
        </div>
      </div>
    </div>
  </section> -->

  <!--==========================
  Header Section
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo"  class="pull-left">
        <a href="home.php">
          <img src="img/output.png" alt="" title="" />
        </a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!-- <h1><a href="home.php">DreamWeaver</a></h1> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li>
            <a href="home.php">Home</a>
          </li>

          <li class="menu-has-children">
            <a href="#projects">Projects</a>
            <ul>
              <li>
                <a href="all.php">
                  All
                </a>
              </li>
              <li>
                <a href="completed.php">
                  Completed</a>
              </li>
              <li>
                <a href="ongoing.php">
                  Ongoing</a>
              </li>
              <li>
                <a href="forthcoming.php">
                  Forthcoming</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="investors.php">Investors</a>
          </li>
          <li>
            <a href="news.php">News & Press</a>
          </li>
          <li>
            <a href="contact.php">Contact Us</a>
          </li>
          <li>
            <a href="dreamer-upload.php">Got Talent? Upload!</a>
          </li>
        </ul>
      </nav>
      <!-- #nav-menu-container -->
    </div>
  </header>
  <!-- #header -->

  <!--==========================
  About Section
  ============================-->
  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">About Us</h3>
          <div class="section-title-divider"></div>
          <div class=" col-md-6">
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:-15px;width:600px;height:500px;overflow:hidden;visibility:hidden; ">
              <!-- Loading Screen -->
              <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
              </div>
              <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:500px;overflow:hidden;">

                <?php foreach ($slides as $slide): ?>
                <div>
                  <img data-u="image" src="slider-images/<?=$slide[0];?>" />
                </div>
                <?php endforeach?>

              </div>
              <!-- Bullet Navigator -->
              <!-- <div data-u="navigator" class="jssorb072" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                  <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
                      <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
                          <circle class="b" cx="8000" cy="8000" r="6666.7"></circle>
                      </svg>
                      <div data-u="numbertemplate" class="n"></div>
                  </div>
              </div> -->
              <!-- Arrow Navigator -->
              <div data-u="arrowleft" class="jssora073" style="width:40px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75"
                data-scale-left="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                  <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
                </svg>
              </div>
              <div data-u="arrowright" class="jssora073" style="width:40px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75"
                data-scale-right="0.75">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                  <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
                </svg>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-md-offset-1 mt-4 about-content">
            <!-- <h2 class="about-title">Our Vision</h2> -->
            <p class="about-text">
              The idea of DREAMWEAVER is to ENTERTAIN. Nothing is impossible. A dreamer will always achieve. His subconcious will take
              him towards achieving his dreams.

            </p>
            <p class="about-text">Dreamweaver productions aims at weaving dreams, be it for aspiring actors, technicians or the film going public
              where a seed for achieving excellence is sown to achieve grand things in life. A platform for able deserving
              people contributing towards making a movie/web series/play or a dream for the public as well to be lost in
              the so called dream experience provided by Dreamweaver so as to forget their everyday woes.
            </p>
          </div>


        </div>
      </div>
    </div>
    <br>
    <!-- <div class="mt-5 container about-container wow fadeInUp">
      <div class="row">

        <div class="col-lg-6 about-img">
          <img src="img/about-img.jpg" alt="">
        </div>

        <div class="col-md-6 mt-4 about-content">
          <h2 class="about-title">Our Vision</h2>
          <p class="about-text">
            The idea of DREAMWEAVER is to ENTERTAIN. Nothing is impossible. A dreamer will always achieve. His subconcious will take
            him towards achieving his dreams.

          </p>
          <p class="about-text">Dreamweaver productions aims at weaving dreams, be it for aspiring actors, technicians or the film going public
            where a seed for achieving excellence is sown to achieve grand things in life. A platform for able deserving
            people contributing towards making a movie/web series/play or a dream for the public as well to be lost in the
            so called dream experience provided by Dreamweaver so as to forget their everyday woes.
          </p>
        </div>
      </div>
    </div> -->
  </section>

  <!-- ===================================
  About Himanshu Asher
==================================== -->

  <section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">About Himanshu Asher</h3>
          <div class="section-title-divider"></div>
          <div class="row justify-content-between">
            <div class="col-md-offset-1 col-lg-4 mt-5 col-md-push-6">
              <div class="div-img-bg mt-5">
                <div class="about-img">
                  <img src="img/about-ha.jpeg" class="img-responsive" alt="me">
                </div>
              </div>
            </div>
            <div class="col-md-5 col-md-offset-1 mt-4 about-content col-lg-pull-5">
              <!-- <h2 class="about-title">Our Vision</h2> -->
              <p class="about-text">
                Himanshu Asher, a post graduate from the prestigious NMIMS in Mumbai had humble beginnings but always believed in the power
                of dreams.
              </p>
              <p class="about-text">From doing odd jobs during his studying years to support his family, he went on to establish a flourishing
                PVC manufacturing facility in Valsad, catering to clients within and outside India.
              </p>
              <p class="about-text">
                Always one, never afraid to experiment, he established DREAMWEAVER PRODUCTIONS with a view to entertain the masses alongwith
                providing a platform to deserving artistes and technicians to achieve their dreams.
              </p>
              <p class="about-text">
                His idea of happiness would be curling up with a P.G.Wodehouse on a rainy day.
              </p>
            </div>
          </div>


        </div>
      </div>
    </div>
    <br>
    <!-- <div class="mt-5 container about-container wow fadeInUp">
      <div class="row">

        <div class="col-lg-6 about-img">
          <img src="img/about-img.jpg" alt="">
        </div>

        <div class="col-md-6 mt-4 about-content">
          <h2 class="about-title">Our Vision</h2>
          <p class="about-text">
            The idea of DREAMWEAVER is to ENTERTAIN. Nothing is impossible. A dreamer will always achieve. His subconcious will take
            him towards achieving his dreams.

          </p>
          <p class="about-text">Dreamweaver productions aims at weaving dreams, be it for aspiring actors, technicians or the film going public
            where a seed for achieving excellence is sown to achieve grand things in life. A platform for able deserving
            people contributing towards making a movie/web series/play or a dream for the public as well to be lost in the
            so called dream experience provided by Dreamweaver so as to forget their everyday woes.
          </p>
        </div>
      </div>
    </div> -->
  </section>
  <!--==========================
  Services Section
  ============================-->
  <!-- <section id="services">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Our Productions</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">

          <div class="row">
            <div class="col-md-6 service-item">
              <div class="service-icon">
                <i class="fa fa-film"></i>
              </div>
              <h4 class="service-title">
                <a href="movies.php">Movies</a>
              </h4>
              <p class="service-description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
            <div class="col-md-6 service-item">
              <div class="service-icon">
                <i class="fa fa-headphones"></i>
              </div>
              <h4 class="service-title">
                <a href="albums.php">Albums</a>
              </h4>
              <p class="service-description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
            <div class="col-md-6 service-item">
              <div class="service-icon">
                <i class="fa fa-tv"></i>
              </div>
              <h4 class="service-title">
                <a href="webseries.php">Web Series</a>
              </h4>
              <p class="service-description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
            <div class="col-md-6 service-item">
              <div class="service-icon">
                <i class="fa fa-magic"></i>
              </div>
              <h4 class="service-title">
                <a href="animation.php">Animation</a>
              </h4>
              <p class="service-description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="col-md-2 col-md-offset-1">
            <div onclick="location.href='dreamer-upload.php';" style="cursor: pointer;" class="upload-service-item">
              <h4 class="upload-service-title">
                <a href="dreamer-upload.php">Upload your Productions here</a>
              </h4>
              <div class="upload-service-icon">
                <a href="dreamer-upload.php">
                  <i class="fa fa-arrow-circle-o-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!--==========================
  Subscrbe Section
  ============================-->
  <section id="subscribe">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-8">
          <h3 class="subscribe-title">Subscribe For Updates</h3>
          <p class="subscribe-text">Join our 1000+ subscribers and get access to the latest tools, freebies, product announcements and much more!</p>
        </div>
        <div class="col-md-4 subscribe-btn-container">
          <a class="subscribe-btn" target="_blank" href="https://www.youtube.com/channel/UCAtJrlMNOhw6QUV7bLYMz1w">Subscribe Now</a>
        </div>
      </div>
    </div>
  </section>

  <!--==========================
  Footer
============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-7 col-md-6 footer-info">
            <img src="img/logo1.jpg" alt="">
          </div>

          <!-- <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">Home</a>
              </li>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">About us</a>
              </li>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">Services</a>
              </li>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">Terms of service</a>
              </li>
              <li>
                <i class="ion-ios-arrow-right"></i>
                <a href="#">Privacy policy</a>
              </li>
            </ul>
          </div> -->

          <div class="col-lg-4 col-md-offset-1 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              B-702, Rajshree Clover,
              <br> Building No. 110,
              <br> Tilak Nagar, Chembur,
              <br>Mumbai-400089.
              <br>
              <strong>Phone:</strong> +91 9320072117
              <br>
              <strong>Email:</strong> dreamweaver.productions@yahoo.com
              <br>
            </p>

            <!-- <div class="social-links">
              <a href="#" class="twitter">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#" class="facebook">
                <i class="fa fa-facebook"></i>
              </a>
              <a href="#" class="instagram">
                <i class="fa fa-instagram"></i>
              </a>
              <a href="#" class="google-plus">
                <i class="fa fa-google-plus"></i>
              </a>
              <a href="#" class="linkedin">
                <i class="fa fa-linkedin"></i>
              </a>
            </div> -->

          </div>

        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy; Copyright
            <strong>Vibrant Designers</strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by
            <a style="color: #eee" href="">Vibrant Designers</a>
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

  <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    jssor_1_slider_init = function () {

      var jssor_1_SlideshowTransitions = [
        { $Duration: 800, x: 0.25, $Zoom: 1.5, $Easing: { $Left: $Jease$.$InWave, $Zoom: $Jease$.$InCubic }, $Opacity: 2, $ZIndex: -10, $Brother: { $Duration: 800, x: -0.25, $Zoom: 1.5, $Easing: { $Left: $Jease$.$InWave, $Zoom: $Jease$.$InCubic }, $Opacity: 2, $ZIndex: -10 } },
        { $Duration: 1200, x: 0.5, $Cols: 2, $ChessMode: { $Column: 3 }, $Easing: { $Left: $Jease$.$InOutCubic }, $Opacity: 2, $Brother: { $Duration: 1200, $Opacity: 2 } },
        { $Duration: 600, x: 0.3, $During: { $Left: [0.6, 0.4] }, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Brother: { $Duration: 600, x: -0.3, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 } },
        { $Duration: 800, x: 0.25, y: 0.5, $Rotate: -0.1, $Easing: { $Left: $Jease$.$InQuad, $Top: $Jease$.$InQuad, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuad }, $Opacity: 2, $Brother: { $Duration: 800, x: -0.1, y: -0.7, $Rotate: 0.1, $Easing: { $Left: $Jease$.$InQuad, $Top: $Jease$.$InQuad, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuad }, $Opacity: 2 } },
        { $Duration: 1000, x: 1, $Rows: 2, $ChessMode: { $Row: 3 }, $Easing: { $Left: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Brother: { $Duration: 1000, x: -1, $Rows: 2, $ChessMode: { $Row: 3 }, $Easing: { $Left: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear }, $Opacity: 2 } },
        { $Duration: 1000, y: -1, $Cols: 2, $ChessMode: { $Column: 12 }, $Easing: { $Top: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Brother: { $Duration: 1000, y: 1, $Cols: 2, $ChessMode: { $Column: 12 }, $Easing: { $Top: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear }, $Opacity: 2 } },
        { $Duration: 800, y: 1, $Easing: { $Top: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Brother: { $Duration: 800, y: -1, $Easing: { $Top: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear }, $Opacity: 2 } },
        { $Duration: 1000, x: -0.1, y: -0.7, $Rotate: 0.1, $During: { $Left: [0.6, 0.4], $Top: [0.6, 0.4], $Rotate: [0.6, 0.4] }, $Easing: { $Left: $Jease$.$InQuad, $Top: $Jease$.$InQuad, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuad }, $Opacity: 2, $Brother: { $Duration: 1000, x: 0.2, y: 0.5, $Rotate: -0.1, $Easing: { $Left: $Jease$.$InQuad, $Top: $Jease$.$InQuad, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuad }, $Opacity: 2 } },
        { $Duration: 800, x: -0.2, $Delay: 40, $Cols: 12, $During: { $Left: [0.4, 0.6] }, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: { $Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad }, $Opacity: 2, $Outside: true, $Round: { $Top: 0.5 }, $Brother: { $Duration: 800, x: 0.2, $Delay: 40, $Cols: 12, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 1028, $Easing: { $Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad }, $Opacity: 2, $Round: { $Top: 0.5 }, $Shift: -200 } },
        { $Duration: 700, $Opacity: 2, $Brother: { $Duration: 700, $Opacity: 2 } },
        { $Duration: 800, x: 1, $Easing: { $Left: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear }, $Opacity: 2, $Brother: { $Duration: 800, x: -1, $Easing: { $Left: $Jease$.$InOutQuart, $Opacity: $Jease$.$Linear }, $Opacity: 2 } }
      ];

      var jssor_1_options = {
        $AutoPlay: 1,
        $FillMode: 5,
        $SlideshowOptions: {
          $Class: $JssorSlideshowRunner$,
          $Transitions: jssor_1_SlideshowTransitions,
          $TransitionsOrder: 1
        },
        $ArrowNavigatorOptions: {
          $Class: $JssorArrowNavigator$
        },
        $BulletNavigatorOptions: {
          $Class: $JssorBulletNavigator$
        }
      };

      var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

      /*#region responsive code begin*/

      var MAX_WIDTH = 600;

      function ScaleSlider() {
        var containerElement = jssor_1_slider.$Elmt.parentNode;
        var containerWidth = containerElement.clientWidth;

        if (containerWidth) {

          var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

          jssor_1_slider.$ScaleWidth(expectedWidth);
        }
        else {
          window.setTimeout(ScaleSlider, 30);
        }
      }

      ScaleSlider();

      $Jssor$.$AddEvent(window, "load", ScaleSlider);
      $Jssor$.$AddEvent(window, "resize", ScaleSlider);
      $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
      /*#endregion responsive code end*/
    };
  </script>
  <script type="text/javascript">jssor_1_slider_init();</script>



</body>

</html>