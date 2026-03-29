<?php
/**
 * Template for: page-envios-y-devoluciones
 */
get_header(); ?>

<main class="lovise-main">
    <div class="lovise-container" style="max-width: 800px;">

        <div class="lovise-page-header" data-animate>
            <h1 class="lovise-page-title">Envíos y devoluciones</h1>
            <p class="lovise-page-subtitle">Todo lo que necesitas saber sobre cómo recibir y devolver tu pedido.</p>
        </div>

        <div class="lovise-page-content lovise-policy-content" data-animate>

            <h2>Envíos</h2>

            <h3>Cobertura</h3>
            <p>Realizamos envíos a todo el territorio colombiano a través de transportadoras certificadas.</p>

            <h3>Tiempos de entrega</h3>
            <ul>
                <li><strong>Principales ciudades</strong> (Bogotá, Medellín, Cali, Barranquilla, Bucaramanga): 2 a 4 días hábiles</li>
                <li><strong>Ciudades intermedias:</strong> 3 a 5 días hábiles</li>
                <li><strong>Municipios y zonas rurales:</strong> 5 a 8 días hábiles</li>
            </ul>

            <h3>Costos de envío</h3>
            <ul>
                <li><strong>Gratis</strong> en pedidos superiores a $150.000 COP</li>
                <li>Para pedidos de menor valor, el costo se calcula automáticamente según tu ubicación al momento del checkout</li>
            </ul>

            <h3>Seguimiento</h3>
            <p>Una vez despachado tu pedido, recibirás un correo electrónico con el número de guía y enlace de seguimiento. También puedes consultar el estado desde la sección "Mis pedidos" en tu cuenta.</p>

            <hr>

            <h2>Cambios</h2>

            <p>Queremos que quedes 100% satisfecha con tu compra. Si necesitas cambiar tu producto:</p>
            <ul>
                <li>Tienes <strong>30 días desde la recepción</strong> para solicitar un cambio</li>
                <li>El producto debe estar en perfectas condiciones: sin uso, con etiquetas originales</li>
                <li>El envío de cambio <strong>no tiene costo</strong> — nosotros coordinamos la recogida</li>
                <li>Puedes cambiar por otra talla, color o modelo</li>
            </ul>

            <h3>¿Cómo solicitar un cambio?</h3>
            <ol>
                <li>Escríbenos por WhatsApp al <strong>+57 300 000 0000</strong> o por correo a <strong>hola@lovise.co</strong></li>
                <li>Indícanos tu número de pedido y el motivo del cambio</li>
                <li>Coordinamos la recogida del producto en tu dirección</li>
                <li>Una vez recibido, enviamos el nuevo producto en 2 a 4 días hábiles</li>
            </ol>

            <hr>

            <h2>Devoluciones y reembolsos</h2>

            <p>Si prefieres una devolución con reembolso en lugar de un cambio:</p>
            <ul>
                <li>Tienes <strong>30 días desde la recepción</strong> para solicitar la devolución</li>
                <li>El producto debe cumplir las mismas condiciones que para cambios</li>
                <li>El reembolso se procesa en <strong>5 a 10 días hábiles</strong> al método de pago original</li>
            </ul>

            <h3>Excepciones</h3>
            <p>No se aceptan cambios ni devoluciones en los siguientes casos:</p>
            <ul>
                <li>Productos con señales de uso, lavado o alteraciones</li>
                <li>Productos sin etiquetas originales</li>
                <li>Solicitudes fuera del plazo de 30 días</li>
            </ul>

        </div>

        <div class="lovise-faq-cta" data-animate>
            <p>¿Necesitas ayuda con un cambio o devolución?</p>
            <a href="<?php echo esc_url( home_url('/contacto/') ); ?>" class="lovise-btn lovise-btn--outline">Contáctanos</a>
        </div>

    </div>
</main>

<?php get_footer(); ?>
