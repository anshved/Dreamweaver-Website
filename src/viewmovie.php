<?php
include_once 'includes/connect.local.php';
include_once 'templates/navbar.php';
include 'includes/functions.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM movies WHERE id=$id";
$result = mysqli_query($conn, $sql) or die("Error");

if (mysqli_num_rows($result) == 0) {
    header("Location: home.php");
    exit();
}

$movie = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM images WHERE content_id=$id and type='movies'";
$bannerResult = mysqli_query($conn, $sql) or die("Error");
$imageCount = mysqli_num_rows($bannerResult) + 1;

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
        <?php if ($imageCount !== 1): ?>

            <?php $count = 0?>
            <?php while ($count < $imageCount): ?>
              <?php if ($count == 0): ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$count?>" class="active"></li>
              <?php else: ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?=$count?>"></li>
              <?php endif?>
              <?php $count++;?>
            <?php endwhile?>

          <?php endif?>
        </ol>

        <div class="carousel-inner">

          <div class="carousel-item active">
            <img class="d-block w-100" src="images/<?=$movie['banner']?>" alt="First slide">
          </div>
          <?php while ($banner = mysqli_fetch_assoc($bannerResult)): ?>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/<?=$banner['image']?>" alt="First slide">
            </div>
          <?php endwhile?>
        </div>

        <?php if ($imageCount !== 1): ?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        <?php endif?>
      </div>

      <?php if ($movie['actors']): ?>
        <h2 class="mt-5">Actors</h2>
        <p><?=$movie['actors']?></p>
      <?php endif?>

      <?php if ($trailers): ?>
        <h2 class="mt-5">Trailers</h2>
        <?php foreach ($trailers as $trailer): ?>
          <video class="trailer" src="videos/<?=$trailer['trailer_name']?>" controls></video>
        <?php endforeach?>
      <?php endif?>

      <?php if ($movie['date']): ?>
        <h2 class="mt-5">Release Date</h2>
        <p><?=$movie['date']?></p>
      <?php endif?>

    </div>
  </section>
<?php include_once 'templates/footer.php';
