<?php
$serviceData = get_posts(array(
  'post_type' => 'service',
  'posts_per_page' => 1,
  'post_status' => 'publish',
  'name' => get_query_var('related_service')
));
if (empty($serviceData)) {
  wp_redirect(esc_url(home_url('/')));
  exit;
}
get_header();
$currService = $serviceData[0];
// var_dump($currService);
?>
<?php get_template_part('template-parts/content', 'page-header', [
  'title' => get_the_title($currService->ID),
  'subtitle' => get_the_excerpt($currService->ID)
]) ?>
<?php
$projectCats = get_terms(array(
  'taxonomy' => 'project_category',
  'hide_empty' => false,
  'meta_key' => 'related_service',
  'meta_value' => $currService->ID,
));
?>
<section class="section-container pb-0 pt-0">
  <!-- Start: Hero Clean Reverse -->
  <div class="container py-4 py-xl-5">
    <div class="service-wrapper">
      <?php
      if (!empty($projectCats)) {
        foreach ($projectCats as $projectCat) {
          $subtitle = get_field('subtitle', 'project_category_' . $projectCat->term_id);
          $catIcon = get_field('category_icon', 'project_category_' . $projectCat->term_id);
          ?>
          <article class="service-card">
            <div class="justify-content-center">
              <figure class="figure service-card__img-box"><img class="figure-img" src="<?php echo $catIcon['url'] ?>"
                  width="91" height="50" alt="comp-tech-service"></figure>
            </div>
            <h3 class="text-center" style="font-family: Unna, serif;"><?php echo $projectCat->name ?></h3>
            <p class="text-center"><?php
            echo wp_trim_words($projectCat->description, 30, '...');
            ?></p>
            <?php if (true) { ?>
              <a class="link-primary d-flex justify-content-center align-items-center" href="#"
                style="text-decoration: underline;">Learn More</><i class="far fa-hand-point-right text-primary"
                  style="margin-left: .5em;"></i>
              </a>
            <?php } ?>
          </article>
        <?php }
      } ?>
    </div><!-- End: Row Grid -->
  </div><!-- End: Hero Clean Reverse -->
</section><!-- End: Services Cat 1 -->
<?php
get_footer();
?>