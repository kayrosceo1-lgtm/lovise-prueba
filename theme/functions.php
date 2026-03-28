<?php
/**
 * WPF Starter Theme functions
 *
 * Minimal functions.php for a block theme.
 * Most styling is handled by theme.json.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register block patterns category.
 */
function wpf_register_pattern_categories() {
    register_block_pattern_category( 'wpf-starter', array(
        'label' => __( 'WPF Starter', 'wpf-starter' ),
    ) );
}
add_action( 'init', 'wpf_register_pattern_categories' );

/**
 * Enqueue editor styles.
 */
function wpf_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'wpf_editor_styles' );
