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
                  <p><?php echo carbon_get_theme_option('cr-com_phone_number') ?></p>
                </div>
              </li>
              <li>
                <div><i class="fa fa-envelope fs-2"></i></div>
                <div>
                  <h3 class="fs-4" style="font-family: Unna, serif;">Send A Mail</h3>
                  <p><a href="mailto:<?php echo carbon_get_theme_option('cr-com_mail') ?>"><?php echo carbon_get_theme_option('cr-com_mail') ?></a></p>
                </div>
              </li>
              <li>
                <div><i class="fa fa-clock-o fs-2"></i></div>
                <div>
                  <h3 class="fs-4" style="font-family: Unna, serif;">Business Operation</h3>
                  <p><?php echo carbon_get_theme_option('cr-com_work_hours') ?></p>
                </div>
              </li>
            </ul>
          </section>
        </div>
        <div class="col-12 col-md-6 order-first order-md-last mb-3 mb-lg-0">
          <section class="contact contact-form">
            <?php the_content() ?>
            <!-- <h2 class="fs-3" style="font-family: Unna, serif;">If You Have Questions Please Contact Us</h2>
            <p>We're here to help you find the right technology solution. Fill out the form below and our team will get
              back to you shortly to start the conversation.</p> -->
            <!-- <form class="ctp-form">
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
            </form> -->
          </section>
        </div>
      </div>
    </div>
    <div class="mt-5">
      <iframe
        src="https://maps.google.com/maps?q=<?php echo carbon_get_theme_option('cr-com_lat') ?>,<?php echo carbon_get_theme_option('cr-com_long') ?>&z=15&output=embed"
        width="100%" height="500" style="border:0;margin-block-end:-7px" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section><!-- Start: Footer Multi Column -->
  <?php
}
get_footer();
?>