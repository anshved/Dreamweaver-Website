<?php
  include_once 'includes/connect.local.php';
  include_once 'templates/navbar.php';

  $cards = [];
  $sql = "SELECT * FROM movies WHERE status ='upcoming'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $cards = array_merge($cards, $movies);
  
  // var_dump($cards);
  $sql = "SELECT * FROM animation WHERE status ='upcoming'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $cards = array_merge($cards, $movies);

  $sql = "SELECT * FROM albums WHERE status ='upcoming'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $cards = array_merge($cards, $movies);

  $sql = "SELECT * FROM webseries WHERE status ='upcoming'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $cards = array_merge($cards, $movies);

  usort($cards, function ($item1, $item2) {
    return strtotime($item2['date_created']) - strtotime($item1['date_created']);
  });
  
  ?>

  <!--==========================
  Movies Section
  ============================-->
  <section id="portfolio">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Upcoming Projects</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">We make top quality movies</p>
        </div>
      </div>
    </div>

     <div class="container">

        <div class="row">
        <?php foreach($cards as $card) : ?>
              <div class="col-lg-3 col-md-4 col-xs-6">
                <a class="portfolio-item" style="background-image: url(images/<?=$card['banner']?>);" href="view<?=$card['type']?>.php?id=<?=$card['id']?>">
                  <div class="details">
                    <h4><?=$card['name']; ?></h4>
                    <span><?= substr($card['description'], 0, 25); ?></span>
                  </div>
                </a>
              </div>
              
          <?php endforeach ?>  
          </div>
      </div>
  </section>

<?php include_once 'templates/footer.php'; ?>