<?php 

include_once 'templates/navbar.php';
require 'includes/connect.local.php';

$sql = "SELECT * FROM news";
$result = mysqli_query($conn, $sql) or die("Error");
$news = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
    <!-- Main Content -->
    <section id="testimonials">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">News and Press</h3>
                    <div class="section-title-divider"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-md-offset-2">
                    <?php foreach($news as $newsitem) : ?>
                        <div class="wow fadeInLeft post-preview">
                            <a href="news-detail.php?id=<?=$newsitem['id']?>">
                                <h2 class="post-title">
                                    <?= $newsitem['headline']; ?>
                                </h2>
                            </a>
                            <?php $date = strtotime($newsitem['date']) ?>
                            <p class="post-meta">Posted by
                                <a href="#">Himanshu Asher</a>
                                on <?= date('d F, Y', $date) ?></p>
                        </div>
                        <hr>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <!-- <hr> -->
    </section>

<?php include_once 'templates/footer.php' ?>
