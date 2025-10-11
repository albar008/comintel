<?php 

$post = get_post($attributes['project']);
$permalink = get_permalink($post->ID);
$projectMedia = carbon_get_post_meta($post->ID, 'project_images');
$mediaUrl = '';
if(!empty($projectMedia)){
    $mediaUrl = wp_get_attachment_image_url($projectMedia[0]['image'], 'medium');
}
?>

<div class="col-12 col-md-4">
    <div class="project-card">
      <h4><a href="<?php echo $permalink ?>"><?php echo $post->post_title ?></a></h4>
      <img class="project-img" src="<?php echo !empty($mediaUrl) ? $mediaUrl : get_theme_file_uri('assets/images/no-image.png') ?>" />
    </div>
</div>