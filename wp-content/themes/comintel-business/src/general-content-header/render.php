<header <?php echo get_block_wrapper_attributes([
  'class' => isset($attributes['isCentered']) && $attributes['isCentered'] ? 'section-header section-header--center' : 'section-header',
]); ?>>
  <?php if (isset($attributes['subtitle']) && !empty($attributes['subtitle'])) { ?>
    <small class="fs-6 section-header__subtitle"><?php echo esc_html($attributes['subtitle']); ?></small>
  <?php } ?>
  <h2 class="section-header__title" style="font-family: Unna, serif;"><?php echo esc_html($attributes['title']); ?></h2>
</header>