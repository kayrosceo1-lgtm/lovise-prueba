<?php
/**
 * Title: Call to Action
 * Slug: wpf-starter/cta
 * Categories: featured, call-to-action
 * Keywords: cta, call to action, contact
 * Description: A centered call-to-action section with heading and button.
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"secondary","textColor":"background","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background-color has-secondary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
  <!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
  <h2 class="has-text-align-center has-x-large-font-size">Ready to Get Started?</h2>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
  <p class="has-text-align-center has-medium-font-size">Let's build something great together. Reach out today for a free consultation.</p>
  <!-- /wp:paragraph -->

  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
  <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)">
    <!-- wp:button {"backgroundColor":"accent","textColor":"background","fontSize":"medium"} -->
    <div class="wp-block-button has-custom-font-size has-medium-font-size"><a class="wp-block-button__link has-background-color has-accent-background-color has-text-color has-background wp-element-button">Contact Us</a></div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->
</div>
<!-- /wp:group -->
