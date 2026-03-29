<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Announcement bar -->
<div class="lovise-topbar">
    <div class="lovise-container">
        <p>Envío gratis en pedidos superiores a $150.000 · Cambios sin costo en 30 días</p>
    </div>
</div>

<!-- Header -->
<header class="lovise-header" id="lovise-header">
    <div class="lovise-container lovise-header__inner">

        <!-- Mobile menu toggle -->
        <button class="lovise-header__toggle" id="menu-toggle" aria-label="Menú">
            <span></span><span></span><span></span>
        </button>

        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="lovise-header__logo">
            <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
                <span class="lovise-logo-text">LOVISE</span>
            <?php endif; ?>
        </a>

        <!-- Navigation -->
        <nav class="lovise-nav" id="lovise-nav">
            <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'lovise-nav__list',
                'fallback_cb'    => false,
            ) ); ?>
        </nav>

        <!-- Header actions -->
        <div class="lovise-header__actions">
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="lovise-header__icon" aria-label="Mi cuenta">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </a>
            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="lovise-header__icon lovise-header__cart" aria-label="Carrito">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
                <?php if ( WC()->cart && WC()->cart->get_cart_contents_count() > 0 ) : ?>
                    <span class="lovise-header__cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                <?php endif; ?>
            </a>
        </div>

    </div>
</header>
