<div <?php echo get_block_wrapper_attributes([
  'class' => $attributes['className']
]); ?>>
  <h3 class="fs-4 fw-bold" style="font-family: Unna, serif;">
    <?php echo $attributes['listTitle'] ?>
  </h3>
  <ul class="list-unstyled">
    <?php echo $content ?>
  </ul>
</div>