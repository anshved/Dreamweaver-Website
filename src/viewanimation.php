<?php
include_once 'includes/connect.local.php';
include_once 'templates/oldnavbar.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM animation WHERE id=$id";
$result = mysqli_query($conn, $sql) or die("Error");
$animation = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) == 0) {
    header("Location: home.php");
    exit();
}

?>

<section id="portfolio">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title"><?= $animation['name']?></h3>
          <div class="section-title-divider"></div>
          <p class="section-description"><?= $animation['description'] ?></p>
        </div>
      </div>

      <div class="card">
          <div class="col">
            <img src="images/<?= $animation['banner'];?>" alt="Animation" >
          </div>
      </div>
    </div>
  </section>
<?php include_once 'templates/footer.php';
