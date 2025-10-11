<?php
/**
 * Plugin Name:       Alb Toc
 * Description:       Plugin Table Of Contents.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            PT Comintel Tamarang Pratama
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       alb-toc
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

require_once 'inc/utils.php';

class AlbToc
{
	use Utils;
	function __construct()
	{
		add_filter('plugin_action_links_alb-toc/alb-toc.php', array($this, 'alb_toc_settings_link'));
		add_action('admin_menu', array($this, 'albTocPageSettings'));
		add_action('admin_init', array($this, 'albTocFieldsSettings'));
		add_action('init', array($this, 'alb_toc__register_shortcode'));
		add_action('init', array($this, 'create_block_alb_toc_block_init'));
		add_filter('block_categories_all', array($this, 'add_alb_block_category'), 10, 2);
		add_action('wp_enqueue_scripts', array($this, 'plugin_asset_files'));
		// add_filter('enqueue_block_editor_assets', array($this, 'enqueue_alb_toc_editor_assets'));
		// add_filter( 'render_block', array($this, 'my_custom_render'), 10, 2 );
	}

	function alb_toc__register_shortcode()
	{
		add_shortcode('alb_toc', [$this, 'show_toc_data_shortcode']);
	}

	function alb_toc_settings_link($links)
	{
		$settings_link = '<a href="options-general.php?page=alb-toc-settings-page">Settings</a>';
		array_unshift($links, $settings_link);
		return $links;
	}

	function albTocFieldsSettings()
	{
		add_settings_section('alb_toc_setting_section', null, fn() => null, 'alb-toc-settings-page');

		add_settings_field('alb_toc_is_using_shortcode', __('Hide TOC OffCanvas', 'alb-toc'), array($this, 'boolViewHtml'), 'alb-toc-settings-page', 'alb_toc_setting_section', ['field_name' => 'alb_toc_is_using_shortcode']);
		register_setting('albtocpluginssettings', 'alb_toc_is_using_shortcode', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 0,
		));
	}

	function boolViewHtml($args)
	{
		ob_start();
		?>
		<input type="checkbox" name="<?php echo $args['field_name'] ?>" value="1" <?php checked(get_option($args['field_name']), '1') ?> />
		<?php
		ob_end_flush();
	}

	function albTocPageSettings()
	{
		add_options_page(
			__('Alb Toc', 'alb-toc'),
			__('Alb Toc', 'alb-toc'),
			'manage_options',
			'alb-toc-settings-page',
			array($this, 'albTocSettingView'),
		);
	}

	function albTocSettingView()
	{
		?>
		<div class="wrap">
			<h1>Alb Toc Settings</h1>
			<form action="options.php" method="post">
				<?php
				settings_fields('albtocpluginssettings');
				do_settings_sections('alb-toc-settings-page');
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	function create_block_alb_toc_block_init()
	{
		/**
		 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
		 * based on the registered block metadata.
		 * Added in WordPress 6.8 to simplify the block metadata registration process added in WordPress 6.7.
		 *
		 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
		 */
		if (function_exists('wp_register_block_types_from_metadata_collection')) {
			wp_register_block_types_from_metadata_collection(__DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php');
			return;
		}

		/**
		 * Registers the block(s) metadata from the `blocks-manifest.php` file.
		 * Added to WordPress 6.7 to improve the performance of block type registration.
		 *
		 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
		 */
		if (function_exists('wp_register_block_metadata_collection')) {
			wp_register_block_metadata_collection(__DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php');
		}
		/**
		 * Registers the block type(s) in the `blocks-manifest.php` file.
		 *
		 * @see https://developer.wordpress.org/reference/functions/register_block_type/
		 */
		$manifest_data = require __DIR__ . '/build/blocks-manifest.php';
		foreach (array_keys($manifest_data) as $block_type) {
			register_block_type(__DIR__ . "/build/{$block_type}");
		}
	}

	function has_toc_block($blocks)
	{
		foreach ($blocks as $block) {
			if ($block['blockName'] === 'alb/alb-toc') {
				return true;
			}

			if (!empty($block['innerBlocks'])) {
				if ($this->has_toc_block($block['innerBlocks'])) {
					return true;
				}
			}
		}
		return false;
	}

	// function my_custom_render($block_content, $block)
	// {
	// 	global $post;
	// 	if (!is_admin() && is_single()) {
	// 		$blocks = parse_blocks($post->post_content);
	// 		$is_toc_present = $this->has_toc_block($blocks);

	// 		if ($block['blockName'] === 'core/heading' && $is_toc_present) {
	// 			$toc_id = sanitize_title(strip_tags($block['innerHTML'] ?? ''));

	// 			$block_content = preg_replace(
	// 				'/<h([1-6])([^>]*)>/',
	// 				'<h$1$2 data-toc-id="' . esc_attr($toc_id) . '">',
	// 				$block_content,
	// 				1
	// 			);
	// 		}
	// 	}
	// 	return $block_content;

	// }

	function add_alb_block_category($block_categories, $editor_context)
	{
		if (!empty($editor_context->post)) {
			array_push(
				$block_categories,
				array(
					'slug' => 'alb',
					'title' => 'Albar',
					'icon' => null,
				)
			);
		}
		return $block_categories;
	}

	function plugin_asset_files()
	{
		if (!is_admin() && is_singular(['post'])) {

			$albTocBlock = $this->get_filtered_blocks('alb/alb-toc');
			$tocList = [];
			$tocTitle = '';

			if (!empty($albTocBlock)) {
				wp_enqueue_script(
					'alb-toc-script',
					plugins_url('custom/index.js', __FILE__),
					['lodash'],
					filemtime(plugin_dir_path(__FILE__) . 'custom/index.js'),
					true
				);

				wp_enqueue_style(
					'alb-toc-style',
					plugins_url('custom/index.css', __FILE__),
					[],
					filemtime(plugin_dir_path(__FILE__) . 'custom/index.css'),
				);

				$tocList = json_decode($albTocBlock[0]['attrs']['tocList']);
				$tocTitle = $albTocBlock[0]['attrs']['tocTitle'] ?? 'Table of Contents';
				// var_dump($tocList);

				wp_localize_script('alb-toc-script', 'albToc', [
					'data' => htmlspecialchars($this->create_list_html_from_blocks($tocList)),
					'title' => $tocTitle,
					'alb_toc_settings' => json_encode(get_options(['alb_toc_is_using_shortcode']))
				]);
			}
		}
	}

	// ShortCodes
	function show_toc_data_shortcode($atts)
	{
		$blocks = $this->get_filtered_blocks('alb/alb-toc');
		$tocList = [];
		$tocTitle = '';
		if(!empty($blocks)){
			$tocList = json_decode($blocks[0]['attrs']['tocList']);
			$tocTitle = $blocks[0]['attrs']['tocTitle'] ?? 'Table of Contents';
		} else {
			return '';
		}
		if($atts['type'] === 'list') {
			return '<div class="toc-list-shc-container">'.$this->create_list_html_from_blocks($tocList).'</div>';
		} else if($atts['type'] === 'title') {
			return '<span>'.$tocTitle.'</span>';
		}
		return '<span>Alb Toc Shortcode is not valid</span>';
	}
}

$albToc = new AlbToc();
