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

// 现代块主题/编辑器支持（遵循 WP 最新标准）
add_action( 'after_setup_theme', function () {
    // 核心块样式（如按钮、表格等的基础样式）
    add_theme_support( 'wp-block-styles' );

    // 宽度对齐（alignwide/alignfull）
    add_theme_support( 'align-wide' );

    // 响应式嵌入
    add_theme_support( 'responsive-embeds' );

    // 编辑器样式：让编辑器与前端保持一致
    add_theme_support( 'editor-styles' );

    // 优先使用构建产物，如果不存在也不报错
    $editor_css = get_stylesheet_directory() . '/dist/main.css';
    if ( file_exists( $editor_css ) ) {
        add_editor_style( 'dist/main.css' );
    }
} );

// 正确加载GeneratePress父主题的完整样式
add_action( 'wp_enqueue_scripts', 'haoyuai_enqueue_assets' );
function haoyuai_enqueue_assets() {
    // 加载GeneratePress父主题的主要样式文件
    wp_enqueue_style( 'generatepress-style', 
        get_template_directory_uri() . '/assets/css/style.css', 
        array(),
        wp_get_theme()->parent()->get('Version')
    );
    
    // 加载GeneratePress的main.css
    // wp_enqueue_style( 'generatepress-main', 
    //     get_template_directory_uri() . '/assets/css/main.css', 
    //     array( 'generatepress-style' ),
    //     wp_get_theme()->parent()->get('Version')
    // );
    
    // 加载GeneratePress的all.css（包含所有组件）
    // wp_enqueue_style( 'generatepress-all', 
    //     get_template_directory_uri() . '/assets/css/all.css', 
    //     array( 'generatepress-main' ),
    //     wp_get_theme()->parent()->get('Version')
    // );
    
    // GeneratePress会自动加载必要的JavaScript，不需要手动加载
    
    // 加载子主题的样式（如果有）
    $css_file_path = get_stylesheet_directory() . '/dist/main.css';
    if ( file_exists( $css_file_path ) ) {
        wp_enqueue_style( 'haoyuai-child-style', 
            get_stylesheet_directory_uri() . '/dist/main.css', 
            array( 'generatepress-all' ),
            filemtime( $css_file_path )
        );
    }
    
    // 加载子主题的JavaScript（如果有）
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

// 可选：在前台移除不必要的样式，减少重复/体积（如不用Gutenberg前端样式与dashicons）
add_action( 'wp_enqueue_scripts', function() {
    if ( ! is_admin() ) {
        // 如页面未使用 Gutenberg 块前端样式，可解除下一行注释
        // wp_dequeue_style( 'wp-block-library' );
        // 未登录用户不需要 dashicons
        if ( ! is_user_logged_in() ) {
            wp_dequeue_style( 'dashicons' );
        }
    }
}, 100 );

// 添加主题样式类名到 body
add_filter( 'body_class', 'haoyuai_add_theme_class' );
function haoyuai_add_theme_class( $classes ) {
    $classes[] = 'haoyu-theme';
    return $classes;
}

