<?php
/**
 * WordPress Function Stubs for IDE Support
 * 
 * This file contains function stubs for WordPress core functions
 * to provide better IDE support and eliminate "undefined function" warnings.
 * 
 * @package HaoYu_AI_Theme
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// WordPress Core Functions
if (!function_exists('get_header')) { function get_header($name = null) {} }
if (!function_exists('get_footer')) { function get_footer($name = null) {} }
if (!function_exists('get_sidebar')) { function get_sidebar($name = null) {} }
if (!function_exists('get_search_form')) { function get_search_form($echo = true) {} }
if (!function_exists('esc_html_e')) { function esc_html_e($text, $domain = 'default') {} }
if (!function_exists('esc_html__')) { function esc_html__($text, $domain = 'default') { return $text; } }
if (!function_exists('esc_url')) { function esc_url($url) { return $url; } }
if (!function_exists('the_widget')) { function the_widget($widget, $instance = array(), $args = array()) {} }
if (!function_exists('wp_list_categories')) { function wp_list_categories($args = '') {} }
if (!function_exists('convert_smilies')) { function convert_smilies($text) { return $text; } }
if (!function_exists('apply_filters')) { function apply_filters($hook_name, $value, ...$args) { return $value; } }
if (!function_exists('add_action')) { function add_action($hook_name, $callback, $priority = 10, $accepted_args = 1) { return true; } }
if (!function_exists('add_theme_support')) { function add_theme_support($feature, ...$args) {} }
if (!function_exists('register_nav_menus')) { function register_nav_menus($locations = array()) {} }
if (!function_exists('register_sidebar')) { function register_sidebar($args = array()) { return 'sidebar-id'; } }
if (!function_exists('wp_enqueue_style')) { function wp_enqueue_style($handle, $src = '', $deps = array(), $ver = false, $media = 'all') {} }
if (!function_exists('wp_enqueue_script')) { function wp_enqueue_script($handle, $src = '', $deps = array(), $ver = false, $in_footer = false) {} }
if (!function_exists('get_template_directory')) { function get_template_directory() { return ''; } }
if (!function_exists('get_template_directory_uri')) { function get_template_directory_uri() { return ''; } }
if (!function_exists('get_stylesheet_directory')) { function get_stylesheet_directory() { return ''; } }
if (!function_exists('get_stylesheet_directory_uri')) { function get_stylesheet_directory_uri() { return ''; } }
if (!function_exists('get_stylesheet_uri')) { function get_stylesheet_uri() { return ''; } }
if (!function_exists('load_theme_textdomain')) { function load_theme_textdomain($domain, $path = false) { return true; } }
if (!function_exists('is_singular')) { function is_singular($post_types = '') { return false; } }
if (!function_exists('comments_open')) { function comments_open($post_id = null) { return false; } }
if (!function_exists('get_option')) { function get_option($option, $default = false) { return $default; } }
if (!function_exists('language_attributes')) { function language_attributes($doctype = 'html') {} }
if (!function_exists('bloginfo')) { function bloginfo($show = '') {} }
if (!function_exists('get_bloginfo')) { function get_bloginfo($show = '', $filter = 'raw') { return ''; } }
if (!function_exists('wp_head')) { function wp_head() {} }
if (!function_exists('body_class')) { function body_class($class = '') {} }
if (!function_exists('wp_body_open')) { function wp_body_open() {} }
if (!function_exists('home_url')) { function home_url($path = '', $scheme = null) { return ''; } }
if (!function_exists('the_custom_logo')) { function the_custom_logo($blog_id = 0) {} }
if (!function_exists('is_front_page')) { function is_front_page() { return false; } }
if (!function_exists('is_home')) { function is_home() { return false; } }
if (!function_exists('is_customize_preview')) { function is_customize_preview() { return false; } }
if (!function_exists('wp_nav_menu')) { function wp_nav_menu($args = array()) {} }
if (!function_exists('have_posts')) { function have_posts() { return false; } }
if (!function_exists('single_post_title')) { function single_post_title($prefix = '', $display = true) {} }
if (!function_exists('the_post')) { function the_post() {} }
if (!function_exists('get_template_part')) { function get_template_part($slug, $name = null, $args = array()) {} }
if (!function_exists('get_post_type')) { function get_post_type($post = null) { return false; } }
if (!function_exists('the_posts_navigation')) { function the_posts_navigation($args = array()) {} }
if (!function_exists('the_post_navigation')) { function the_post_navigation($args = array()) {} }
if (!function_exists('the_archive_title')) { function the_archive_title($before = '', $after = '') {} }
if (!function_exists('the_archive_description')) { function the_archive_description($before = '', $after = '') {} }
if (!function_exists('get_comments_number')) { function get_comments_number($post_id = 0) { return 0; } }
if (!function_exists('comments_template')) { function comments_template($file = '/comments.php', $separate_comments = false) {} }
if (!function_exists('wp_get_theme')) { function wp_get_theme() { return new WP_Theme(); } }

if ( ! class_exists( 'WP_Theme' ) ) {
    class WP_Theme {
        public function get( $header ) { return ''; }
        public function parent() { return $this; }
    }
}
