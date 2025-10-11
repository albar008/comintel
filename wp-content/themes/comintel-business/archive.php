<?php
get_header();
?>
<header id="page-header" class="pt-5">
  <div id="page-header__particles"></div>
  <div class="container pt-4 pt-xl-5">
    <div class="row pt-5">
      <div class="col-12 text-md-start">
        <div class="page-header__content-container">
          <h1 class="page-header__title" style="font-family: Unna, serif;">Our Blog</h1>
          <p>Discover engaging articles on digital innovation, technology-driven business solutions, and industry trends
            to help your business thrive in the digital era."</p>
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
        <?php get_search_form() ?>
        <?php get_template_part('template-parts/content', 'list-categories') ?>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();
?>