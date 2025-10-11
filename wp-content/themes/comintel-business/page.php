<?php
get_header();
?>
<?php
while (have_posts()) {
  the_post();
  ?>
  <?php get_template_part('template-parts/content', 'page-header', [
    'title' => get_the_title(),
  ]) ?>

  <section class="section-container">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <!-- Start: Row Grid -->
          <div class="blog-wrapper">
            <article>
              <?php the_content() ?>
            </article>
          </div><!-- End: Row Grid -->
        </div>
      </div>
    </div>
  </section>
  <?php
}
get_footer();
?>