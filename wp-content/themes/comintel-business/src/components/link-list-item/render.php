<li <?php echo get_block_wrapper_attributes([
  'class' => isset($attributes['faIconName']) && !empty($attributes['faIconName']) ? 'with-icon' : false
]); ?>>
  <?php
  if (isset($attributes['faIconName']) && !empty($attributes['faIconName'])) {
    ?>
    <i class="fas <?php echo $attributes['faIconName'] ?>"></i>
  <?php } ?>
  <?php echo $attributes['listText'] ?>
</li>