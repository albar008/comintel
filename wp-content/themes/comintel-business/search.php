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
          $paged = get_query_var('paged', 1);
          $keywords = get_search_query();
          $querySearch = new WP_Query([
            'posts_per_page' => 10,
            'paged' => $paged,
            's' => $keywords,
            'post_type' => 'post',
          ]);
          ?>
          <?php
          if ($querySearch->have_posts()) {
            while ($querySearch->have_posts()) {
              $querySearch->the_post();
              get_template_part('template-parts/content', 'post-card');
            }
            wp_reset_postdata();
          }
          ?>
        </div><!-- End: Row Grid -->
        <?php
        $paginateLinks = paginate_links([
          'type' => 'array',
          'total' => $querySearch->max_num_pages,
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
        <?php get_search_form() ?>
        <?php get_template_part('template-parts/content', 'list-categories') ?>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
?>