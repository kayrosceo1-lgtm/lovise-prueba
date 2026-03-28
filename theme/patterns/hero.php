<?php
/**
 * Title: Hero
 * Slug: wpf-starter/hero
 * Categories: featured
 * Keywords: hero, banner, header, landing
 * Description: A full-width hero section with heading, text, and call-to-action button.
 */
?>
<!-- wp:cover {"dimRatio":80,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":500,"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);min-height:500px">
  <span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-80 has-background-dim"></span>
  <div class="wp-block-cover__inner-container">
    <!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xx-large","textColor":"background"} -->
    <h1 class="has-text-align-center has-background-color has-text-color has-xx-large-font-size">Your Business, Amplified</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","textColor":"background","fontSize":"large"} -->
    <p class="has-text-align-center has-background-color has-text-color has-large-font-size">A modern website built for growth. Fast, accessible, and designed to convert.</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
      <!-- wp:button {"backgroundColor":"accent","textColor":"background"} -->
      <div class="wp-block-button"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background wp-element-button">Get Started</a></div>
      <!-- /wp:button -->
      <!-- wp:button {"className":"is-style-outline"} -->
      <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button">Learn More</a></div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
</div>
<!-- /wp:cover -->
