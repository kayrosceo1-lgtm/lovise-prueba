<?php get_header(); ?>
<main class="lovise-main">
    <div class="lovise-container">
        <div class="lovise-404">
            <div class="lovise-404__code" data-animate>404</div>
            <h2 class="lovise-404__title" data-animate data-delay="1">Parece que esta página se fue de compras</h2>
            <p class="lovise-404__text" data-animate data-delay="2">No encontramos lo que buscas, pero nuestra colección te está esperando.</p>
            <div class="lovise-404__buttons" data-animate data-delay="3">
                <a href="<?php echo esc_url( home_url('/') ); ?>" class="lovise-btn lovise-btn--primary">Volver al inicio</a>
                <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>" class="lovise-btn lovise-btn--outline">Explorar la tienda</a>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
