<?php
get_header();
?>
<?php
while (have_posts()) {
  the_post();
  ?>
  <?php get_template_part('template-parts/content', 'page-header', [
    'title' => get_the_title(),
    'subtitle' => 'Feel free to reach out to us if you have any questions, need more information, or would like to discuss the right solution for your needs.'
  ]) ?>
  <section class="section-container pb-0">
    <div class="container p-2">
      <div class="row mb-4">
        <div class="col-12 col-md-6 order-last order-md-first">
          <section class="contact contact-info">
            <ul>
              <li>
                <div><i class="fa fa-phone fs-2"></i></div>
                <div>
                  <h3 class="fs-4" style="font-family: Unna, serif;">Make A Call</h3>
                  <p>+62 8511-0805-646</p>
                </div>
              </li>
              <li>
                <div><i class="fa fa-envelope fs-2"></i></div>
                <div>
                  <h3 class="fs-4" style="font-family: Unna, serif;">Send A Mail</h3>
                  <p><a href="mailto:info@comintel-tp.com">info@comintel-tp.com</a></p>
                </div>
              </li>
              <li>
                <div><i class="fa fa-clock-o fs-2"></i></div>
                <div>
                  <h3 class="fs-4" style="font-family: Unna, serif;">Business Operation</h3>
                  <p>Mon - Fri: 9AM - 9PM</p>
                </div>
              </li>
            </ul>
          </section>
        </div>
        <div class="col-12 col-md-6 order-first order-md-last mb-3 mb-lg-0">
          <section class="contact contact-form">
            <h2 class="fs-3" style="font-family: Unna, serif;">If You Have Questions Please Contact Us</h2>
            <p>We're here to help you find the right technology solution. Fill out the form below and our team will get
              back to you shortly to start the conversation.</p>
            <form class="ctp-form">
              <div class="row mb-3">
                <div class="col">
                  <div class="form-floating"><input class="form-control" type="text" id="name"><label class="form-label"
                      for="name">Name</label></div>
                </div>
                <div class="col">
                  <div class="form-floating"><input class="form-control" type="text" id="phone" inputmode="tel"><label
                      class="form-label" for="phone">Phone</label></div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <div class="form-floating"><input class="form-control" type="text" id="email" inputmode="email"><label
                      class="form-label" for="email">Email</label></div>
                </div>
                <div class="col">
                  <div class="form-floating"><input class="form-control" type="text" id="subject"><label
                      class="form-label" for="subject">Subject</label></div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <div class="form-floating"><textarea class="form-control message" rows="5" cols="50"
                      style="height: 200px;"></textarea><label class="form-label" for="message">Your Message</label></div>
                </div>
              </div><button class="btn btn-secondary" type="button">Send</button>
            </form>
          </section>
        </div>
      </div>
    </div>
    <div class="mt-5">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31726.7435549676!2d107.06379271382261!3d-6.284366448719146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69855674a1e225%3A0x70027d2a7b4c6602!2sCikarang%2C%20Sukadanau%2C%20Kec.%20Cikarang%20Bar.%2C%20Kabupaten%20Bekasi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1744453484514!5m2!1sid!2sid"
        width="100%" height="500" style="border:0;margin-block-end:-7px" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section><!-- Start: Footer Multi Column -->
  <?php
}
get_footer();
?>