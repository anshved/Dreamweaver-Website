<?php
  include_once 'includes/connect.local.php';
  include_once 'templates/navbar.php';
?>

  <!--==========================
  Movies Section
  ============================-->
  <section id="portfolio">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Browse Movies</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">We make top quality movies</p>
        </div>
      </div>

      <?php

        $sql = "SELECT * FROM movies";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class="row">
                  <div class="col-md-3">
                    <a class="portfolio-item" style="background-image: url(images/'. $row['movie_banner'] .');" href="">
                      <div class="details">
                        <h4>'. $row['movie_name'] .'</h4>
                        <span>'. substr($row['movie_desc'], 0, 25) .'</span>
                      </div>
                    </a>
                  </div>
                </div>';
        }

      ?>  
    </div>
  </section>

<?php include_once 'templates/footer.php'; ?>