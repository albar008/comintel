<?php 
  $post_content = get_post_field( 'post_content', get_the_ID() );

	$blocks = parse_blocks( $post_content );

  $albTocBlock = array_filter($blocks, fn($_block) => $_block['blockName'] === 'alb/alb-toc');
?>

<?php 
  echo $content;
?>