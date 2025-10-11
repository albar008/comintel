<?php
// $serviceData = get_posts(array(
//   'post_type' => 'service',
//   'posts_per_page' => 1,
//   'post_status' => 'publish',
//   'name' => get_query_var('related_service')
// ));
// if (empty($serviceData)) {
//   wp_redirect(esc_url(home_url('/')));
//   exit;
// }
// get_header();
// $currService = $serviceData[0];
// var_dump($currService);
get_header();
while (have_posts()) {
  the_post();
  ?>
  <?php get_template_part('template-parts/content', 'page-header', [
    'title' => get_the_title(),
    'subtitle' => get_the_excerpt()
  ]) ?>
 <?php the_content() ?>
  <?php

}
get_footer();
?>