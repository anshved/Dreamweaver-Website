<?php include_once 'templates/navbar.php' ?>

  <!--==========================
  Contact Section
  ============================-->
  <section id="contact">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Contact Us</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
      </div>

      <div class="row">
          <div class="col-md-5 col-md-offset-1">
              <div class="form">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="https://formspree.io/vivekbgawande@gmail.com" method="post">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars"
                    />
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email"  placeholder="Your Email" />
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject"  placeholder="Subject"/>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                  </div>
                  <div class="text-center">
                    <button type="submit">Send Message</button>
                  </div>
                </form>
              </div>
            </div>
        <div class="col-md-3 col-md-push-2">
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>Silver Street
                <br>Golden City, 000-000</p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              <p>info@example.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>+91 9999999999</p>
            </div>

          </div>
        </div>
      </div>
      <!-- <div id="map" style="width:400px;height:400px;background:yellow"></div> -->

    </div>
  </section>

<?php include_once 'templates/footer.php' ?>
