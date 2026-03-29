<?php
if ( ! defined( 'ABSPATH' ) ) exit;

define( 'LOVISE_VERSION', '3.0.0' );
define( 'LOVISE_DIR', get_template_directory() );
define( 'LOVISE_URI', get_template_directory_uri() );

/* ── Setup ─────────────────────────────────────────────── */
function lovise_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 200, 'flex-width' => true ) );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption' ) );
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 600,
        'single_image_width'    => 900,
        'product_grid'          => array( 'default_columns' => 4, 'default_rows' => 3 ),
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    register_nav_menus( array(
        'primary'   => __( 'Menú Principal', 'lovise' ),
        'footer'    => __( 'Menú Footer', 'lovise' ),
    ) );

    add_image_size( 'lovise-product', 600, 800, true );
    add_image_size( 'lovise-hero', 1600, 900, true );
}
add_action( 'after_setup_theme', 'lovise_setup' );

/* ── Assets ────────────────────────────────────────────── */
function lovise_assets() {
    // Fonts
    wp_enqueue_style( 'lovise-fonts', 'https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&family=Noto+Serif:ital,wght@0,400;0,600;0,700;1,400&display=swap', array(), null );
    // Main CSS
    wp_enqueue_style( 'lovise-main', LOVISE_URI . '/assets/css/main.css', array( 'lovise-fonts' ), LOVISE_VERSION );
    // WooCommerce CSS
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_style( 'lovise-woo', LOVISE_URI . '/assets/css/woocommerce.css', array( 'lovise-main' ), LOVISE_VERSION );
    }
    // JS
    wp_enqueue_script( 'lovise-main', LOVISE_URI . '/assets/js/main.js', array(), LOVISE_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'lovise_assets' );

/* ── Remove WordPress block styles (classic PHP theme, not needed) ─── */
function lovise_remove_block_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_deregister_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_deregister_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
    wp_deregister_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
    wp_deregister_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'lovise_remove_block_styles', 100 );

/* ── Remove WordPress global styles (classic PHP theme) ───────────── */
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
remove_action( 'wp_footer', 'wp_enqueue_stored_styles', 1 );
add_action( 'init', function() {
    remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
} );
add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'global-styles' );
}, 200 );

/* ── Widgets ───────────────────────────────────────────── */
function lovise_widgets() {
    register_sidebar( array(
        'name'          => 'Footer 1',
        'id'            => 'footer-1',
        'before_widget' => '<div class="lovise-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="lovise-widget__title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'lovise_widgets' );

/* ── WooCommerce: remove default styles ────────────────── */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/* ── WooCommerce: HPOS compatibility ───────────────────── */
add_action( 'before_woocommerce_init', function() {
    if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
    }
} );

/* ── Custom excerpt length ─────────────────────────────── */
add_filter( 'excerpt_length', function() { return 20; } );
add_filter( 'excerpt_more', function() { return '...'; } );

/* ── Include custom WooCommerce hooks ──────────────────── */
if ( class_exists( 'WooCommerce' ) ) {
    require_once LOVISE_DIR . '/inc/woocommerce.php';
}
