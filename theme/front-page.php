<?php get_header(); ?>

<!-- HERO — Split screen -->
<section class="lovise-hero">
    <div class="lovise-hero__image">
        <img src="<?php echo esc_url( content_url( '/uploads/lovise/hero-main.jpg' ) ); ?>" alt="LOVISE — Moda femenina" loading="eager">
    </div>
    <div class="lovise-hero__content">
        <span class="lovise-hero__label" data-animate>Nueva Colección 2026</span>
        <h1 class="lovise-hero__title" data-animate data-delay="1">Encuentra tu<br>silueta perfecta</h1>
        <p class="lovise-hero__text" data-animate data-delay="2">Jeans y pantalones diseñados con intención. Calidad premium, fit impecable, estética que trasciende las temporadas.</p>
        <div class="lovise-hero__buttons" data-animate data-delay="3">
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>" class="lovise-btn lovise-btn--primary">Explorar colección</a>
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>?orderby=date" class="lovise-btn lovise-btn--outline">Nuevas llegadas</a>
        </div>
    </div>
</section>

<!-- COLLECTIONS — Asymmetric grid -->
<section class="lovise-section lovise-section--soft">
    <div class="lovise-container">
        <div class="lovise-section-header" data-animate>
            <h2 class="lovise-section__title">Explora por colección</h2>
            <div class="lovise-section__line"></div>
        </div>
        <div class="lovise-collections" data-animate>
            <?php
            $uploads = content_url( '/uploads/lovise/' );
            $collections = array(
                array( 'name' => 'Skinny Jeans', 'slug' => 'skinny-jeans', 'img' => $uploads . 'col-skinny.jpg', 'desc' => 'Ceñidos y definidos' ),
                array( 'name' => 'Mom Jeans', 'slug' => 'mom-jeans', 'img' => $uploads . 'col-mom.jpg', 'desc' => 'Relajados y favorecedores' ),
                array( 'name' => 'Levanta Cola', 'slug' => 'levanta-cola', 'img' => $uploads . 'col-levanta.jpg', 'desc' => 'Realza tu silueta' ),
                array( 'name' => 'Wide Leg', 'slug' => 'wide-leg', 'img' => $uploads . 'col-wide.jpg', 'desc' => 'Elegancia amplia' ),
                array( 'name' => 'Palazzo', 'slug' => 'palazzo', 'img' => $uploads . 'col-palazzo.jpg', 'desc' => 'Fluidez total' ),
            );
            foreach ( $collections as $i => $col ) :
                $cat_link = get_term_link( $col['slug'], 'product_cat' );
                if ( is_wp_error( $cat_link ) ) $cat_link = get_permalink( wc_get_page_id('shop') );
            ?>
                <a href="<?php echo esc_url( $cat_link ); ?>" class="lovise-collection-card" data-animate data-delay="<?php echo $i; ?>">
                    <img src="<?php echo esc_url($col['img']); ?>" alt="<?php echo esc_attr($col['name']); ?>" loading="lazy">
                    <div class="lovise-collection-card__overlay">
                        <h3 class="lovise-collection-card__name"><?php echo esc_html($col['name']); ?></h3>
                        <span class="lovise-collection-card__cta">Explorar →</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="lovise-section">
    <div class="lovise-container">
        <div class="lovise-section-header" data-animate>
            <h2 class="lovise-section__title">Selección de la semana</h2>
            <div class="lovise-section__line"></div>
            <p class="lovise-section__subtitle">Las piezas que más están amando nuestras clientas.</p>
        </div>
        <div class="lovise-products-grid" data-animate>
            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 8,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            );
            $products = new WP_Query( $args );
            if ( $products->have_posts() ) :
                while ( $products->have_posts() ) : $products->the_post();
                    global $product;
            ?>
                <div class="lovise-product-card" data-animate>
                    <a href="<?php the_permalink(); ?>" class="lovise-product-card__link">
                        <figure class="lovise-product-card__image">
                            <?php if ( $product->is_featured() ) : ?>
                                <span class="lovise-badge lovise-badge--new">Nuevo</span>
                            <?php elseif ( $product->is_on_sale() ) : ?>
                                <span class="lovise-badge lovise-badge--sale">Oferta</span>
                            <?php endif; ?>
                            <?php if ( has_post_thumbnail() ) :
                                the_post_thumbnail( 'lovise-product', array( 'loading' => 'lazy' ) );
                            else : ?>
                                <img src="https://images.unsplash.com/photo-1582418702059-97ebafb35d09?w=500&q=80" alt="<?php the_title_attribute(); ?>" loading="lazy">
                            <?php endif; ?>
                            <div class="lovise-product-card__action">
                                <span>Ver producto →</span>
                            </div>
                        </figure>
                        <div class="lovise-product-card__info">
                            <h3 class="lovise-product-card__name"><?php the_title(); ?></h3>
                            <p class="lovise-product-card__price"><?php echo $product->get_price_html(); ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
        <div class="lovise-section__cta" data-animate>
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>" class="lovise-btn lovise-btn--outline">Ver toda la tienda</a>
        </div>
    </div>
</section>

<!-- BRAND BANNER — Bleeding image -->
<section class="lovise-brand">
    <div class="lovise-brand__image" data-animate>
        <img src="<?php echo esc_url( content_url( '/uploads/lovise/brand.jpg' ) ); ?>" alt="LOVISE — Nuestra historia" loading="lazy">
    </div>
    <div class="lovise-brand__content" data-animate data-delay="2">
        <span class="lovise-brand__label">Nuestra historia</span>
        <h2 class="lovise-brand__title">Diseñada para mujeres que eligen con intención</h2>
        <p class="lovise-brand__text">LOVISE nació de una búsqueda personal: encontrar pantalones que combinaran un fit impecable con calidad duradera y una estética sofisticada. Cada pieza está pensada para mujeres que valoran los detalles.</p>
        <a href="#" class="lovise-btn lovise-btn--primary">Conoce LOVISE</a>
    </div>
</section>

<!-- BENEFITS -->
<section class="lovise-benefits">
    <div class="lovise-container lovise-benefits__inner" data-animate>
        <div class="lovise-benefit">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
            <h4>Envío gratis</h4>
            <p>En pedidos desde $150.000</p>
        </div>
        <div class="lovise-benefit">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
            <h4>Cambios sin costo</h4>
            <p>Durante los primeros 30 días</p>
        </div>
        <div class="lovise-benefit">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <h4>Pago 100% seguro</h4>
            <p>Cifrado SSL en todo el sitio</p>
        </div>
        <div class="lovise-benefit">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
            <h4>Atención personalizada</h4>
            <p>Por WhatsApp y correo</p>
        </div>
    </div>
</section>

<!-- TESTIMONIALS — Staggered -->
<section class="lovise-section">
    <div class="lovise-container">
        <div class="lovise-section-header" data-animate>
            <h2 class="lovise-section__title">Lo que dicen nuestras clientas</h2>
            <div class="lovise-section__line"></div>
        </div>
        <div class="lovise-testimonials" data-animate>
            <div class="lovise-testimonial">
                <div class="lovise-testimonial__quote">"</div>
                <p class="lovise-testimonial__text">Los mejores jeans que he tenido. El fit es perfecto y la tela se siente premium. Ya van tres pares y quiero más.</p>
                <div class="lovise-testimonial__author">
                    <div class="lovise-testimonial__avatar">C</div>
                    <div>
                        <strong>Carolina M.</strong>
                        <span>Mom Jean Clásico</span>
                    </div>
                </div>
            </div>
            <div class="lovise-testimonial lovise-testimonial--elevated">
                <div class="lovise-testimonial__quote">"</div>
                <p class="lovise-testimonial__text">Me encanta cómo cuidan cada detalle, desde el empaque hasta las costuras. Se nota que es una marca hecha con amor y buen gusto. La atención por WhatsApp fue espectacular.</p>
                <div class="lovise-testimonial__author">
                    <div class="lovise-testimonial__avatar">V</div>
                    <div>
                        <strong>Valentina R.</strong>
                        <span>Skinny Jean Negro</span>
                    </div>
                </div>
            </div>
            <div class="lovise-testimonial">
                <div class="lovise-testimonial__quote">"</div>
                <p class="lovise-testimonial__text">El levanta cola es espectacular. Nunca me había sentido tan segura con unos jeans. Definitivamente volveré por más.</p>
                <div class="lovise-testimonial__author">
                    <div class="lovise-testimonial__avatar">M</div>
                    <div>
                        <strong>María José L.</strong>
                        <span>Levanta Cola Premium</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
