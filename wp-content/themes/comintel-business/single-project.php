<?php
get_header();
while (have_posts()) {
  the_post();
  $excerpt = get_post_field('post_excerpt');
  $pageBanner = get_field('page_banner_image');
  ?>
  <?php get_template_part('template-parts/content', 'page-header', [
    'title' => get_the_title(),
    'subtitle' => get_field('page_subtitle'),
    'pageBannerUrl' => isset($pageBanner['sizes']) ? $pageBanner['sizes']['large'] : ''
  ]) ?>
  <section class="section-container project-detail-container">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-8">
          <?php the_post_thumbnail('projectFeatureImg', ['class' => 'img-fluid mb-5 img-thumbnail', 'height' => 800]) ?>
          <?php the_content() ?>
        </div>
        <div class="'col-12 col-md-4">
          <h2 class="fs-4">Project Information</h2>
          <div class="detail-project-information">
            <div class="detail-project-information-item-container">
              <div class="detail-project-information-item">
                <p>Project Name</p>
                <span>:</span>
                <p><?php the_title() ?></p>
              </div>
              <div class="detail-project-information-item">
                <p>Client</p>
                <span>:</span>
                <p><?php echo get_field('project_client') ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
}
get_footer();
?>