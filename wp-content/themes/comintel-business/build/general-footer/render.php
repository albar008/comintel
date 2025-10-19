<!-- Start: Footer Multi Column -->
<footer>
  <section class="section-container section-container--with-bg footer-top">
    <div class="container py-4 py-xl-5">
      <div class="row gy-3 row-cols-2">
        <!-- Start: Short Desc About Company -->
        <div class="col-12 col-md-6">
          <div class="fw-bold d-flex align-items-center mb-2"><img
              src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('set_footer_logo'))) ?>" width="287"
              height="70" alt="PT Comintel Logo Footer"></div>
          <p class="text-muted"><?php echo $attributes['footerDesc'] ?></p>
          <div class="mt-3"><small class="fs-5">Follow Us</small>
            <div class="sosmed-links">
              <?php
              $socialMediaLinks = carbon_get_theme_option('social_media_links');
              if ($socialMediaLinks) {
                foreach ($socialMediaLinks as $link) {
                  if (isset($link['cr-fa_icon_name']) && isset($link['cr-url_link'])) {
                    $iconName = $link['cr-fa_icon_name'];
                    $urlLink = $link['cr-url_link'];
                    ?>
                    <a rel="noopener noreferrer" target="_blank" href="<?php echo esc_url($urlLink) ?>"
                      aria-label="Link to <?php echo esc_html($iconName) ?>">
                      <i class="fab <?php echo esc_html($iconName) ?> fs-3 text-primary"></i>
                    </a>
                  <?php }
                }
              }
              ?>
            </div>
          </div>
        </div><!-- End: Short Desc About Company -->
        <div class="col-12 col-md-3">
          <?php echo $content; ?>
        </div>
        <div class="col-12 col-md-3">
          <div class="contact-info wp-block-comintel-business-component-link-list">
            <h3 class="fs-4 fw-bold" style="font-family: Unna, serif;">
              Contact Information </h3>
            <ul class="list-unstyled">

              <li class="with-icon wp-block-comintel-business-component-link-list-item">
                <i class="fas fa-phone-alt"></i>
                <?php echo carbon_get_theme_option('cr-com_phone_number') ?>
              </li>

              <li class="with-icon wp-block-comintel-business-component-link-list-item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:<?php echo carbon_get_theme_option('cr-com_mail') ?>"><?php echo carbon_get_theme_option('cr-com_mail') ?></a>
              </li>

              <li class="with-icon wp-block-comintel-business-component-link-list-item">
                <i class="fas fa-clock"></i>
                <?php echo carbon_get_theme_option('cr-com_work_hours') ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="footer-bottom">
    <div class="container">
      <div class="py-4">
        <p><?php echo $attributes['footerCopyright'] ?></p>
      </div>
    </div>
  </section>
</footer><!-- End: Footer Multi Column -->