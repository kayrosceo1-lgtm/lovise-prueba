<?php
/**
 * Title: Productos Destacados
 * Slug: lovise/featured-products
 * Categories: lovise-commerce
 * Keywords: products, featured, grid, shop
 * Description: Sección de productos destacados con grid 4 columnas.
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"background","layout":{"type":"constrained","wideSize":"1200px"}} -->
<div class="wp-block-group has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40)">

  <!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontSize":"2rem","letterSpacing":"-0.01em"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}},"fontFamily":"serif"} -->
  <h2 class="wp-block-heading has-text-align-center has-serif-font-family" style="font-size:2rem;letter-spacing:-0.01em;margin-bottom:var(--wp--preset--spacing--20)">Selección de la semana</h2>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"0.9375rem"},"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"textColor":"foreground-muted","fontFamily":"sans"} -->
  <p class="has-text-align-center has-foreground-muted-color has-text-color has-sans-font-family" style="font-size:0.9375rem;margin-bottom:var(--wp--preset--spacing--50)">Las piezas que más están amando nuestras clientas esta semana.</p>
  <!-- /wp:paragraph -->

  <!-- wp:woocommerce/product-collection {"queryId":20,"query":{"perPage":8,"pages":1,"offset":0,"postType":"product","order":"desc","orderBy":"popularity","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":true}} -->
  <div class="wp-block-woocommerce-product-collection">
    <!-- wp:woocommerce/product-template {"layout":{"type":"grid","columnCount":4}} -->
      <!-- wp:group {"className":"lovise-product-card lovise-card-hover","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
      <div class="wp-block-group lovise-product-card lovise-card-hover" style="padding-bottom:var(--wp--preset--spacing--30)">
        <!-- wp:woocommerce/product-image {"isDescendentOfQueryLoop":true,"style":{"border":{"radius":"0.25rem"}},"aspectRatio":"3/4"} /-->
        <!-- wp:post-title {"level":3,"isLink":true,"style":{"typography":{"fontSize":"0.875rem","fontWeight":"600","lineHeight":"1.4"}},"fontFamily":"sans"} /-->
        <!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--serif)","fontSize":"1rem"}}} /-->
      </div>
      <!-- /wp:group -->
    <!-- /wp:woocommerce/product-template -->
  </div>
  <!-- /wp:woocommerce/product-collection -->

  <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
  <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--50)">
    <!-- wp:button {"className":"is-style-outline"} -->
    <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="/tienda">Ver toda la tienda</a></div>
    <!-- /wp:button -->
  </div>
  <!-- /wp:buttons -->

</div>
<!-- /wp:group -->
