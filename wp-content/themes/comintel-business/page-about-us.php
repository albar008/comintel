<?php
get_header();
?>
<?php get_template_part('template-parts/content', 'page-header', [
  'title' => 'About Us',
  'subtitle' => 'Learn More About Who We Are and What Drives Us Forward.'
]) ?>
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
        <p>PT Comintel Tamarang Pratama is a company committed to being a leading provider of technology and
          telecommunication solutions. Established with the vision to address the challenges of the digital era, we
          deliver a wide range of services and products designed to help businesses and individuals adapt and thrive
          in
          an increasingly connected world. We prioritize quality and reliability in every solution we offer, ensuring
          that the technology we implement helps our clients achieve their business goals more efficiently and
          quickly.
        </p>
        <p>We understand that technology is not just about hardware or software but about how these solutions enhance
          productivity, efficiency, and user experiences. With a team of experienced professionals, we bring
          innovations
          that prioritize customer needs and deliver impactful results. With a customer-focused approach, we not only
          provide technology solutions but also serve as strategic partners in their digital transformation journey.
        </p>
      </div>
    </div>
  </div>
</section><!-- End: About -->
<section class="section-container section-core-values">
  <div class="container py-4 py-xl-5">
    <div class="ribbon">
      <h2 style="font-family: Unna, serif;">The Heart of Who We Are</h2>
    </div>
    <div class="row">
      <div class="col d-flex justify-content-center justify-content-lg-end">
        <div class="core-values__media">
          <figure class="figure" style="/*margin: auto;*/"><img class="img-fluid figure-img"
              src="<?php echo get_theme_file_uri('assets/images/ctp-core-values.png') ?>" width="699" height="472"
              alt="Our core values Image">
            <figcaption class="figure-caption text-center d-lg-none mt-2">Our Core Values</figcaption>
          </figure>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-container">
  <div class="container py-4 py-xl-5">
    <div class="row">
      <div class="col-md-6 d-none d-md-block">
        <div class="rect-img--left rect-img--decoration"><img
            src="<?php echo get_theme_file_uri('assets/images/room-ctp1.png') ?>"
            alt="vision and mission - image"></div>
      </div>
      <div class="col-12 col-md-6">
        <article class="vision-box">
          <h2 class="heading-left-decoration" style="font-family: Unna, serif;"><strong>Our Vision</strong></h2>
          <p>To be a trusted partner connecting businesses and communities through innovative and sustainable
            technology
            solutions, creating a smarter and more connected digital future.</p>
        </article>
        <article class="mission-box mt-4">
          <h2 class="heading-left-decoration" style="font-family: Unna, serif;"><strong>Our Mission</strong></h2>
          <ul>
            <li>Empowering businesses with cutting-edge technology solutions.</li>
            <li>Fostering innovation and collaboration to drive digital transformation.</li>
            <li>Providing reliable, scalable, and impactful technology services.</li>
            <li>Building a sustainable future through technology and teamwork.</li>
            <li>Fostering innovation and adaptability to shape a smarter, more connected future.</li>
          </ul>
        </article>
      </div>
    </div>
  </div>
</section>
<section class="section-container section-container--with-bg">
  <div class="container py-4 py-xl-5">
    <div class="row">
      <div class="col-lg-5">
        <header class="section-header"><small class="fs-6 section-header__subtitle">Founders</small>
          <h2 class="section-header__title" style="font-family: Unna, serif;">Built by Passion, Led by Expertise</h2>
        </header>
        <p>Founded with a spirit of innovation and led by experienced experts, we are committed to delivering
          impactful
          technology solutions. With a blend of passion and expertise, we are shaping a smarter and more sustainable
          digital future.</p>
      </div>
      <div class="col">
        <!-- Start: Row Grid -->
        <div class="team-wrapper">
          <article class="team-card">
            <figure class="figure team-card__img-box">
              <div class="team-card__sosmed"><a href="" aria-label="team-linkedin"><i
                    class="fab fa-linkedin fs-4"></i></a><a href="#" aria-label="team-mail"><i
                    class="fas fa-envelope fs-4"></i></a></div><img class="figure-img"
                src="<?php echo get_theme_file_uri('assets/images/founder/founder.jpeg') ?>" width="272" height="200"
                alt="Figure__Cara-Membuat-Gambar-Pakai-Meta-AI">
            </figure>
            <div class="team-card__content">
              <h3 class="fs-4 fw-bold" style="font-family: Unna, serif;"><a href="#"><span
                    style="font-weight: normal !important;">Ir Budiman Ajie</span></a></h3>
              <p>Founder</p>
            </div>
          </article>
          <article class="team-card">
            <figure class="figure team-card__img-box">
              <div class="team-card__sosmed"><a rel="noopener noreferrer" target="_blank" href="www.linkedin.com/in/mohamad-albar-640477124" aria-label="team-linkedin"><i
                    class="fab fa-linkedin fs-4"></i></a><a href="#" aria-label="team-mail"><i
                    class="fas fa-envelope fs-4"></i></a></div><img class="figure-img"
                src="<?php echo get_theme_file_uri('assets/images/founder/co-founder.jpeg') ?>" width="272" height="200"
                alt="Figure__Cara-Membuat-Gambar-Pakai-Meta-AI">
            </figure>
            <div class="team-card__content">
              <h3 class="fs-4 fw-bold" style="font-family: Unna, serif;"><a href="#"><span
                    style="font-weight: normal !important;">Mohamad Albar S.T</span></a></h3>
              <p>Co-Founder</p>
            </div>
          </article>
        </div><!-- End: Row Grid -->
      </div>
    </div>
  </div>
</section>
<section class="section-container position-relative">
  <div
    style="width: 100%;height: 100%;position: absolute;background-image: url(&quot;<?php echo get_theme_file_uri('assets/images/contact.jpg') ?>&quot;);z-index: -1;opacity: 0.30;top: 0;left: 0;background-size: cover;background-repeat: no-repeat;">
  </div>
  <div class="container py-4 py-xl-5">
    <div class="row">
      <div class="col">
        <h3 class="fs-2 text-center" style="font-family: Unna, serif;">Ready to transform your business? <br>Contact
          us
          today!</h3>
        <p class="text-center">Discover how our innovative solutions can empower your growth and drive success in the
          digital era.</p>
        <div class="d-flex justify-content-center gap-3 mt-5"><a class="btn btn-primary"
            href="<?php echo esc_url(site_url('contact')) ?>" role="button">Contact
            Us</a><a class="btn btn-outline-primary" href="<?php echo esc_url(site_url('services')) ?>"
            role="button">Our Services</a></div>
      </div>
    </div>
  </div>
</section><!-- Start: Footer Multi Column -->
<?php
get_footer();
?>