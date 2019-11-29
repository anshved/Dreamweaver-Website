<?php
include_once 'includes/connect.local.php';
include_once 'templates/oldnavbar.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM albums WHERE id=$id";
$result = mysqli_query($conn, $sql) or die("Error");
$album = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) == 0) {
    header("Location: home.php");
    exit();
}

?>

<section id="portfolio">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?= $album['name']?></h3>
          <div class="section-title-divider"></div>
          <p class="section-description"><?= $album['description'] ?></p>
        </div>
      </div>

      <div class="card">
          <div class="col">
            <img src="images/<?= $album['banner'];?>" alt="album" >
          </div>
      </div>

        <audio src=""></audio>

      <h2 class="mt-5">Singers</h2>
      <p><?=$album['singers']?></p>

      <h2 class="mt-5">Release Date</h2>
      <p><?=$album['date']?></p>
    </div>
  </section>
<?php include_once 'templates/footer.php';
