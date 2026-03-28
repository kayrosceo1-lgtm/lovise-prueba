<?php
/**
 * Title: Banner de Marca
 * Slug: lovise/brand-banner
 * Categories: lovise-content
 * Keywords: brand, banner, about, story
 * Description: Banner editorial con historia de marca y CTA.
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"backgroundColor":"background","layout":{"type":"constrained","wideSize":"1200px"}} -->
<div class="wp-block-group has-background-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40)">

  <!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|70"}}}} -->
  <div class="wp-block-columns are-vertically-aligned-center">

    <!-- wp:column {"verticalAlignment":"center","width":"55%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%">
      <!-- wp:image {"style":{"border":{"radius":"0.25rem"}},"className":"lovise-product-card"} -->
      <figure class="wp-block-image lovise-product-card" style="border-radius:0.25rem"><img src="" alt="LOVISE — Diseñada para mujeres que eligen con intención"/></figure>
      <!-- /wp:image -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center","width":"45%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%">

      <!-- wp:heading {"level":6,"style":{"typography":{"letterSpacing":"0.08em","textTransform":"uppercase","fontSize":"0.6875rem","fontWeight":"600"}},"textColor":"secondary","fontFamily":"sans"} -->
      <h6 class="wp-block-heading has-secondary-color has-text-color has-sans-font-family" style="font-size:0.6875rem;font-weight:600;letter-spacing:0.08em;text-transform:uppercase">Nuestra historia</h6>
      <!-- /wp:heading -->

      <!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"2rem","letterSpacing":"-0.01em","lineHeight":"1.2"},"spacing":{"margin":{"top":"var:preset|spacing|20"}}},"fontFamily":"serif"} -->
      <h2 class="wp-block-heading has-serif-font-family" style="font-size:2rem;letter-spacing:-0.01em;line-height:1.2;margin-top:var(--wp--preset--spacing--20)">Diseñada para mujeres que eligen con intención</h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"style":{"typography":{"fontSize":"0.9375rem","lineHeight":"1.8"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"textColor":"foreground-muted","fontFamily":"sans"} -->
      <p class="has-foreground-muted-color has-text-color has-sans-font-family" style="font-size:0.9375rem;line-height:1.8;margin-top:var(--wp--preset--spacing--30)">LOVISE nació de una búsqueda personal: encontrar pantalones que combinaran un fit impecable con calidad duradera y una estética sofisticada. Cada pieza está pensada para mujeres que valoran los detalles, la comodidad y un estilo que habla sin gritar.</p>
      <!-- /wp:paragraph -->

      <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
      <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
        <!-- wp:button {"className":"is-style-lovise-primary"} -->
        <div class="wp-block-button is-style-lovise-primary"><a class="wp-block-button__link wp-element-button" href="/sobre-lovise">Conoce LOVISE</a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->

    </div>
    <!-- /wp:column -->

  </div>
  <!-- /wp:columns -->

</div>
<!-- /wp:group -->
