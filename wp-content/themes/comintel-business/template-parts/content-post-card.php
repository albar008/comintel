<article class="post-card">
  <figure class="figure post-card__img-box">
    <p class="post-card__category">
      <?php the_category(', ') ?>
    </p><a href="<?php the_permalink() ?>" aria-label="Judul Post">
      <?php if (has_post_thumbnail()) {
        the_post_thumbnail('medium');
      } else {
        ?>
        <img src="<?php echo get_theme_file_uri('assets/images/no-image.png') ?>"
          alt="Figure__Cara-Membuat-Gambar-Pakai-Meta-AI">
      <?php } ?>
    </a>
  </figure>
  <div class="post-card__content">
    <h3 class="fs-4 fw-bold" style="font-family: Unna, serif;"><a href="<?php the_permalink() ?>"><span
          style="font-weight: normal !important;"><?php the_title() ?></span></a></h3>
    <p>
      <?php
      if (has_excerpt()) {
        echo wp_strip_all_tags(wp_trim_words(get_the_excerpt(), 20));
      } else {
        echo wp_strip_all_tags(wp_trim_words(get_the_content(), 20));
      }
      ?>
    </p>
  </div>
  <div class="post-card__summary">
    <div class="publish-date"><i class="far fa-calendar-alt"></i>&nbsp;<span><?php the_time('Y-m-d') ?></span>
    </div>
    <div class="author"><i class="far fa-user"></i><span><?php the_author() ?></span></div>
  </div>
</article>