<?php
/**
 * Template Name: Sobre LOVISE
 * Template for: page-sobre-lovise
 */
get_header(); ?>

<!-- Hero Sobre LOVISE -->
<section class="lovise-about-hero">
    <div class="lovise-about-hero__image">
        <img src="<?php echo esc_url( content_url( '/uploads/lovise/brand.jpg' ) ); ?>" alt="Sobre LOVISE" loading="eager">
    </div>
    <div class="lovise-about-hero__overlay">
        <span class="lovise-about-hero__label" data-animate>Nuestra historia</span>
        <h1 class="lovise-about-hero__title" data-animate data-delay="1">Diseñada para mujeres<br>que eligen con intención</h1>
    </div>
</section>

<!-- Historia -->
<section class="lovise-section">
    <div class="lovise-container lovise-about-content">
        <div class="lovise-about-block" data-animate>
            <h2>Cómo nació LOVISE</h2>
            <p>LOVISE nació de una búsqueda personal: encontrar pantalones que combinaran un fit impecable con calidad duradera y una estética sofisticada. Después de años buscando sin éxito, decidimos crear nuestra propia marca.</p>
            <p>Cada pieza LOVISE está pensada para mujeres que valoran los detalles: costuras reforzadas, denim premium con el stretch justo, siluetas que favorecen todos los cuerpos. No seguimos tendencias pasajeras — diseñamos piezas que trascienden las temporadas.</p>
        </div>
        <div class="lovise-about-block" data-animate>
            <h2>Lo que nos mueve</h2>
            <p>Creemos que vestirse bien no debería ser complicado. Un buen par de pantalones puede transformar cómo te sientes, cómo caminas, cómo te presentas al mundo. Por eso ponemos obsesión en cada detalle del fit.</p>
        </div>
    </div>
</section>

<!-- Valores -->
<section class="lovise-section lovise-section--soft">
    <div class="lovise-container">
        <div class="lovise-section-header" data-animate>
            <h2 class="lovise-section__title">Nuestros valores</h2>
            <div class="lovise-section__line"></div>
        </div>
        <div class="lovise-about-values" data-animate>
            <div class="lovise-about-value">
                <div class="lovise-about-value__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3>Calidad sin compromiso</h3>
                <p>Denim premium, costuras reforzadas, acabados impecables. Cada pieza está hecha para durar temporadas, no semanas.</p>
            </div>
            <div class="lovise-about-value">
                <div class="lovise-about-value__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                </div>
                <h3>Fit que favorece</h3>
                <p>Probamos cada diseño en diferentes cuerpos y siluetas. Nuestro fit está pensado para que te sientas segura desde el primer momento.</p>
            </div>
            <div class="lovise-about-value">
                <div class="lovise-about-value__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                </div>
                <h3>Estética con intención</h3>
                <p>No seguimos tendencias pasajeras. Diseñamos piezas atemporales con una estética sofisticada que se adapta a tu estilo personal.</p>
            </div>
            <div class="lovise-about-value">
                <div class="lovise-about-value__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3>Cercanía real</h3>
                <p>Atención personalizada por WhatsApp, cambios sin complicaciones y una comunidad de mujeres que comparten nuestra visión.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="lovise-section">
    <div class="lovise-container" style="text-align: center;" data-animate>
        <h2 class="lovise-section__title">Tu próximo par favorito te está esperando</h2>
        <div class="lovise-section__line"></div>
        <div style="margin-top: 2.5rem;">
            <a href="<?php echo esc_url( get_permalink( wc_get_page_id('shop') ) ); ?>" class="lovise-btn lovise-btn--primary">Explorar la colección</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
