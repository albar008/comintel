<?php

if (!defined('ABSPATH')) {
  die;
}

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/carbon-custom-fields.php';

function site_asset_files()
{
  wp_enqueue_script('bootstrap-script', '//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', ['jquery'], false, true);
  wp_enqueue_script('particle-script', '//cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', ['jquery'], false, true);
  wp_enqueue_script('slick-script', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], false, true);
  theme_gsap_script();
  wp_enqueue_script(
    'main-com',
    get_theme_file_uri('/build/index.js'),
    [],
    '1.0',
    true
  );

  wp_enqueue_style('bootstrap-style', get_theme_file_uri('/assets/bootstrap/css/bootstrap.min.css'));
  wp_enqueue_style('custom-google-fonts-poppins', '//fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,700,700i&amp;display=swap');
  wp_enqueue_style('custom-google-fonts-unna', '//fonts.googleapis.com/css?family=Unna&amp;display=swap');
  wp_enqueue_style('font-awesome5', '//use.fontawesome.com/releases/v5.12.0/css/all.css');
  wp_enqueue_style('font-awesome4', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
  wp_enqueue_style('font-awesome5-override', get_theme_file_uri('/assets/fonts/fontawesome5-overrides.min.css'));
  wp_enqueue_style('bs-theme-override', get_theme_file_uri('/assets/bootstrap/bs-theme-overrides.css'));
  wp_enqueue_style('main-com', get_theme_file_uri('/build/index.css'), [], '1.0');
  wp_localize_script('main-comintel-js', 'comIntelData', [
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ]);
  if (!is_admin() && !is_singular(['post'])) {
    wp_add_inline_script('main-com', "const smoother = ScrollSmoother.create({
      wrapper: '#smooth-wrapper',
      content: '#smooth-content',
      smooth: 1,
    })", 'before');
  }
}

function theme_gsap_script()
{
  wp_enqueue_script('gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), false, true);
  wp_enqueue_script('gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap-js'), false, true);
  wp_enqueue_script('gsap-smt', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollSmoother.min.js', array('gsap-js'), false, true);
  wp_enqueue_script('gsap-scrl-to', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollToPlugin.min.js', array('gsap-js'), false, true);
  wp_enqueue_script('gsap-draw-svg', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/DrawSVGPlugin.min.js', array('gsap-js'), false, true);
}

add_action('wp_enqueue_scripts', 'site_asset_files');
function update_admin_menu_titles()
{
  global $menu, $submenu;


  foreach ($menu as $key => $item) {
    // Cek apakah menu memiliki submenu
    if (isset($submenu[$item[2]])) {
      // Update title menu utama
      $menu[$key][0] = $menu[$key][0] . '...';
    }
  }
}
add_action('admin_menu', 'update_admin_menu_titles', 999);

function ourLoginHeaderTitile()
{
  return 'Hello';
}
add_filter('login_headertitle', 'ourLoginHeaderTitile');


function comintel_features()
{
  // register_nav_menus([
  //   'headerMenuLocation' => 'Header Menu Location',
  //   'footerLocationOne' => 'Footer Location One',
  //   'footerLocationTwo' => 'Footer Location Two'
  // ]);
  // add_theme_support('menus');
  add_theme_support('block-template-parts');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('editor-styles');
  add_theme_support('wp-block-styles');
  add_editor_style(['/assets/bootstrap/css/bootstrap.min.css', 'build/index.css']);
  add_theme_support( 'editor-color-palette', array(
    array(
        'name'  => 'Comintel Light Grey',
        'slug'  => 'comintel-light-grey',
        'color' => '#F9FAFC',
    ),
  ));
  // add_image_size('professorLandscape', 400, 260, true);
  // add_image_size('professorPortrait', 480, 650, true);
  // add_image_size('pageBanner', 1500, 350, true);
}
add_action('after_setup_theme', 'comintel_features');

function remove_wp_version_and_add_timestamp_if_not_local_assets($src)
{
  if (strpos($src, 'ver=')) {
    $src = remove_query_arg('ver', $src);
    // $src .= '?v=' . time(); // Menggunakan timestamp agar cache diperbarui
    $file_path = str_replace(home_url('/'), ABSPATH, $src);
    if (file_exists($file_path)) {
      $src .= '?v=' . filemtime($file_path); // Menggunakan last modified time
    }
  }
  return $src;
}
add_filter('style_loader_src', 'remove_wp_version_and_add_timestamp_if_not_local_assets', 9999);
add_filter('script_loader_src', 'remove_wp_version_and_add_timestamp_if_not_local_assets', 9999);


function ourLoginTitle()
{
  return get_bloginfo('name');
}
add_filter('login_headertext', 'ourLoginTitle');
function ourHeaderUrl()
{
  return esc_url(site_url(('/')));
}
add_filter('login_headerurl', 'ourHeaderUrl');

function comintelBusinessBlocks()
{
  register_block_style('core/quote', [
    'name' => 'ctp-block-quote--primary',
    'label' => 'Primary Style',
  ]);
  register_block_style('core/quote', [
    'name' => 'ctp-block-quote--secondary',
    'label' => 'Secondary Style',
  ]);
  register_block_style('core/image', [
    'name' => 'ctp-block-image--small-rounded',
    'label' => 'Small Rounded',
  ]);
  register_block_style('core/image', [
    'name' => 'ctp-block-image--tiny-rounded',
    'label' => 'Tiny Rounded',
  ]);

  // Block Components
  register_block_type_from_metadata(__DIR__ . '/build/components/link-list');
  register_block_type_from_metadata(__DIR__ . '/build/components/link-list-item');
  register_block_type_from_metadata(__DIR__ . '/build/components/bootstrap-cols');

  // Blocks
  register_block_type_from_metadata(__DIR__ . '/build/home-header');
  register_block_type_from_metadata(__DIR__ . '/build/general-footer');
  register_block_type_from_metadata(__DIR__ . '/build/project-container');
  register_block_type_from_metadata(__DIR__ . '/build/general-content-header');
  register_block_type_from_metadata(__DIR__ . '/build/general-content-container');
}
add_action('init', 'comintelBusinessBlocks');

function example_filter_allowed_block_types_when_post_provided($allowed_block_types, $editor_context)
{
  // var_dump($_GET['postId']);
  $all_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();
  $allowed_blocks = array_keys($all_blocks);
  if ($editor_context->name === 'core/edit-site') {
    if (isset($_GET['postId'])) {
      if (str_contains($_GET['postId'], 'home-header')) {
        return ['comintel-business/home-header'];
      }
      if (str_contains($_GET['postId'], 'footer')) {
        return [
          'comintel-business/general-footer',
          'comintel-business-component/link-list',
          'comintel-business-component/link-list-item',
          'core/columns',
          'core/column'
        ];
      }
    }
  } else {
    $allowed_blocks = array_values(array_filter($allowed_blocks, function ($block) {
      $siteEditBlocks = [
        'comintel-business/home-header',
        'comintel-business/general-footer'
      ];
      return !in_array($block, $siteEditBlocks);
    }));
  }
  return $allowed_blocks;
}

add_filter('allowed_block_types_all', 'example_filter_allowed_block_types_when_post_provided', 10, 2);


function my_custom_editor_settings($settings, $editor_context)
{
  // Disable the fullscreen mode by default
  // var_dump($settings);
  $settings['canLockBlocks'] = current_user_can('modify_template_parts');
  $settings['codeEditingEnabled'] = false; //current_user_can('modify_template_parts');
  return $settings;
}
add_filter('block_editor_settings_all', 'my_custom_editor_settings', 10, 2);


// my-plugin.php
function add_custom_block_categories($block_categories, $editor_context)
{
  array_push(
    $block_categories,
    array(
      'slug' => 'comintel-business',
      'title' => 'Comintel Business',
      'icon' => null,
    )
  );
  return $block_categories;
}
add_filter('block_categories_all', 'add_custom_block_categories', 10, 2);

// function disable_delete_page_for_non_admins( $actions, $post ) {
//   var_dump($post);
//   var_dump($actions);
//   if ( $post->post_type == 'page' ) {
//       unset( $actions['trash'] ); // Menghapus tombol "Trash" di daftar halaman
//   }
//   return $actions;
// }
// add_filter( 'page_row_actions', 'disable_delete_page_for_non_admins', 10, 2 );

function show_current_user_attachments($query = array())
{
  $user_id = get_current_user_id();
  if (!current_user_can('administrator') && $query['post_type'] === 'attachment') {
    $query['author'] = $user_id;
  }
  return $query;
}

add_filter('ajax_query_attachments_args', 'show_current_user_attachments', 10, 1);

remove_action('wp_head', 'wp_generator');

// Hide Plugins
function comintel_hide_specific_plugins($plugins)
{
  // plugin lists that use internally
  $plugins_to_hide = [
    'carbon-fields/carbon-fields-plugin.php'
  ];
  foreach ($plugins_to_hide as $plugin) {
    if (isset($plugins[$plugin])) {
      unset($plugins[$plugin]);
    }
  }
  return $plugins;
}
add_filter('all_plugins', 'comintel_hide_specific_plugins');

add_action('init', function () {
  add_rewrite_rule(
    '^/profile/([^/]*)/?',
    'index.php?pagename=profileku&related_service=$matches[1]',
    'top'
  );
});

add_filter('query_vars', function ($vars) {
  $vars[] = 'related_service';
  return $vars;
});


add_filter('manage_project_posts_columns', function ($columns) {
  $newCols = [];
  $newCols['title'] = 'Title';
  $newCols['related_service'] = 'Related Service';
  $newCols['date'] = 'Date';
  return $newCols;
});
add_action('manage_project_posts_custom_column', function ($columns) {
  if ($columns === 'related_service') {
    $relatedService = get_field('related_service');
    echo $relatedService->post_title;
  }
  return $columns;
});



function custom_admin_search_or_meta($where, $query)
{
  global $pagenow, $wpdb;

  // Cek kondisi spesifik agar hanya diterapkan saat perlu
  if (is_admin() && $query->is_main_query() && $query->get('s') && $query->get('post_type') === 'project' && $pagenow === 'edit.php') {
    $search = esc_sql($query->get('s'));

    $search = $query->get('s');
    $serviceQuery = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title LIKE %s AND post_type = %s", '%' . $wpdb->esc_like($search) . '%', 'service');
    $serviceRes = $wpdb->get_results($serviceQuery);
    $serviceIds = [];
    foreach ($serviceRes as $service) {
      $serviceIds[] = $service->ID;
    }

    // Hapus pencarian default
    $query->set('s', '');

    // Tambahkan kondisi OR ke SQL WHERE
    $where .= " OR ({$wpdb->postmeta}.meta_key = 'related_service' AND {$wpdb->postmeta}.meta_value IN ('" . implode("','", $serviceIds) . "'))";
  }

  return $where;
}

add_filter('posts_where', 'custom_admin_search_or_meta', 10, 2);

function admin_filter_cols($query)
{
  global $pagenow, $wpdb;
  if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'project') {
    $search = $query->get('s');
    $query->set('meta_query', [
      [
        'key' => 'related_service',
        'compare' => 'EXISTS',
      ]
    ]);

    if ($query->get('orderby') === 'related_service') {
      $query->set('meta_key', 'related_service');
      $query->set('orderby', 'post_title');
    }
  }
}

add_action('pre_get_posts', 'admin_filter_cols');

add_filter('manage_edit-project_sortable_columns', function ($columns) {
  $columns['related_service'] = 'related_service'; // sama seperti nama kolom
  return $columns;
});


