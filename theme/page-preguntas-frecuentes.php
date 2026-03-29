<?php
/**
 * Template for: page-preguntas-frecuentes
 */
get_header(); ?>

<main class="lovise-main">
    <div class="lovise-container" style="max-width: 800px;">

        <div class="lovise-page-header" data-animate>
            <h1 class="lovise-page-title">Preguntas frecuentes</h1>
            <p class="lovise-page-subtitle">Encuentra respuestas a las dudas más comunes sobre pedidos, tallas, envíos y más.</p>
        </div>

        <!-- Pedidos y envíos -->
        <div class="lovise-faq-group" data-animate>
            <h2 class="lovise-faq-group__title">Pedidos y envíos</h2>

            <div class="lovise-accordion">
                <button class="lovise-accordion__trigger">
                    <span>¿Cuánto tarda en llegar mi pedido?</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="lovise-accordion__content">
                    <p>Los envíos dentro de las principales ciudades de Colombia tardan entre 2 y 4 días hábiles. Para municipios y zonas rurales, el tiempo estimado es de 5 a 8 días hábiles.</p>
                </div>
            </div>

            <div class="lovise-accordion">
                <button class="lovise-accordion__trigger">
                    <span>¿El envío es gratis?</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="lovise-accordion__content">
                    <p>Sí, el envío es gratis en pedidos superiores a $150.000 COP a todo el territorio nacional. Para pedidos de menor valor, el costo de envío se calcula según tu ubicación.</p>
                </div>
            </div>

            <div class="lovise-accordion">
                <button class="lovise-accordion__trigger">
                    <span>¿Puedo rastrear mi pedido?</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="lovise-accordion__content">
                    <p>Sí. Una vez despachado tu pedido, recibirás un correo electrónico con el número de guía y el enlace de seguimiento de la transportadora.</p>
                </div>
            </div>
        </div>

        <!-- Tallas y fit -->
        <div class="lovise-faq-group" data-animate>
            <h2 class="lovise-faq-group__title">Tallas y fit</h2>

            <div class="lovise-accordion">
                <button class="lovise-accordion__trigger">
                    <span>¿Cómo elijo mi talla correcta?</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="lovise-accordion__content">
                    <p>Consulta nuestra <a href="<?php echo esc_url( home_url('/guia-de-tallas/') ); ?>">Guía de Tallas</a> donde encontrarás medidas exactas en centímetros para cintura, cadera y largo. Si tienes dudas, escríbenos por WhatsApp y te asesoramos.</p>
                </div>
            </div>

            <div class="lovise-accordion">
                <button class="lovise-accordion__trigger">
                    <span>¿Las tallas son estándar?</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="lovise-accordion__content">
                    <p>Nuestras tallas van desde la 6 hasta la 16 colombiana. El tallaje LOVISE tiende a ser fiel a la talla; sin embargo, cada modelo puede variar ligeramente por el tipo de corte.</p>
                </div>
            </div>
        </div>

        <!-- Cambios y devoluciones -->
        <div class="lovise-faq-group" data-animate>
            <h2 class="lovise-faq-group__title">Cambios y devoluciones</h2>

            <div class="lovise-accordion">
                <button class="lovise-accordion__trigger">
                    <span>¿Puedo cambiar mi producto?</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="lovise-accordion__content">
                    <p>Sí, tienes 30 días desde la recepción para solicitar un cambio sin costo. El producto debe estar en perfectas condiciones, con etiquetas y sin uso. Escríbenos por WhatsApp para coordinar la recogida.</p>
                </div>
            </div>

            <div class="lovise-accordion">
                <button class="lovise-accordion__trigger">
                    <span>¿Puedo devolver un producto y recibir reembolso?</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="lovise-accordion__content">
                    <p>Sí, aceptamos devoluciones dentro de los primeros 30 días. Una vez recibamos el producto y verifiquemos su estado, procesamos el reembolso en un plazo de 5 a 10 días hábiles al mismo método de pago original.</p>
                </div>
            </div>
        </div>

        <!-- Pagos -->
        <div class="lovise-faq-group" data-animate>
            <h2 class="lovise-faq-group__title">Pagos</h2>

            <div class="lovise-accordion">
                <button class="lovise-accordion__trigger">
                    <span>¿Qué métodos de pago aceptan?</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="lovise-accordion__content">
                    <p>Aceptamos tarjetas de crédito y débito (Visa, Mastercard, American Express), transferencias bancarias PSE, Nequi, Daviplata y pago contra entrega en ciudades seleccionadas.</p>
                </div>
            </div>

            <div class="lovise-accordion">
                <button class="lovise-accordion__trigger">
                    <span>¿Es seguro comprar en LOVISE?</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="lovise-accordion__content">
                    <p>Absolutamente. Nuestro sitio cuenta con certificado SSL y todos los pagos son procesados por pasarelas certificadas con cifrado de extremo a extremo. Nunca almacenamos los datos de tu tarjeta.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="lovise-faq-cta" data-animate>
            <p>¿No encontraste lo que buscabas?</p>
            <a href="<?php echo esc_url( home_url('/contacto/') ); ?>" class="lovise-btn lovise-btn--outline">Escríbenos</a>
        </div>

    </div>
</main>

<?php get_footer(); ?>
