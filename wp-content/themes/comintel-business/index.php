<?php
get_header();
?>
<?php get_template_part('template-parts/content', 'page-header', [
    'title' => 'Our Blog',
    'subtitle' => 'Discover engaging articles on digital innovation, technology-driven business solutions, and industry trends
            to help your business thrive in the digital era.'
  ]) ?>
<section class="section-container">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-7 col-lg-8 order-last order-md-first">
        <!-- Start: Row Grid -->
        <div class="blog-wrapper">
          <?php
          while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'post-card');
          }
          ?>
        </div><!-- End: Row Grid -->
        <?php
        $paginateLinks = paginate_links([
          'type' => 'array',
        ]);
        if (isset($paginateLinks) && !empty($paginateLinks)) {
          ?>
          <nav class="mt-3">
            <ul class="pagination">
              <?php
              foreach ($paginateLinks as $link) {
                echo '<li class="page-item">' . $link . '</li>';
              }
              ?>
            </ul>
          </nav>
          <?php
        }
        ?>
      </div>
      <div class="col-12 col-md-5 col-lg-4 order-first order-md-last mb-3 mb-lg-0">
        <?php get_template_part('template-parts/content', 'post-sidebar') ?>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
?>