<?php
/**
 * Title: Features
 * Slug: wpf-starter/features
 * Categories: featured
 * Keywords: features, services, columns, grid
 * Description: A three-column features section with icons and descriptions.
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"muted","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-muted-background-color has-background" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
  <!-- wp:heading {"textAlign":"center","fontSize":"x-large"} -->
  <h2 class="has-text-align-center has-x-large-font-size">What We Offer</h2>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"align":"center","fontSize":"medium"} -->
  <p class="has-text-align-center has-medium-font-size">Everything you need to succeed online.</p>
  <!-- /wp:paragraph -->

  <!-- wp:columns {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40"}}}} -->
  <div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--40)">
    <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|20","bottom":"var:preset|spacing|30","left":"var:preset|spacing|20"}}}} -->
    <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20)">
      <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
      <h3 class="has-text-align-center has-large-font-size">Fast Performance</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"align":"center"} -->
      <p class="has-text-align-center">Optimized for speed with modern block architecture. No bloated plugins, no unnecessary scripts.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|20","bottom":"var:preset|spacing|30","left":"var:preset|spacing|20"}}}} -->
    <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20)">
      <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
      <h3 class="has-text-align-center has-large-font-size">Easy to Edit</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"align":"center"} -->
      <p class="has-text-align-center">Built with the WordPress Site Editor. Update content, change colors, and rearrange sections visually.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|20","bottom":"var:preset|spacing|30","left":"var:preset|spacing|20"}}}} -->
    <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--20)">
      <!-- wp:heading {"textAlign":"center","level":3,"fontSize":"large"} -->
      <h3 class="has-text-align-center has-large-font-size">SEO Ready</h3>
      <!-- /wp:heading -->
      <!-- wp:paragraph {"align":"center"} -->
      <p class="has-text-align-center">Semantic HTML, proper heading hierarchy, and optimized structure for search engines out of the box.</p>
      <!-- /wp:paragraph -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->
