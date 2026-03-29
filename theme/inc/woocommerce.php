<?php
/**
 * LOVISE WooCommerce customizations
 * Textos en español de Colombia
 */
if ( ! defined( 'ABSPATH' ) ) exit;

// Remove default WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Custom wrappers
add_action( 'woocommerce_before_main_content', function() {
    echo '<main class="lovise-main"><div class="lovise-container">';
}, 10 );
add_action( 'woocommerce_after_main_content', function() {
    echo '</div></main>';
}, 10 );

// Products per page
add_filter( 'loop_shop_per_page', function() { return 12; } );

// Product columns
add_filter( 'loop_shop_columns', function() { return 4; } );

// Related products
add_filter( 'woocommerce_output_related_products_args', function( $args ) {
    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
} );

// Remove sidebar from shop
add_action( 'wp', function() {
    if ( is_shop() || is_product_category() || is_product() ) {
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    }
} );

// Add custom badge on products
add_action( 'woocommerce_before_shop_loop_item_title', function() {
    global $product;
    if ( $product->is_on_sale() ) {
        echo '<span class="lovise-badge lovise-badge--sale">Oferta</span>';
    } elseif ( $product->is_featured() ) {
        echo '<span class="lovise-badge lovise-badge--new">Nuevo</span>';
    }
}, 5 );

// Hide default sale flash (we use custom badges)
add_filter( 'woocommerce_sale_flash', '__return_empty_string' );

// Currency format for COP
add_filter( 'woocommerce_price_format', function() {
    return '$ %2$s';
} );

/* ── Spanish (Colombia) translations ─────────────────── */

// "Agregar al carrito" button
add_filter( 'woocommerce_product_single_add_to_cart_text', function() {
    return 'Agregar al carrito';
} );
add_filter( 'woocommerce_product_add_to_cart_text', function() {
    return 'Agregar al carrito';
} );

// "Finalizar compra" button
add_filter( 'woocommerce_order_button_text', function() {
    return 'Confirmar pedido';
} );

// Proceed to checkout
add_filter( 'gettext', function( $translated, $text, $domain ) {
    if ( $domain !== 'woocommerce' ) return $translated;

    $replacements = array(
        // Cart
        'Proceed to checkout'       => 'Finalizar compra',
        'Update cart'               => 'Actualizar carrito',
        'Cart updated.'             => 'Carrito actualizado.',
        'Coupon code'               => 'Código de descuento',
        'Apply coupon'              => 'Aplicar',
        'Cart totals'               => 'Resumen de tu pedido',
        'Cart'                      => 'Carrito',
        'Subtotal'                  => 'Subtotal',
        'Total'                     => 'Total',
        'Shipping'                  => 'Envío',
        'Free shipping'             => 'Envío gratis',
        'Free!'                     => '¡Gratis!',
        'Remove this item'          => 'Eliminar',
        'View cart'                 => 'Ver carrito',

        // Checkout
        'Billing details'           => 'Información de envío',
        'Billing &amp; Shipping'    => 'Datos de envío',
        'Ship to a different address?' => '¿Enviar a otra dirección?',
        'Additional information'    => 'Notas del pedido',
        'Your order'                => 'Tu pedido',
        'Place order'               => 'Confirmar pedido',
        'Order notes'               => 'Notas del pedido',
        'Notes about your order, e.g. special notes for delivery.' => 'Notas sobre tu pedido, ej: instrucciones de entrega.',

        // Form fields
        'First name'                => 'Nombre',
        'Last name'                 => 'Apellidos',
        'Company name'              => 'Empresa (opcional)',
        'Street address'            => 'Dirección',
        'Apartment, suite, unit, etc.' => 'Apartamento, oficina, etc.',
        'Town / City'               => 'Ciudad',
        'State / County'            => 'Departamento',
        'Postcode / ZIP'            => 'Código postal',
        'Phone'                     => 'Teléfono',
        'Email address'             => 'Correo electrónico',
        'Country / Region'          => 'País',
        'House number and street name' => 'Dirección y número',
        'Apartment, suite, unit, etc. (optional)' => 'Apartamento, oficina, etc. (opcional)',

        // Product
        'Description'               => 'Descripción',
        'Additional information'    => 'Información adicional',
        'Reviews'                   => 'Reseñas',
        'Related products'          => 'También te puede gustar',
        'Add to cart'               => 'Agregar al carrito',
        'Read more'                 => 'Ver más',
        'Select options'            => 'Elegir opciones',
        'In stock'                  => 'Disponible',
        'Out of stock'              => 'Agotado',
        'SKU:'                      => 'Ref:',
        'Category:'                 => 'Categoría:',
        'Categories:'               => 'Categorías:',
        'Tag:'                      => 'Etiqueta:',
        'Tags:'                     => 'Etiquetas:',

        // Shop
        'Default sorting'           => 'Ordenar por defecto',
        'Sort by popularity'        => 'Más populares',
        'Sort by average rating'    => 'Mejor valorados',
        'Sort by latest'            => 'Más recientes',
        'Sort by price: low to high' => 'Precio: menor a mayor',
        'Sort by price: high to low' => 'Precio: mayor a menor',
        'Showing all %d results'    => 'Mostrando todos los %d resultados',
        'Showing the single result' => 'Mostrando el único resultado',
        'Search results: &ldquo;%s&rdquo;' => 'Resultados de búsqueda: &ldquo;%s&rdquo;',
        'Products'                  => 'Productos',
        'No products were found matching your selection.' => 'No encontramos productos con esos filtros.',
        'Search products&hellip;'   => 'Buscar productos&hellip;',

        // Account
        'Login'                     => 'Iniciar sesión',
        'Register'                  => 'Crear cuenta',
        'Username or email address' => 'Correo electrónico',
        'Password'                  => 'Contraseña',
        'Remember me'               => 'Recordarme',
        'Log in'                    => 'Iniciar sesión',
        'Lost your password?'       => '¿Olvidaste tu contraseña?',
        'Dashboard'                 => 'Mi panel',
        'Orders'                    => 'Mis pedidos',
        'Downloads'                 => 'Descargas',
        'Addresses'                 => 'Mis direcciones',
        'Account details'           => 'Mis datos',
        'Logout'                    => 'Cerrar sesión',
        'Log out'                   => 'Cerrar sesión',
        'No order has been made yet.' => 'Aún no tienes pedidos.',
        'Browse products'           => 'Explorar productos',

        // Notices
        'has been added to your cart.' => 'se agregó a tu carrito.',
        'Return to shop'            => 'Seguir comprando',
        'Your cart is currently empty.' => 'Tu carrito está vacío.',

        // WooCommerce strings
        'Sale!'                     => '¡Oferta!',
        'Product'                   => 'Producto',
        'Price'                     => 'Precio',
        'Quantity'                  => 'Cantidad',
    );

    if ( isset( $replacements[ $text ] ) ) {
        return $replacements[ $text ];
    }

    return $translated;
}, 10, 3 );

// Translate "Showing x–y of z results"
add_filter( 'woocommerce_result_count_html', function( $html ) {
    $html = str_replace( 'Showing', 'Mostrando', $html );
    $html = str_replace( 'of', 'de', $html );
    $html = str_replace( 'results', 'resultados', $html );
    $html = str_replace( 'result', 'resultado', $html );
    return $html;
} );

// Shop page title
add_filter( 'woocommerce_page_title', function( $title ) {
    if ( is_shop() ) {
        return 'Nuestra colección';
    }
    return $title;
} );

// Add benefits list after add-to-cart on single product
add_action( 'woocommerce_single_product_summary', function() {
    echo '<ul class="lovise-product-benefits">';
    echo '<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg> Envío gratis en pedidos desde $150.000</li>';
    echo '<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg> Cambios sin costo en los primeros 30 días</li>';
    echo '<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Pago 100% seguro con cifrado SSL</li>';
    echo '</ul>';
}, 35 );

// Translate related products heading
add_filter( 'woocommerce_product_related_products_heading', function() {
    return 'También te puede gustar';
} );

// Breadcrumb defaults in Spanish
add_filter( 'woocommerce_breadcrumb_defaults', function( $defaults ) {
    $defaults['delimiter']   = ' / ';
    $defaults['home']        = 'Inicio';
    $defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb">';
    $defaults['wrap_after']  = '</nav>';
    return $defaults;
} );

// Change "Tienda" to "Colección" in breadcrumbs
add_filter( 'woocommerce_breadcrumb_home_url', function() {
    return home_url( '/' );
} );
