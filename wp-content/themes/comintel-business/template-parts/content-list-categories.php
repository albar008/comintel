<div class="side-panel__container">
  <div class="section-header"><small class="fs-6 section-header__subtitle">Popular Caregories</small></div>
  <ul class="side-panel__categories-list">
    <?php
    $cats = wp_list_categories([
      'title_li' => '',
      'hide_title_if_empty' => true,
      'show_count' => true,
    ]);
    echo $cats;
    ?>
  </ul>
</div>