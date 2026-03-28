<?php
/**
 * LOVISE Theme Functions
 *
 * Minimal functions.php for a block theme.
 * Most styling is handled by theme.json.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme setup.
 */
function lovise_setup() {
    // Add editor styles
    add_editor_style( 'style.css' );

    // WooCommerce support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // WordPress features
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'lovise_setup' );

/**
 * Register block pattern categories.
 */
function lovise_register_pattern_categories() {
    register_block_pattern_category( 'lovise-hero', array(
        'label' => __( 'LOVISE — Hero', 'lovise' ),
    ) );
    register_block_pattern_category( 'lovise-commerce', array(
        'label' => __( 'LOVISE — Comercio', 'lovise' ),
    ) );
    register_block_pattern_category( 'lovise-content', array(
        'label' => __( 'LOVISE — Contenido', 'lovise' ),
    ) );
    register_block_pattern_category( 'lovise-cta', array(
        'label' => __( 'LOVISE — CTA', 'lovise' ),
    ) );
}
add_action( 'init', 'lovise_register_pattern_categories' );

/**
 * Enqueue Google Fonts.
 */
function lovise_enqueue_fonts() {
    wp_enqueue_style(
        'lovise-google-fonts',
        'https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&family=Noto+Serif:ital,wght@0,400;0,600;0,700;1,400&display=swap',
        array(),
        null
    );
}
add_action( 'wp_enqueue_scripts', 'lovise_enqueue_fonts' );
add_action( 'enqueue_block_editor_assets', 'lovise_enqueue_fonts' );

/**
 * Register custom block styles.
 */
function lovise_register_block_styles() {
    register_block_style( 'core/button', array(
        'name'  => 'lovise-primary',
        'label' => __( 'LOVISE Primario', 'lovise' ),
    ) );

    register_block_style( 'core/group', array(
        'name'  => 'lovise-card',
        'label' => __( 'LOVISE Card', 'lovise' ),
    ) );

    register_block_style( 'core/image', array(
        'name'  => 'lovise-product',
        'label' => __( 'LOVISE Producto', 'lovise' ),
    ) );
}
add_action( 'init', 'lovise_register_block_styles' );

/**
 * WooCommerce: Disable default styles (we handle styling via theme.json + style.css).
 */
function lovise_dequeue_wc_styles( $styles ) {
    // Keep only essential WooCommerce styles
    unset( $styles['woocommerce-general'] );
    unset( $styles['woocommerce-layout'] );
    return $styles;
}
add_filter( 'woocommerce_enqueue_styles', 'lovise_dequeue_wc_styles' );
