<?php
/**
 * Template Name: Contacto
 * Template for: page-contacto
 */
get_header(); ?>

<main class="lovise-main">
    <div class="lovise-container">

        <div class="lovise-page-header" data-animate>
            <h1 class="lovise-page-title">Contáctanos</h1>
            <p class="lovise-page-subtitle">Estamos aquí para ayudarte. Escríbenos y te responderemos lo antes posible.</p>
        </div>

        <div class="lovise-contact-grid">

            <!-- Formulario -->
            <div class="lovise-contact-form" data-animate>
                <form action="#" method="post" class="lovise-form">
                    <div class="lovise-form__row lovise-form__row--half">
                        <div class="lovise-form__field">
                            <label for="contact-name">Nombre</label>
                            <input type="text" id="contact-name" name="name" placeholder="Tu nombre completo" required>
                        </div>
                        <div class="lovise-form__field">
                            <label for="contact-email">Correo electrónico</label>
                            <input type="email" id="contact-email" name="email" placeholder="tu@email.com" required>
                        </div>
                    </div>
                    <div class="lovise-form__field">
                        <label for="contact-subject">Asunto</label>
                        <select id="contact-subject" name="subject">
                            <option value="">Selecciona un tema</option>
                            <option value="pedido">Consulta sobre mi pedido</option>
                            <option value="tallas">Asesoría de tallas</option>
                            <option value="cambio">Cambios y devoluciones</option>
                            <option value="mayorista">Ventas al por mayor</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="lovise-form__field">
                        <label for="contact-message">Mensaje</label>
                        <textarea id="contact-message" name="message" rows="5" placeholder="Cuéntanos en qué podemos ayudarte..." required></textarea>
                    </div>
                    <button type="submit" class="lovise-btn lovise-btn--primary" style="width: 100%;">Enviar mensaje</button>
                </form>
            </div>

            <!-- Info de contacto -->
            <div class="lovise-contact-info" data-animate data-delay="1">
                <div class="lovise-contact-card">
                    <div class="lovise-contact-card__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <h3>WhatsApp</h3>
                    <p>Escríbenos directamente para atención rápida y personalizada.</p>
                    <a href="https://wa.me/573000000000" class="lovise-contact-card__link" target="_blank">+57 300 000 0000</a>
                </div>

                <div class="lovise-contact-card">
                    <div class="lovise-contact-card__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    </div>
                    <h3>Correo electrónico</h3>
                    <p>Para consultas que requieran más detalle.</p>
                    <a href="mailto:hola@lovise.co" class="lovise-contact-card__link">hola@lovise.co</a>
                </div>

                <div class="lovise-contact-card">
                    <div class="lovise-contact-card__icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <h3>Horario de atención</h3>
                    <p>Lunes a viernes: 9:00 a.m. — 6:00 p.m.<br>Sábados: 9:00 a.m. — 1:00 p.m.</p>
                </div>
            </div>

        </div>

    </div>
</main>

<?php get_footer(); ?>
