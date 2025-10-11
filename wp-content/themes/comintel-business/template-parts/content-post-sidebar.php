<div class="sidebar-container sidebar-container--stick">
  <?php get_search_form() ?>
  <?php
  if (is_page() || is_single()) {
    $albToc = do_shortcode('[alb_toc type="list"]');
    $albTocTitle = do_shortcode('[alb_toc type="title"]');
    if (!empty(($albToc))) {
      get_template_part('template-parts/content', 'post-sidebar-toc', ['tocData' => $albToc, 'tocTitle' => $albTocTitle]);
    }
  }
  ?>
  <?php get_template_part('template-parts/content', 'list-categories') ?>
</div>