<?php include_once 'templates/navbar.php'; ?>

<!-- =====================================
  Upload Section
====================================== -->

<form class="contact-form center" action="includes/register.inc.php" method="POST" enctype="multipart/form-data">
  <section id="upload" class="section-bg wow fadeInUp">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- <h3 class="section-title">Upload Here</h3>
          <div class="section-title-divider"></div> -->
          <p class="col-md-4 col-md-offset-4 section-description upload-text">Got Talent ? Upload</p>
<p class="col-md-4 col-md-offset-4 section-description upload-text">
Dream weaver productions is always on the look out for exceptionally talented individuals, be it on the creative or technical side.
</p>
<p class="col-md-4 col-md-offset-4 section-description upload-text">
We promise to give a platform to ambitious and talented individuals in our current/forthcoming ventures.
</p>
<p class="col-md-4 col-md-offset-4 section-description upload-text">
(Also we are open at any mad ideas in the creative domain that you might possibly have and wish to make it a reality. Please do not hesitate to share)
</p>
</div>
</div>
</div>
</section>

<section id="form" class="section-bg wow fadeInUp">
<div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Upload Details Here..</h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
      <div class="container wow fadeInUp">
        <div class="form">

          <div class="row">
            <div class="form-group col-md-offset-1 col-md-3 mt-2">
              <label for="firstname">First Name</label>
            </div>
            <div class="form-group col-md-6">
              <?php
if (isset($_SESSION['formFilled'])) {
    echo '<input type="text" class="form-control" name="firstname" value="' . $_SESSION['firstname'] . '" placeholder="Enter Firstname"/>';
} else {
    echo '<input type="text" class="form-control" name="firstname" placeholder="Enter Firstname"/>'
    ;
}
?>
            </div>


          </div>
          <div class="row">
            <div class="form-group col-md-offset-1 col-md-3 mt-2">
              <label for="lastname">Last Name</label>
            </div>
            <div class="form-group col-md-6">
              <?php
if (isset($_SESSION['formFilled'])) {
    echo '<input id="lastname" type="text" name="lastname" class="form-control" value="' . $_SESSION['lastname'] . '" placeholder="Enter Lastname"/>';
} else {
    echo '<input id="lastname" type="text" name="lastname" class="form-control" placeholder="Enter Lastname"/>'
    ;
}
?>
            </div>
          </div>
        

        <div class="row">
          <div class="form-group col-md-offset-1 col-md-3 mt-2">
            <label for="typeofupload">Type of Upload</label>
          </div>
          <div class="form-group col-md-3">
            <?php if (isset($_SESSION['formFilled'])) {
    echo '<select class="form-control" value="' . $_SESSION['typeofupload'] . '" name="typeofupload">
                            <option>Video</option>
                            <option>Audio</option>
                            <option>Script</option>
                            <option>Other</option>
                          </select>
                          </div>';
} else {
    echo '<select class="form-control" name="typeofupload">
                          <option>Video</option>
                          <option>Audio</option>
                          <option>Script</option>
                          <option>Other</option>
                          </select>
                          </div>';
}

?>
          </div>
          <div class="row">
            <div class="form-group col-md-offset-1 col-md-3 mt-2">
              <label for="resume">Resume</label>
            </div>
            <div class="form-group col-md-6">
              <?php if (isset($_SESSION['formFilled'])) {
    echo '<input type="text" class="form-control" name="resume" value="' . $_SESSION['email'] . '" placeholder="Drop Your Resume Link"/>';
} else {
    echo '<input type="text" class="form-control" name="resume" placeholder="Drop Your Resume Link"/>';
}

?>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-offset-1 col-md-3 mt-2">
              <label for="email">Email</label>
            </div>
            <div class="form-group col-md-6">
              <?php if (isset($_SESSION['formFilled'])) {
    echo '<input type="email" class="form-control" name="email" value="' . $_SESSION['email'] . '" placeholder="Enter Email Id"/>';
} else {
    echo '<input type="email" class="form-control" name="email" placeholder="Enter Email Id"/>';
}

?>
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-offset-1 col-md-3 mt-2">
              <label for="contact">Mobile Number</label>
            </div>
            <div class="form-group col-md-6">
              <?php if (isset($_SESSION['formFilled'])) {
    echo '<input type="text" title="Enter a Valid Phone Number" value="' . $_SESSION['contact'] . '" class="form-control" name="contact" placeholder="Enter Mobile Number"/>';
} else {
    echo '<input type="text" title="Enter a Valid Phone Number" class="form-control" name="contact" placeholder="Enter Mobile Number"/>';
}

?>

            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-offset-1 col-md-3 mt-4">
              <label for="description">Description</label>
            </div>
            <div class="form-group col-md-6">

              <textarea class="form-control" name="Description" rows="3" placeholder="Enter Description , Youtube/Instagram/Facebook links"></textarea>

            </div>
          </div>


          <div class="row">
            <div class="form-group col-md-offset-1 col-md-3 mt-2">
              <label for="signature">Upload File</label>
            </div>
            <div class="form-group col-md-6">
              <input name="signature" class="mx-3 mb-3" type="file">
            </div>
          </div>
        </div>

          <div class="action row mt-5">
            <div class="col-md-offset-4">
              <a href="">
                <button class="col-md-2 btn-reset" type="reset">Reset</button>
              </a>

              <a href="">
                <button class="col-md-2 btn-register" onclick="" type="submit" name="submit">Upload</button>
              </a>
            </div>
          </div>
        </div>
      </div>

</form>
</section>

<!-- #upload -->

<?php include_once 'templates/footer.php'; ?>