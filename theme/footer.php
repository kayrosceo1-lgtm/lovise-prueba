<!-- Newsletter -->
<section class="lovise-newsletter">
    <div class="lovise-container lovise-newsletter__inner">
        <span class="lovise-newsletter__label">Exclusivo para ti</span>
        <h2 class="lovise-newsletter__title">Únete al universo LOVISE</h2>
        <p class="lovise-newsletter__text">Recibe novedades, ofertas exclusivas y acceso anticipado a nuevas colecciones.</p>
        <form class="lovise-newsletter__form" action="#" method="post">
            <input type="email" name="email" placeholder="Tu correo electrónico" required>
            <button type="submit">Suscribirme</button>
        </form>
        <small class="lovise-newsletter__note">Sin spam. Puedes darte de baja en cualquier momento.</small>
    </div>
</section>

<!-- Footer -->
<footer class="lovise-footer">
    <div class="lovise-container lovise-footer__inner">

        <div class="lovise-footer__col lovise-footer__brand">
            <span class="lovise-logo-text">LOVISE</span>
            <p>Diseñada para mujeres que eligen con intención. Pantalones y jeans con fit perfecto y estética sofisticada.</p>
            <div class="lovise-footer__social">
                <a href="#" aria-label="Instagram"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="5"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" stroke="none"/></svg></a>
                <a href="#" aria-label="TikTok"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1 0-5.78 2.91 2.91 0 0 1 .88.13v-3.5a6.37 6.37 0 0 0-.88-.07 6.33 6.33 0 0 0 0 12.67 6.33 6.33 0 0 0 6.33-6.34V8.55a8.19 8.19 0 0 0 3.77.92V6.02a4.84 4.84 0 0 1 0 .67z"/></svg></a>
                <a href="#" aria-label="Pinterest"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0a12 12 0 0 0-4.37 23.17c-.1-.94-.2-2.4.04-3.44l1.41-5.99s-.36-.72-.36-1.78c0-1.67.97-2.92 2.17-2.92 1.02 0 1.52.77 1.52 1.69 0 1.03-.66 2.57-.99 3.99-.28 1.19.6 2.16 1.77 2.16 2.13 0 3.76-2.24 3.76-5.49 0-2.87-2.06-4.87-5-4.87-3.41 0-5.41 2.56-5.41 5.2 0 1.03.4 2.13.89 2.73.1.12.11.22.08.34l-.33 1.36c-.05.22-.18.27-.41.16-1.54-.71-2.5-2.96-2.5-4.77 0-3.87 2.82-7.43 8.13-7.43 4.27 0 7.59 3.04 7.59 7.11 0 4.24-2.67 7.65-6.39 7.65-1.25 0-2.42-.65-2.82-1.42l-.77 2.93c-.28 1.07-1.03 2.41-1.53 3.23A12 12 0 1 0 12 0z"/></svg></a>
            </div>
        </div>

        <div class="lovise-footer__col">
            <h4>Tienda</h4>
            <ul>
                <li><a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">Toda la colección</a></li>
                <li><a href="#">Skinny Jeans</a></li>
                <li><a href="#">Mom Jeans</a></li>
                <li><a href="#">Levanta Cola</a></li>
                <li><a href="#">Wide Leg</a></li>
                <li><a href="#">Palazzo</a></li>
            </ul>
        </div>

        <div class="lovise-footer__col">
            <h4>Ayuda</h4>
            <ul>
                <li><a href="<?php echo esc_url( home_url('/envios-y-devoluciones/') ); ?>">Envíos y Devoluciones</a></li>
                <li><a href="<?php echo esc_url( home_url('/guia-de-tallas/') ); ?>">Guía de Tallas</a></li>
                <li><a href="<?php echo esc_url( home_url('/preguntas-frecuentes/') ); ?>">Preguntas Frecuentes</a></li>
                <li><a href="<?php echo esc_url( home_url('/contacto/') ); ?>">Contacto</a></li>
            </ul>
        </div>

        <div class="lovise-footer__col">
            <h4>Contacto</h4>
            <ul>
                <li>hola@lovise.co</li>
                <li>WhatsApp: +57 300 000 0000</li>
                <li>Lun - Vie: 9:00 - 18:00</li>
                <li>Sáb: 9:00 - 13:00</li>
            </ul>
        </div>

    </div>
    <div class="lovise-footer__bottom">
        <div class="lovise-container lovise-footer__bottom-inner">
            <p>&copy; <?php echo date('Y'); ?> LOVISE. Todos los derechos reservados.</p>
            <p><a href="#">Términos</a> · <a href="#">Privacidad</a></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
