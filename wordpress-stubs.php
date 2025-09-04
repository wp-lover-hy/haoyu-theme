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
if (!function_exists('get_header')) {
    /**
     * Load header template
     *
     * @param string $name The name of the specialised header.
     */
    function get_header($name = null) {}
}

if (!function_exists('get_footer')) {
    /**
     * Load footer template
     *
     * @param string $name The name of the specialised footer.
     */
    function get_footer($name = null) {}
}

if (!function_exists('get_search_form')) {
    /**
     * Display search form
     *
     * @param bool $echo Default to echo and not return the form.
     * @return string|void String when $echo is false.
     */
    function get_search_form($echo = true) {}
}

if (!function_exists('esc_html_e')) {
    /**
     * Display translated text that has been escaped for safe use in HTML output
     *
     * @param string $text Text to translate.
     * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
     */
    function esc_html_e($text, $domain = 'default') {}
}

if (!function_exists('esc_html__')) {
    /**
     * Retrieve translated text that has been escaped for safe use in HTML output
     *
     * @param string $text Text to translate.
     * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
     * @return string Translated text.
     */
    function esc_html__($text, $domain = 'default') {}
}

if (!function_exists('the_widget')) {
    /**
     * Display an arbitrary widget
     *
     * @param string $widget The widget's PHP class name (see class-wp-widget.php).
     * @param array $instance Optional. The widget's instance settings.
     * @param array $args Optional. The widget's sidebar arguments.
     */
    function the_widget($widget, $instance = array(), $args = array()) {}
}

if (!function_exists('wp_list_categories')) {
    /**
     * Display or retrieve the HTML list of categories
     *
     * @param string|array $args Optional. Override default arguments.
     * @return string|void HTML content only if 'echo' argument is 0.
     */
    function wp_list_categories($args = '') {}
}

if (!function_exists('convert_smilies')) {
    /**
     * Convert text smilies to HTML entities
     *
     * @param string $text Content to convert smilies from text.
     * @return string Converted content with text smilies replaced with HTML entities.
     */
    function convert_smilies($text) {}
}

if (!function_exists('sprintf')) {
    /**
     * Return a formatted string
     *
     * @param string $format The format string.
     * @param mixed ...$args The arguments to format.
     * @return string The formatted string.
     */
    function sprintf($format, ...$args) {}
}

if (!function_exists('apply_filters')) {
    /**
     * Call the functions added to a filter hook
     *
     * @param string $hook_name The name of the filter hook.
     * @param mixed $value The value to filter.
     * @param mixed ...$args Additional parameters to pass to the callback functions.
     * @return mixed The filtered value after all hooked functions are applied to it.
     */
    function apply_filters($hook_name, $value, ...$args) {}
}

if (!function_exists('add_action')) {
    /**
     * Hooks a function on to a specific action
     *
     * @param string $hook_name The name of the action to which the $function_to_add is hooked.
     * @param callable $callback The name of the function you wish to be called.
     * @param int $priority Optional. Used to specify the order in which the functions
     *                      associated with a particular action are executed. Default 10.
     *                      Lower numbers correspond with earlier execution,
     *                      and functions with the same priority are executed
     *                      in the order in which they were added to the action.
     * @param int $accepted_args Optional. The number of arguments the function accepts. Default 1.
     * @return true Will always return true.
     */
    function add_action($hook_name, $callback, $priority = 10, $accepted_args = 1) {}
}

if (!function_exists('add_theme_support')) {
    /**
     * Add theme support for a given feature
     *
     * @param string $feature The feature being added.
     * @param mixed ...$args Optional extra arguments to pass along with certain features.
     * @return bool|void False on failure, true on success.
     */
    function add_theme_support($feature, ...$args) {}
}

if (!function_exists('register_nav_menus')) {
    /**
     * Register navigation menus for a theme
     *
     * @param array $locations Associative array of menu location identifiers (like a slug) and descriptive text.
     */
    function register_nav_menus($locations = array()) {}
}

if (!function_exists('register_sidebar')) {
    /**
     * Builds the definition for a single sidebar and returns the ID
     *
     * @param array|string $args Builds Sidebar based off of 'name' and 'id' values.
     * @return string Sidebar ID.
     */
    function register_sidebar($args = array()) {}
}

if (!function_exists('wp_enqueue_style')) {
    /**
     * Enqueue a CSS stylesheet
     *
     * @param string $handle Name of the stylesheet. Should be unique.
     * @param string $src Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory.
     * @param array $deps Optional. An array of registered stylesheet handles this stylesheet depends on.
     * @param string|bool|null $ver Optional. String specifying stylesheet version number.
     * @param string $media Optional. The media for which this stylesheet has been defined.
     * @return bool Whether the style has been registered. True on success, false on failure.
     */
    function wp_enqueue_style($handle, $src = '', $deps = array(), $ver = false, $media = 'all') {}
}

if (!function_exists('wp_enqueue_script')) {
    /**
     * Enqueue a script
     *
     * @param string $handle Name of the script. Should be unique.
     * @param string $src Full URL of the script, or path of the script relative to the WordPress root directory.
     * @param array $deps Optional. An array of registered script handles this script depends on.
     * @param string|bool|null $ver Optional. String specifying script version number.
     * @param bool $in_footer Optional. Whether to enqueue the script before </body> instead of in the <head>.
     * @return bool Whether the script has been registered. True on success, false on failure.
     */
    function wp_enqueue_script($handle, $src = '', $deps = array(), $ver = false, $in_footer = false) {}
}

if (!function_exists('get_template_directory')) {
    /**
     * Retrieve path to current template directory
     *
     * @return string Path to current template directory.
     */
    function get_template_directory() {}
}

if (!function_exists('get_template_directory_uri')) {
    /**
     * Retrieve template directory URI for current theme
     *
     * @return string Template directory URI.
     */
    function get_template_directory_uri() {}
}

if (!function_exists('get_stylesheet_uri')) {
    /**
     * Retrieve the URI of current theme stylesheet
     *
     * @return string Stylesheet URI.
     */
    function get_stylesheet_uri() {}
}

if (!function_exists('load_theme_textdomain')) {
    /**
     * Load theme's translated strings
     *
     * @param string $domain Text domain. Unique identifier for retrieving translated strings.
     * @param string|false $path Optional. Path to the directory containing the .mo file.
     * @return bool True when textdomain is successfully loaded, false otherwise.
     */
    function load_theme_textdomain($domain, $path = false) {}
}

if (!function_exists('is_singular')) {
    /**
     * Is the query for an existing single post of any post type (post, attachment, page, custom post types)?
     *
     * @param string|int|array $post_types Optional. Post type or array of post types. Default empty.
     * @return bool
     */
    function is_singular($post_types = '') {}
}

if (!function_exists('comments_open')) {
    /**
     * Determine if comments are open for a post
     *
     * @param int|WP_Post $post_id Optional. Post ID or post object. Default is the global $post.
     * @return bool True if comments are open, false if closed.
     */
    function comments_open($post_id = null) {}
}

if (!function_exists('get_option')) {
    /**
     * Retrieve option value based on name of option
     *
     * @param string $option Name of option to retrieve. Expected to not be SQL-escaped.
     * @param mixed $default Optional. Default value to return if the option does not exist.
     * @return mixed Value set for the option.
     */
    function get_option($option, $default = false) {}
}

// Additional WordPress functions found in your theme files
if (!function_exists('language_attributes')) {
    /**
     * Display the language attributes for the html tag
     *
     * @param string $doctype The type of html document (xhtml|html).
     */
    function language_attributes($doctype = 'html') {}
}

if (!function_exists('bloginfo')) {
    /**
     * Display or retrieve information about the current site
     *
     * @param string $show Optional. Site info to retrieve. Default 'name'.
     * @return string|void String on success, void on failure.
     */
    function bloginfo($show = '') {}
}

if (!function_exists('get_bloginfo')) {
    /**
     * Retrieve information about the current site
     *
     * @param string $show Optional. Site info to retrieve. Default 'name'.
     * @param string $filter Optional. How to filter what is retrieved. Default 'raw'.
     * @return string Mostly string values, might be empty.
     */
    function get_bloginfo($show = '', $filter = 'raw') {}
}

if (!function_exists('wp_head')) {
    /**
     * Fire the wp_head action
     */
    function wp_head() {}
}

if (!function_exists('body_class')) {
    /**
     * Display the classes for the body element
     *
     * @param string|array $class Optional. One or more classes to add to the class list.
     */
    function body_class($class = '') {}
}

if (!function_exists('wp_body_open')) {
    /**
     * Fire the wp_body_open action
     */
    function wp_body_open() {}
}

if (!function_exists('esc_url')) {
    /**
     * Escapes a URL for use in an attribute
     *
     * @param string $url The URL to escape.
     * @return string The escaped URL.
     */
    function esc_url($url) {}
}

if (!function_exists('home_url')) {
    /**
     * Retrieve the home URL for the current site
     *
     * @param string $path Optional. Path relative to the home URL.
     * @param string $scheme Optional. Scheme to give the home URL context.
     * @return string Home URL link with optional path appended.
     */
    function home_url($path = '', $scheme = null) {}
}

if (!function_exists('the_custom_logo')) {
    /**
     * Displays the custom logo
     *
     * @param int $blog_id Optional. ID of the blog in question. Default is the ID of the current blog.
     * @return bool True if the custom logo was displayed, false otherwise.
     */
    function the_custom_logo($blog_id = 0) {}
}

if (!function_exists('is_front_page')) {
    /**
     * Determines whether the query is for the front page of the site
     *
     * @return bool True if the query is for the front page of the site.
     */
    function is_front_page() {}
}

if (!function_exists('is_home')) {
    /**
     * Determines whether the query is for the blog homepage
     *
     * @return bool True if the query is for the blog homepage.
     */
    function is_home() {}
}

if (!function_exists('is_customize_preview')) {
    /**
     * Determines whether the site is being previewed in the Customizer
     *
     * @return bool True if the site is being previewed in the Customizer, false otherwise.
     */
    function is_customize_preview() {}
}

if (!function_exists('wp_nav_menu')) {
    /**
     * Display or retrieve HTML list of nav menu items
     *
     * @param array $args Optional. Array of nav menu arguments.
     * @return string|false|void HTML list of nav menu items, false if there are no items.
     */
    function wp_nav_menu($args = array()) {}
}

if (!function_exists('have_posts')) {
    /**
     * Whether the current WordPress query has posts to loop over
     *
     * @return bool True if posts are available, false if end of loop.
     */
    function have_posts() {}
}

if (!function_exists('is_front_page')) {
    /**
     * Determines whether the query is for the front page of the site
     *
     * @return bool True if the query is for the front page of the site.
     */
    function is_front_page() {}
}

if (!function_exists('single_post_title')) {
    /**
     * Display or retrieve page title for post
     *
     * @param string $prefix Optional. How to display the title.
     * @param bool $display Optional, default is true. Whether to display or retrieve title.
     * @return string|void Title when retrieving.
     */
    function single_post_title($prefix = '', $display = true) {}
}

if (!function_exists('the_post')) {
    /**
     * Iterate the post index in the loop
     */
    function the_post() {}
}

if (!function_exists('get_template_part')) {
    /**
     * Load a template part into a template
     *
     * @param string $slug The slug name for the generic template.
     * @param string $name The name of the specialised template.
     * @param array $args Optional. Additional arguments passed to the template.
     */
    function get_template_part($slug, $name = null, $args = array()) {}
}

if (!function_exists('get_post_type')) {
    /**
     * Retrieve the post type of the current post or of a given post
     *
     * @param int|WP_Post $post Optional. Post ID or post object. Default is global $post.
     * @return string|false Post type on success, false on failure.
     */
    function get_post_type($post = null) {}
}

if (!function_exists('the_posts_navigation')) {
    /**
     * Display navigation to next/previous set of posts when applicable
     *
     * @param array $args Optional. See get_the_posts_navigation() for available arguments.
     */
    function the_posts_navigation($args = array()) {}
}

if (!function_exists('get_sidebar')) {
    /**
     * Load sidebar template
     *
     * @param string $name The name of the specialised sidebar.
     */
    function get_sidebar($name = null) {}
}

if (!function_exists('the_archive_title')) {
    /**
     * Display the archive title based on the queried object
     *
     * @param string $before Optional. Content to prepend to the title. Default empty.
     * @param string $after Optional. Content to append to the title. Default empty.
     */
    function the_archive_title($before = '', $after = '') {}
}

if (!function_exists('the_archive_description')) {
    /**
     * Display the archive description based on the queried object
     *
     * @param string $before Optional. Content to prepend to the description. Default empty.
     * @param string $after Optional. Content to append to the description. Default empty.
     */
    function the_archive_description($before = '', $after = '') {}
}

// Additional functions from single.php and page.php
if (!function_exists('the_post_navigation')) {
    /**
     * Display navigation to next/previous post when applicable
     *
     * @param array $args Optional. See get_the_post_navigation() for available arguments.
     */
    function the_post_navigation($args = array()) {}
}

if (!function_exists('get_comments_number')) {
    /**
     * Retrieve the amount of comments a post has
     *
     * @param int|WP_Post $post_id Optional. The post ID. Default is the ID of the global $post.
     * @return int The number of comments for the given post.
     */
    function get_comments_number($post_id = 0) {}
}

if (!function_exists('comments_template')) {
    /**
     * Load the comment template specified in $file
     *
     * @param string $file Optional. The file to load. Default '/comments.php'.
     * @param bool $separate_comments Optional. Whether to separate the comments by comment type.
     */
    function comments_template($file = '/comments.php', $separate_comments = false) {}
}

if (!function_exists('esc_html__')) {
    /**
     * Retrieve translated text that has been escaped for safe use in HTML output
     *
     * @param string $text Text to translate.
     * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
     * @return string Translated text.
     */
    function esc_html__($text, $domain = 'default') {}
}

// WordPress Constants
if (!defined('ABSPATH')) {
    define('ABSPATH', '/');
}

if (!defined('WPINC')) {
    define('WPINC', 'wp-includes');
}

if (!defined('WP_CONTENT_DIR')) {
    define('WP_CONTENT_DIR', '/wp-content');
}

if (!defined('WP_CONTENT_URL')) {
    define('WP_CONTENT_URL', '/wp-content');
}

if (!defined('WP_PLUGIN_DIR')) {
    define('WP_PLUGIN_DIR', '/wp-content/plugins');
}

if (!defined('WP_PLUGIN_URL')) {
    define('WP_PLUGIN_URL', '/wp-content/plugins');
}

if (!defined('TEMPLATEPATH')) {
    define('TEMPLATEPATH', '/wp-content/themes');
}

if (!defined('STYLESHEETPATH')) {
    define('STYLESHEETPATH', '/wp-content/themes');
}
