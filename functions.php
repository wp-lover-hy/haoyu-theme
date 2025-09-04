<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Load IDE-only autocompletion file.
 * This file is not loaded in production environments.
 */
if ( file_exists( __DIR__ . '/wordpress-stubs.php' ) ) {
    require_once __DIR__ . '/wordpress-stubs.php';
}

// Enqueue parent and child assets
add_action( 'wp_enqueue_scripts', 'haoyuai_enqueue_assets' );
function haoyuai_enqueue_assets() {
    $theme = wp_get_theme();
    
    // Enqueue Parent Theme Stylesheet
    wp_enqueue_style( 'generate-style', 
        get_template_directory_uri() . '/style.css', 
        array(),
        $theme->parent()->get('Version')
    );
    
    // Enqueue Child Theme Compiled Stylesheet
    $css_file_path = get_stylesheet_directory() . '/dist/main.css';
    if ( file_exists( $css_file_path ) ) {
        wp_enqueue_style( 'haoyuai-child-style', 
            get_stylesheet_directory_uri() . '/dist/main.css', 
            array( 'generate-style' ),
            filemtime( $css_file_path )
        );
    }

    // Enqueue Child Theme Compiled Script
    $js_file_path = get_stylesheet_directory() . '/dist/main.js';
    if ( file_exists( $js_file_path ) ) {
        wp_enqueue_script( 'haoyuai-child-script',
            get_stylesheet_directory_uri() . '/dist/main.js',
            array(),
            filemtime( $js_file_path ),
            true
        );
    }
}
