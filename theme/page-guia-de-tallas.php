<?php
/**
 * Template for: page-guia-de-tallas
 */
get_header(); ?>

<main class="lovise-main">
    <div class="lovise-container" style="max-width: 800px;">

        <div class="lovise-page-header" data-animate>
            <h1 class="lovise-page-title">Guía de tallas</h1>
            <p class="lovise-page-subtitle">Encuentra tu talla perfecta. Todas las medidas están en centímetros.</p>
        </div>

        <!-- Cómo medirse -->
        <div class="lovise-size-how" data-animate>
            <h2>¿Cómo tomar tus medidas?</h2>
            <div class="lovise-size-steps">
                <div class="lovise-size-step">
                    <span class="lovise-size-step__num">1</span>
                    <div>
                        <strong>Cintura</strong>
                        <p>Mide la parte más estrecha de tu torso, generalmente a la altura del ombligo. No aprietes la cinta.</p>
                    </div>
                </div>
                <div class="lovise-size-step">
                    <span class="lovise-size-step__num">2</span>
                    <div>
                        <strong>Cadera</strong>
                        <p>Mide la parte más ancha de tu cadera, pasando por el punto más prominente del glúteo.</p>
                    </div>
                </div>
                <div class="lovise-size-step">
                    <span class="lovise-size-step__num">3</span>
                    <div>
                        <strong>Largo</strong>
                        <p>Mide desde la cintura hasta el tobillo por la parte interna de la pierna.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de tallas -->
        <div class="lovise-size-table-wrap" data-animate>
            <h2>Tabla de tallas LOVISE</h2>
            <div class="lovise-size-table-scroll">
                <table class="lovise-size-table">
                    <thead>
                        <tr>
                            <th>Talla CO</th>
                            <th>Talla US</th>
                            <th>Cintura (cm)</th>
                            <th>Cadera (cm)</th>
                            <th>Largo (cm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>6</td><td>2</td><td>62 – 65</td><td>88 – 91</td><td>76</td></tr>
                        <tr><td>8</td><td>4</td><td>66 – 69</td><td>92 – 95</td><td>77</td></tr>
                        <tr><td>10</td><td>6</td><td>70 – 73</td><td>96 – 99</td><td>78</td></tr>
                        <tr><td>12</td><td>8</td><td>74 – 77</td><td>100 – 103</td><td>79</td></tr>
                        <tr><td>14</td><td>10</td><td>78 – 81</td><td>104 – 107</td><td>80</td></tr>
                        <tr><td>16</td><td>12</td><td>82 – 85</td><td>108 – 111</td><td>81</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tips -->
        <div class="lovise-size-tips" data-animate>
            <h2>Consejos por modelo</h2>
            <div class="lovise-size-tip">
                <strong>Skinny Jeans</strong>
                <p>Ajuste ceñido. Si estás entre dos tallas, te recomendamos la más grande para mayor comodidad. El denim cede un poco con el uso.</p>
            </div>
            <div class="lovise-size-tip">
                <strong>Mom Jeans</strong>
                <p>Corte relajado con tiro alto. Generalmente puedes usar tu talla habitual. El fit está diseñado para ser cómodo sin quedar suelto.</p>
            </div>
            <div class="lovise-size-tip">
                <strong>Levanta Cola</strong>
                <p>Ajuste moldeador. Recomendamos tu talla exacta — el denim tiene stretch y se adapta a tu cuerpo para realzar la silueta.</p>
            </div>
            <div class="lovise-size-tip">
                <strong>Wide Leg / Palazzo</strong>
                <p>Corte amplio desde la cadera. La cintura es la medida clave — si tu cintura está entre tallas, elige la menor.</p>
            </div>
        </div>

        <!-- CTA -->
        <div class="lovise-faq-cta" data-animate>
            <p>¿Sigues con dudas sobre tu talla?</p>
            <a href="https://wa.me/573000000000" class="lovise-btn lovise-btn--primary" target="_blank">Asesoría por WhatsApp</a>
        </div>

    </div>
</main>

<?php get_footer(); ?>
