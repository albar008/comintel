<?php
get_header();
?>
<?php get_template_part('template-parts/content', 'page-header', [
  'title' => 'Our Services',
  'subtitle' => 'PT Comintel Tamarang Pratama, we provide technology services that help your business grow.'
]) ?>
<?php
$terms = get_terms(array(
  'taxonomy' => 'service_category',
  'hide_empty' => false,
));
if (!empty($terms)) {
  foreach ($terms as $term) {
    $subtitle = get_field('subtitle', 'service_category_' . $term->term_id);
    $catIcon = get_field('category_icon', 'service_category_' . $term->term_id);
    // print_r($catIcon);
    // echo "<br/>";
    // echo $subtitle;
    // echo "<br/>";
    // echo "==============";
    ?>
    <section class="section-container pb-0 pt-0">
      <!-- Start: Hero Clean Reverse -->
      <div class="container py-4 py-xl-5">
        <div class="row">
          <div class="col-12">
            <header class="section-header section-header--center"><small
                class="fs-6 section-header__subtitle"><?php echo $subtitle ?></small>
              <h2 class="section-header__title" style="font-family: Unna, serif;"><?php echo $term->name ?></h2>
              <p class="section-header__desc"><?php echo $term->description ?></p>
            </header>
          </div>
        </div><!-- Start: Row Grid -->
        <div class="service-wrapper">
          <?php
          $query = new WP_Query([
            'post_type' => 'service',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'tax_query' => [
              [
                'taxonomy' => 'service_category',
                'field' => 'term_id',
                'terms' => $term->term_id,
              ],
            ],
          ]);
          while ($query->have_posts()) {
            $query->the_post();
            $icon = get_field('service_icon');
            ?>
            <article class="service-card">
              <div class="justify-content-center">
                <figure class="figure service-card__img-box"><img class="figure-img" src="<?php echo $icon['url'] ?>"
                    width="91" height="50" alt="comp-tech-service"></figure>
              </div>
              <h3 class="text-center" style="font-family: Unna, serif;"><?php the_title() ?></h3>
              <p class="text-center"><?php
              if (has_excerpt()) {
                echo wp_strip_all_tags(wp_trim_words(get_the_excerpt(), 20));
              } else {
                echo wp_strip_all_tags(wp_trim_words(get_the_content(), 20));
              }
              ?></p>
              <?php if (!empty(get_the_content())) { ?>
                <a class="link-primary d-flex justify-content-center align-items-center"
                  href="<?php echo esc_url(site_url('services/') . get_post_field('post_name')) ?>"><span
                    style="text-decoration: underline;">Learn More</span><i class="far fa-hand-point-right text-primary"
                    style="margin-left: .5em;"></i>
                </a>
              <?php } ?>
            </article>
            <?php
          }
          wp_reset_postdata();
          ?>
        </div><!-- End: Row Grid -->
      </div><!-- End: Hero Clean Reverse -->
    </section><!-- End: Services Cat 1 -->
    <?php
  }
}
?>
<div class="mt-5 pt-3"> </div>
<!-- Start: Bottom Banner -->
<section class="section-container position-relative mt-5">
  <div
    style="width: 100%;height: 100%;position: absolute;background-image: url(&quot;<?php echo get_theme_file_uri('assets/images/Service-Banner.png') ?>&quot;);z-index: -1;opacity: 0.30;top: 0;left: 0;background-size: cover;background-repeat: no-repeat;">
  </div>
  <div class="container py-4 py-xl-5">
    <div class="row">
      <div class="col">
        <h3 class="fs-2 text-center" style="font-family: Unna, serif;">Ready to transform your business? <br>Contact
          us
          today!</h3>
        <p class="text-center">Discover how our innovative solutions can empower your growth and drive success in the
          digital era.</p>
        <div class="d-flex justify-content-center gap-3 mt-5"><a class="btn btn-primary" role="button"
            href="<?php echo esc_url(site_url('contact')) ?>">Contact
            Us</a><a class="btn btn-outline-primary" role="button"
            href="<?php echo esc_url(site_url('about-us')) ?>">About Us</a></div>
      </div>
    </div>
  </div>
</section><!-- End: Bottom Banner -->
<?php
get_footer();
?>