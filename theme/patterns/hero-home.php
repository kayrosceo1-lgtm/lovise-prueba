<?php
/**
 * Title: Hero — Página Principal
 * Slug: lovise/hero-home
 * Categories: lovise-hero
 * Keywords: hero, banner, home, landing
 * Description: Hero principal editorial para la homepage de LOVISE con imagen de moda y CTA.
 */
?>
<!-- wp:cover {"url":"","dimRatio":30,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":85,"minHeightUnit":"vh","contentPosition":"center center","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained","wideSize":"800px"}} -->
<div class="wp-block-cover" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);min-height:85vh">
  <span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-30 has-background-dim"></span>
  <div class="wp-block-cover__inner-container">

    <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"3.5rem","fontWeight":"400","letterSpacing":"-0.02em","lineHeight":"1.1"}},"textColor":"surface","fontFamily":"serif"} -->
    <h1 class="wp-block-heading has-text-align-center has-surface-color has-text-color has-serif-font-family" style="font-size:3.5rem;font-weight:400;letter-spacing:-0.02em;line-height:1.1">Encuentra tu silueta perfecta</h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"1.0625rem","lineHeight":"1.6"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"textColor":"surface","fontFamily":"sans"} -->
    <p class="has-text-align-center has-surface-color has-text-color has-sans-font-family" style="font-size:1.0625rem;line-height:1.6;margin-top:var(--wp--preset--spacing--30)">Pantalones y jeans diseñados con intención. Calidad premium, fit impecable, estética sofisticada.</p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
      <!-- wp:button {"backgroundColor":"surface","textColor":"primary","style":{"typography":{"fontWeight":"600","letterSpacing":"0.04em","fontSize":"0.875rem"},"border":{"radius":"0.25rem"},"spacing":{"padding":{"top":"0.875rem","bottom":"0.875rem","left":"2.5rem","right":"2.5rem"}}},"fontFamily":"sans"} -->
      <div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-surface-background-color has-text-color has-background wp-element-button has-sans-font-family" style="border-radius:0.25rem;padding-top:0.875rem;padding-right:2.5rem;padding-bottom:0.875rem;padding-left:2.5rem;font-size:0.875rem;font-weight:600;letter-spacing:0.04em" href="/tienda">Explorar colección</a></div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->

  </div>
</div>
<!-- /wp:cover -->
