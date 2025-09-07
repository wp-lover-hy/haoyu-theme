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

// Vite dev server 配置
define( 'HAOYU_VITE_DEV_SERVER', 'http://localhost:3000' );

/**
 * 检测 Vite 是否在开发模式运行
 */
function haoyuai_is_vite_running(): bool {
    $endpoint = HAOYU_VITE_DEV_SERVER . '/@vite/client';
    $res = wp_remote_get( $endpoint, array( 'timeout' => 0.5 ) );
    return ! is_wp_error( $res ) && 200 === (int) wp_remote_retrieve_response_code( $res );
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

    // 编辑器样式：dev 模式下加载 Vite 的样式，否则加载构建产物
    if ( haoyuai_is_vite_running() ) {
        add_editor_style( array( HAOYU_VITE_DEV_SERVER . '/src/scss/main.scss' ) );
    } else {
        $editor_css = get_stylesheet_directory() . '/dist/main.css';
        if ( file_exists( $editor_css ) ) {
            add_editor_style( 'dist/main.css' );
        }
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
    
    if ( haoyuai_is_vite_running() ) {
        // 开发模式：使用 Vite dev server（CSS 由 Vite 注入，不需要单独 enqueue）
        wp_enqueue_script( 'haoyuai-vite-client', HAOYU_VITE_DEV_SERVER . '/@vite/client', array(), null, true );
        wp_enqueue_script( 'haoyuai-theme-main', HAOYU_VITE_DEV_SERVER . '/src/main.js', array(), null, true );
    } else {
        // 生产模式：加载构建产物
        $css_file_path = get_stylesheet_directory() . '/dist/main.css';
        if ( file_exists( $css_file_path ) ) {
            wp_enqueue_style( 'haoyuai-child-style', 
                get_stylesheet_directory_uri() . '/dist/main.css', 
                array(),
                filemtime( $css_file_path )
            );
        }

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
}

// 为 Vite 的脚本标记添加 type="module"
add_filter( 'script_loader_tag', function( $tag, $handle, $src ) {
    if ( in_array( $handle, array( 'haoyuai-vite-client', 'haoyuai-theme-main' ), true ) ) {
        $tag = sprintf( '<script type="module" src="%s"></script>' . "\n", esc_url( $src ) );
    }
    return $tag;
}, 10, 3 );

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

