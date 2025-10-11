<?php
get_header();
while (have_posts()) {
  the_post();
  ?>
  <?php get_template_part('template-parts/content', 'page-header', [
    'title' => get_the_title(),
  ]) ?>
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
          <?php get_template_part('template-parts/content', 'post-sidebar') ?>
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