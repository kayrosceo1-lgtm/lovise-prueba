<?php
/**
 * Title: Nuevas Llegadas
 * Slug: lovise/new-arrivals
 * Categories: lovise-commerce
 * Keywords: new, arrivals, products, latest
 * Description: Sección de productos recién llegados con badge "Nuevo".
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"background-soft","layout":{"type":"constrained","wideSize":"1200px"}} -->
<div class="wp-block-group has-background-soft-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40)">

  <!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}}} -->
  <div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--50)">
    <!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"2rem","letterSpacing":"-0.01em"}},"fontFamily":"serif"} -->
    <h2 class="wp-block-heading has-serif-font-family" style="font-size:2rem;letter-spacing:-0.01em">Recién llegadas</h2>
    <!-- /wp:heading -->
    <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}},"fontFamily":"sans"} -->
    <p class="has-sans-font-family" style="font-size:0.875rem"><a href="/categoria/nuevas-llegadas">Ver todas →</a></p>
    <!-- /wp:paragraph -->
  </div>
  <!-- /wp:group -->

  <!-- wp:woocommerce/product-collection {"queryId":21,"query":{"perPage":4,"pages":1,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true}} -->
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

</div>
<!-- /wp:group -->
