<?php
include_once 'includes/connect.local.php';
include_once 'templates/navbar.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM movies WHERE id=$id";
$result = mysqli_query($conn, $sql) or die("Error");

if (mysqli_num_rows($result) == 0) {
    header("Location: home.php");
    exit();
}

$movie = mysqli_fetch_assoc($result);
$sql = "SELECT * FROM trailers WHERE movie_id=$id";
$result = mysqli_query($conn, $sql) or die("Error");
$trailers = mysqli_fetch_all($result, MYSQLI_BOTH);

?>

<section id="portfolio">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?=$movie['name']?></h3>
          <div class="section-title-divider"></div>
          <p class="section-description"><?=$movie['description']?></p>
        </div>
      </div>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://images.pexels.com/photos/248797/pexels-photo-248797.jpeg?auto=compress&cs=tinysrgb&h=350" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="card">
          <div class="col">
            <img src="images/<?=$movie['banner'];?>" alt="movie" >
          </div>
      </div>

      <h2 class="mt-5">Actors</h2>
      <p><?=$movie['actors']?></p>

      <h2 class="mt-5">Trailers</h2>
      <?php foreach ($trailers as $trailer): ?>
        <video class="trailer" src="videos/<?=$trailer['trailer_name']?>" controls></video>
      <?php endforeach?>

      <h2 class="mt-5">Release Date</h2>
      <p><?=$movie['date']?></p>
    </div>
  </section>
<?php include_once 'templates/footer.php';
