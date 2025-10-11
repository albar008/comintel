<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset') ?>" />
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <?php wp_head(); ?>
</head>

<body style="font-family: Poppins, sans-serif;" <?php body_class() ?>>
  <?php wp_body_open() ?>
  <!-- Start: Navbar Centered Links -->
  <nav class="navbar navbar-expand-md fixed-top py-3" id="mainNav">
    <div class="container"><a class="navbar-brand" href="<?php echo esc_url(site_url(('/'))) ?>" aria-label="Go to Home Page"><img class="img-fluid"
          src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('set_header_logo'))) ?>" alt="PT Comintel Logo Header"></a><button data-bs-toggle="collapse" class="navbar-toggler"
        data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><svg
          xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2"
          stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"
          class="icon icon-tabler icon-tabler-menu-deep fs-1 navbar-toggler__toggler-icon">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M4 6h16"></path>
          <path d="M7 12h13"></path>
          <path d="M10 18h10"></path>
        </svg></button>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="navbar-nav align-items-center" style="margin-inline-start: auto;">
          <!-- <li class="nav-item"><a class="nav-link <?php is_front_page() && print('active') ?>" href="<?php echo esc_url(site_url('/')) ?>">Home</a></li> -->
          <li class="nav-item"><a class="nav-link <?php is_page('about-us') && print 'active'  ?>" href="<?php echo esc_url(site_url('about-us')) ?>">About</a></li>
          <li class="nav-item"><a class="nav-link <?php is_page('services') && print 'active' ?>" href="<?php echo esc_url(site_url('services')) ?>">Services</a></li>
          <li class="nav-item"><a class="nav-link <?php get_post_type() === 'post' && print 'active' ?>" href="<?php echo esc_url(site_url(path: 'blog')) ?>">Blog</a></li>
          <li class="nav-item"><a class="nav-link <?php is_page('contact') && print 'active'  ?>" href="<?php echo esc_url(site_url(path: 'contact')) ?>">Contact</a></li>
          <?php if(is_plugin_active('gtranslate/gtranslate.php')) { ?>
          <li class="nav-item"><div class="translate-wrapper"><?php echo do_shortcode('[gtranslate]'); ?></div></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav><!-- End: Navbar Centered Links -->
  <main id="smooth-wrapper">
    <section id="smooth-content">