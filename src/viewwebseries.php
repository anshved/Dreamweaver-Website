<?php
include_once 'includes/connect.local.php';
include_once 'templates/navbar.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM webseries WHERE id=$id";
$result = mysqli_query($conn, $sql) or die("Error");
$webseries = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) == 0) {
    header("Location: home.php");
    exit();
}

?>

<section id="portfolio">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?= $webseries['name']?></h3>
          <div class="section-title-divider"></div>
          <p class="section-description"><?= $webseries['description'] ?></p>
        </div>
      </div>

      <div class="card">
          <div class="col">
            <img src="images/<?= $webseries['banner'];?>" alt="webseries" >
          </div>
      </div>

        <audio src=""></audio>

      <h2 class="mt-5">Actors</h2>
      <p><?=$webseries['actors']?></p>


      <h2 class="mt-5">No of Seasons: <?= $webseries['season']; ?></h2>

      <h2 class="mt-5">Release Date</h2>
      <p><?=$webseries['date']?></p>
    </div>
  </section>
<?php include_once 'templates/footer.php';
