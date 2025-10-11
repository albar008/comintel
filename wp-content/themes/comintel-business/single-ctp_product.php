<?php
get_header();
while (have_posts()) {
  the_post();
  ?>
  <header id="page-header" class="pt-5">
    <div id="page-header__particles"></div>
    <div class="container pt-4 pt-xl-5">
      <div class="row pt-5">
        <div class="col-12 text-md-start">
          <div class="page-header__content-container">
            <h1 class="page-header__title" style="font-family: Unna, serif;"><?php the_title() ?></h1>
            <!-- <p>Discover engaging articles on digital innovation, technology-driven business solutions, and industry trends
              to help your business thrive in the digital era."</p> -->
          </div>
        </div>
      </div>
    </div>
  </header>
  <section class="section-container">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-7 col-lg-8 order-last order-md-first">
          <!-- Start: Row Grid -->
          <div class="blog-wrapper">
            <article>
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail('full', [
                  'class' => 'img-fluid mb-4 img-thumbnail'
                ]);
              } ?>
              <?php the_content() ?>
              <?php
              // Harus di dalam loop
              $link_pages = wp_link_pages([
                // 'next_or_number' => 'next',
                'before' => '<div class="com-single-page-links-container">Pages: ',
                'after' => '</div>',
                'nextpagelink' => '<span class="next-page">Next Page</span>',
                'previouspagelink' => '<span class="prev-page">Previous Page</span>',
                'echo' => 0,
              ]);

              if (!empty($link_pages)) {
                echo $link_pages;
              }

              ?>
            </article>
          </div><!-- End: Row Grid -->
          <?php echo do_shortcode('[addtoany]'); ?>
        </div>
        <div class="col-12 col-md-5 col-lg-4 order-first order-md-last mb-3 mb-lg-0">
          <p>Sidebar Product</p>
        </div>
      </div>
    </div>
  </section>

  <?php
  // if ( comments_open() || get_comments_number() ) :
  //     comments_template();
  // endif;
?>
<?php
}
get_footer();
?>