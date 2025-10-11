<?php
get_header();
block_template_part('home-header');
?>
<section class="section-container">
  <div class="container d-flex py-4 py-xl-5">
    <div class="row gy-4 gx-lg-5">
      <div class="col-12 col-md-6">
        <!-- Start: Grid Image Container -->
        <div class="grid-image__container">
          <div class="grid-image__item"><img src="<?php echo get_theme_file_uri('assets/images/chips.jpg') ?>"
              loading="lazy" alt="Computer Tech"></div>
          <div class="grid-image__item"><img class="img-fluid"
              src="<?php echo get_theme_file_uri('assets/images/satelite.jpg') ?>" loading="lazy"
              alt="Telecommunication"></div>
          <div class="grid-image__item"><img class="img-fluid"
              src="<?php echo get_theme_file_uri('assets/images/laptop.jpg') ?>" loading="lazy"
              alt="Information System"></div>
          <div class="grid-image__divider"></div>
        </div><!-- End: Grid Image Container -->
      </div>
      <div class="col-12 col-md-6">
        <header class="section-header section-header--with-bg"><small class="fs-6 section-header__subtitle">About
            Us</small>
          <h2 class="section-header__title" style="font-family: Unna, serif;">Who we are</h2>
        </header>
        <p>Welcome to <em>PT Comintel Tamarang Pratama</em><strong>.</strong> We are a company committed to being the
          leading provider of technology and telecommunication solutions. Established with the vision to address the
          challenges of the digital era, we deliver a wide range of services and products designed to help businesses
          and individuals adapt and thrive in an increasingly connected world.</p>
        <p>We understand that technology is not just about hardware or software but about how these solutions enhance
          productivity, efficiency, and user experiences. With a team of experienced professionals, we bring
          innovations
          that prioritize customer needs and deliver impactful results.</p>
        <div class="d-flex justify-content-end">
          <!-- Start: Button With Icon --><a class="btn btn-primary mt-3"
            href="<?php echo esc_url(site_url('/about-us')) ?>" role="button"><img
              src="<?php echo get_theme_file_uri('assets/images/about-btn-icon.svg') ?>" width="23" height="24"
              alt="more-about-us-icon">&nbsp;<span><span style="font-weight: normal !important;">More About
                Us</span></span></a><!-- End: Button With Icon -->
        </div>
      </div>
    </div>
  </div>
</section><!-- End: About -->
<!-- Start: Solutions -->
<section class="section-container section-container--with-bg">
  <div class="container py-4 py-xl-5">
    <div class="row">
      <div class="col-12">
        <header class="section-header section-header--center"><small class="fs-6 section-header__subtitle">Our
            Solutions</small>
          <h2 class="section-header__title" style="font-family: Unna, serif;">The Solutions We Offer</h2>
          <p class="section-header__desc">Our comprehensive range of solutions encompasses various domains, providing
            effective resolutions.</p>
        </header>
      </div>
    </div>
    <div class="row gx-3 gy-3 row-cols-1 row-cols-md-3 justify-content-center solution-content__row">
      <div class="col">
        <div class="d-flex justify-content-center align-items-center gap-2 solution-card"><img
            src="<?php echo get_theme_file_uri('assets/images/Solution__Product-Icon.svg') ?>" width="85" height="50"
            alt="Product-Based Icon">
          <h3 style="font-family: Unna, serif;"><strong>Product-Based</strong></h3>
          <article class="solution-card__overlay-container">
            <header class="d-flex align-items-center solution-card__overlay-header"><img
                src="<?php echo get_theme_file_uri('assets/images/Solution__Product-Icon.svg') ?>" width="37"
                height="29" style="/*color: white;*/filter: invert(1);" alt="Product-Based Icon">
              <h4>Product-Based</h4>
            </header>
            <p>Selling hardware or software products directly to consumers or businesses.</p>
            <div class="triangle"><i class="fa fa-info icon" style="font-size: 22px;"></i></div>
          </article>
          <div class="triangle"><i class="fa fa-info icon" style="font-size: 22px;"></i></div>
        </div>
      </div>
      <div class="col">
        <div class="d-flex justify-content-center align-items-center gap-2 solution-card"><img
            src="<?php echo get_theme_file_uri('assets/images/Solution__Service-Icon.svg') ?>" width="85" height="50"
            alt="Service-Based Icon">
          <h3 style="font-family: Unna, serif;"><strong>Service-Based</strong></h3>
          <article class="solution-card__overlay-container">
            <header class="d-flex align-items-center solution-card__overlay-header"><img
                src="<?php echo get_theme_file_uri('assets/images/Solution__Service-Icon.svg') ?>" width="37"
                height="29" style="/*color: white;*/filter: invert(1);" alt="Service-Based Icon">
              <h4>Project-Based</h4>
            </header>
            <p>Providing ongoing services like cloud computing, IT support, or telecommunication services.</p>
            <div class="triangle"><i class="fa fa-info icon" style="font-size: 22px;"></i></div>
          </article>
          <div class="triangle"><i class="fa fa-info icon" style="font-size: 22px;"></i></div>
        </div>
      </div>
      <div class="col">
        <div class="d-flex justify-content-center align-items-center gap-2 solution-card"><img
            src="<?php echo get_theme_file_uri('assets/images/Solution__Consult-Icon.svg') ?>" width="85" height="50"
            alt="Consulting Icon">
          <h3 style="font-family: Unna, serif;"><strong>Consulting</strong></h3>
          <article class="solution-card__overlay-container">
            <header class="d-flex align-items-center solution-card__overlay-header"><img
                src="<?php echo get_theme_file_uri('assets/images/Solution__Consult-Icon.svg') ?>" width="37"
                height="29" style="/*color: white;*/filter: invert(1);" alt="Consulting Icon">
              <h4>Consulting</h4>
            </header>
            <p>Offering expertise and advice to help businesses implement or manage their CIT systems.</p>
            <div class="triangle"><i class="fa fa-info icon" style="font-size: 22px;"></i></div>
          </article>
          <div class="triangle"><i class="fa fa-info icon" style="font-size: 22px;"></i></div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End: Solutions -->
<!-- Start: Services -->
<section class="section-container">
  <!-- Start: Hero Clean Reverse -->
  <div class="container py-4 py-xl-5">
    <div class="row">
      <div class="col-12">
        <header class="section-header section-header--center"><small class="fs-6 section-header__subtitle">Our
            Services</small>
          <h2 class="section-header__title" style="font-family: Unna, serif;">What We Do</h2>
          <p class="section-header__desc">At Comintel Tamarang Pratama, we provide technology services that help your
            business grow.</p>
        </header>
      </div>
    </div><!-- Start: Row Grid -->
    <div class="service-wrapper">
      <?php
      $terms = get_terms(array(
        'taxonomy' => 'service_category',
        'hide_empty' => false,
      ));
      if (!empty($terms)) {
        foreach ($terms as $term) {
          $subtitle = get_field('subtitle', 'service_category_' . $term->term_id);
          $catIcon = get_field('category_icon', 'service_category_' . $term->term_id);
          ?>
          <article class="service-card">
            <div>
              <figure class="figure service-card__img-box"><img class="figure-img" src="<?php echo $catIcon['url'] ?>"
                  width="91" height="50" alt="<?php echo $catIcon['alt'] ?>"></figure>
              <span class="service-card__category"><?php echo $subtitle ?></span>
            </div>
            <h3 style="font-family: Unna, serif;"><?php echo $term->name ?></h3>
            <p><?php echo $term->description ?></p><a class="link-primary"
              href="<?php echo esc_url(site_url('services')) ?>"><span style="text-decoration: underline;">Learn
                More</span><i class="far fa-hand-point-right text-primary" style="margin-left: .5em;"></i></a>
          </article>
        <?php }
      } ?>
    </div><!-- End: Row Grid -->
    <div class="d-flex justify-content-center mt-5"><a class="btn btn-primary"
        href="<?php echo esc_url(site_url('services')) ?>" role="button"><span
          style="font-weight: normal !important;">View All Services</span></a></div>
  </div><!-- End: Hero Clean Reverse -->
</section><!-- End: Services -->
<!-- Start: Banner -->
<section class="section-banner section-banner--primary" style="color: var(--brand-white);">
  <div class="container py-4 py-xl-5">
    <div class="row">
      <div class="col">
        <div class="section-banner-home__content">
          <h3>Ready to elevate your business with our solutions? Let’s discuss your needs today!</h3><button
            class="btn btn-secondary" type="button">REQUEST A QUOTE</button>
        </div>
      </div>
    </div>
  </div>
</section><!-- End: Banner -->
<!-- Start: Latest Post -->
<section class="section-container">
  <div class="container py-4 py-xl-5">
    <div class="row gy-3">
      <div class="col-lg-5">
        <header class="section-header"><small class="fs-6 section-header__subtitle">Our Latest News</small>
          <h2 class="section-header__title" style="font-family: Unna, serif;">Our Latest News And Insights</h2>
        </header>
        <p class="section-header__desc">Dive into our blog for the latest advancements in technology, IT systems, and telecommunications. Discover
          expert insights, actionable tips, and emerging trends that help you stay ahead in an ever-evolving industry.
          Designed for business leaders and tech enthusiasts, our articles keep you informed and inspired.</p><a
          href="<?php echo esc_url(site_url('blog')) ?>" class="btn btn-primary d-none d-lg-inline-block"
          role="button"><span style="font-weight: normal !important;">View All
            News</span></a>
      </div>
      <div class="col">
        <!-- Start: Row Grid -->
        <div class="blog-wrapper">
          <?php
          $latestPostsArgs = [
            'post_type' => 'post',        // Atau custom post type seperti 'project'
            'posts_per_page' => 2,             // Ambil 2 post
            'orderby' => 'date',        // Berdasarkan tanggal
            'order' => 'DESC',        // Urutan terbaru duluan
          ];

          $latestPosts = new WP_Query($latestPostsArgs);
          if ($latestPosts->have_posts()) {
            while ($latestPosts->have_posts()) {
              $latestPosts->the_post();
              get_template_part('template-parts/content', 'post-card');
            }
            wp_reset_postdata();
          } ?>
        </div><!-- End: Row Grid -->
      </div>
    </div>
    <div class="d-flex justify-content-center mt-5"><a href="<?php echo esc_url(site_url('blog')) ?>"
        class="btn btn-primary d-block d-lg-none" role="button"><span style="font-weight: normal !important;">View All
          News</span></a></div>
  </div>
</section><!-- End: Latest Post -->

<?php
get_footer();
?>