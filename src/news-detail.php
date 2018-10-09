<?php
include_once 'templates/navbar.php';
require 'includes/connect.local.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * FROM news WHERE id=$id";
$result = mysqli_query($conn, $sql) or die("Error");

if (mysqli_num_rows($result) == 0) {
    header("Location: home.php");
    exit();
}

$news = mysqli_fetch_assoc($result);

?>

    <section id="testimonials">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title"><?=$news['headline']?></h3>
                    <div class="section-title-divider"></div>
                </div>
            </div>
        </div>
    <article>
      <div class="container">
        <div class="wow fadeInUp row">
          <div class="col-lg-8 col-md-10 col-md-offset-2">
            <img class="img-fluid" src="images/<?=$news['image']?>" alt="">
            <p class='mt-5 my-para'><span class="first-letter"><?=substr($news['description'], 0, 1)?></span><?=substr($news['description'], 1)?> </p>
          </div>
        </div>
      </div>
    </article>
    </section>
    <hr>

<?php include_once 'templates/footer.php'?>