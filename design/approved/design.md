---
status: approved
brand: LOVISE
date: 2026-03-28
version: "1.0.0"
---

# LOVISE — Diseño Completo del E-Commerce

## 1. Arquitectura del Sitio

### Mapa de Navegación Principal

```
LOVISE.com
├── Home (landing e-commerce)
├── Tienda (catálogo general con filtros)
│   ├── Skinny Jeans
│   ├── Mom Jeans
│   ├── Levanta Cola
│   ├── Pantalón Globo
│   ├── Wide Leg
│   ├── Palazzo
│   ├── Nuevas Llegadas
│   └── Lo Más Vendido
├── [Producto Individual]
├── Carrito
├── Checkout
├── Mi Cuenta
│   ├── Iniciar Sesión
│   ├── Registrarse
│   ├── Mis Pedidos
│   ├── Mis Direcciones
│   └── Mis Datos
├── Sobre LOVISE
├── Contacto
├── Blog (SEO + contenido de marca)
├── Preguntas Frecuentes
├── Envíos y Devoluciones
├── Guía de Tallas
└── Políticas
    ├── Términos y Condiciones
    └── Política de Privacidad
```

### Navegación Header
- **Barra superior:** Anuncio promocional (envío gratis, nueva colección)
- **Header principal:** Logo centrado, navegación a los lados, íconos de búsqueda/cuenta/carrito
- **Menú móvil:** Hamburguesa con panel lateral izquierdo

### Navegación Footer
- Columnas: Tienda, Ayuda, Sobre Nosotras, Legal
- Newsletter
- Redes sociales
- Métodos de pago
- Copyright

---

## 2. Sistema Visual

### Paleta de Color

| Token | Valor | Uso |
|-------|-------|-----|
| primary | #42274E | Acciones principales, titulares, botones CTA |
| primary-light | #5A3D66 | Hover de botones, gradientes |
| secondary | #8C6C96 | Enlaces secundarios, detalles |
| accent-soft | #C9B4CC | Acentos suaves, estados inactivos |
| background | #F3E8EE | Fondo principal del sitio |
| background-soft | #FBF7FA | Secciones alternas |
| surface | #FFFFFF | Cards, modales |
| foreground | #3E2B43 | Texto principal |
| foreground-muted | #6B5967 | Texto secundario |
| border-soft | #DCCEDB | Ghost borders en formularios |
| chip | #F4DCEC | Tags, badges |

**Regla "No-Line":** No usar bordes 1px sólidos. Separar secciones mediante cambios sutiles de color de fondo.

### Tipografía

- **Noto Serif** — Titulares, hero, precios, frases de marca
  - Display: 3.5rem / tight tracking / weight 400-700
  - Headlines: 1.375rem–2rem / serif elegante
  - Precios: siempre en serif para sensación "grabada"

- **Manrope** — UI funcional, navegación, body
  - Body: 0.9375rem / line-height 1.7
  - Labels: 0.8125rem / weight 500-600
  - Buttons: 0.875rem / weight 600 / uppercase para CTAs

### Espaciado
- Generoso por defecto. Si parece terminado, agregar 20% más padding.
- Gutter móvil: 1.25rem
- Gutter desktop: 2.5rem mínimo
- Entre secciones: 4rem–6rem
- Dentro de cards: 1.5rem–2rem

### Botones

**Primario:**
- Fondo: gradiente de #42274E a #5A3D66
- Texto: blanco
- Border-radius: 0.25rem (sharp, tailored)
- Padding: 0.875rem 2rem
- Font: Manrope 600, 0.875rem
- Hover: elevar ligeramente la sombra ambient

**Secundario:**
- Fondo: transparente
- Borde: 1.5px solid #42274E
- Texto: #42274E
- Hover: fondo #42274E, texto blanco

**Terciario:**
- Solo texto subrayado en Noto Serif
- Color: #42274E
- Hover: opacidad 60%

### Cards de Producto
- Fondo: #FFFFFF sobre fondo #F3E8EE o #FBF7FA
- Sin bordes — separación por contraste tonal
- Sombra ambient: `0px 8px 24px rgba(66, 39, 78, 0.04)` al hover
- Imagen: aspect-ratio 3:4 (vertical, protagonismo del fit)
- Badge posición: esquina superior izquierda
- Info: nombre (Manrope 600), precio (Noto Serif), colores disponibles

### Badges
- **Nuevo:** fondo #F4DCEC, texto #42274E
- **Top ventas:** fondo #42274E, texto blanco
- **Últimas unidades:** fondo #FFDAD6, texto #BA1A1A
- Border-radius: 0.25rem
- Font: Manrope 600, 0.6875rem, uppercase, letter-spacing 0.06em

### Formularios
- Ghost borders: #DCCEDB al 20% opacidad
- Label: Manrope 500, #42274E
- Input height: 3rem
- Border-radius: 0.25rem
- Focus: borde #42274E
- Error: fondo wash #FFDAD6, sin borde rojo agresivo

### Iconografía
- Estilo: línea fina (stroke 1.5px)
- Color: #42274E o #6B5967
- Tamaño header: 20px
- Set mínimo: búsqueda, usuario, carrito, corazón, menú, cerrar, filtro, chevron, check, envío, devolución, seguridad

### Microinteracciones
- Hover en cards: elevación suave con sombra ambient
- Hover en botones: transición 200ms ease
- Hover en imágenes de producto: escala sutil 1.03 con overflow hidden
- Transiciones de página: fade 150ms
- Menú móvil: slide desde izquierda 250ms ease-out

### Estilo Fotográfico
- Moda femenina contemporánea
- Iluminación natural/suave, nunca flash directo
- Fondos neutros: blanco, beige, gris claro, rosa empolvado
- Protagonismo del fit, silueta y caída del pantalón
- Composición editorial, no catálogo genérico
- Overlay de `surface_tint` al 5% opacidad para unificar con la marca
- Evitar: saturación alta, looks agresivos, fondos ruidosos

---

## 3. Páginas del E-Commerce

### A. HOME

**Estructura de secciones (top to bottom):**

1. **Barra de anuncio** — fondo #42274E, texto blanco, Manrope 0.75rem
   - "Envío gratis en pedidos superiores a $150.000 · Cambios sin costo"

2. **Header** — fondo transparente sobre hero / sticky con blur
   - Logo LOVISE centrado (Noto Serif, tracking amplio)
   - Nav izquierda: Tienda, Colecciones, Nuevas Llegadas
   - Nav derecha: Sobre Nosotras, íconos (búsqueda, cuenta, carrito)

3. **Hero principal** — ancho completo, imagen editorial
   - Imagen: modelo con pantalón protagonista, composición asimétrica
   - Overlay: título en Noto Serif display-lg
   - Copy: "Encuentra tu silueta perfecta"
   - CTA: "Explorar colección" (botón primario)

4. **Colecciones destacadas** — grid 2x2 o 3 columnas
   - Cards grandes con imagen + nombre de colección
   - Skinny · Mom Jeans · Levanta Cola · Wide Leg
   - Hover: overlay suave con nombre y CTA

5. **Productos destacados** — grid 4 columnas desktop
   - 8 productos con card estándar
   - Título de sección: "Selección de la semana" (Noto Serif)
   - CTA final: "Ver toda la tienda"

6. **Banner de marca** — fondo #F3E8EE, layout asimétrico
   - Imagen editorial grande a un lado
   - Texto: historia corta de marca
   - "Diseñada para mujeres que eligen con intención"
   - CTA: "Conoce LOVISE"

7. **Nuevas llegadas** — slider horizontal con cards
   - Título: "Recién llegadas" (Noto Serif)
   - Cards de producto con badge "Nuevo"

8. **Beneficios de compra** — 4 columnas con íconos
   - Envío gratis desde $150.000
   - Cambios sin costo
   - Pago seguro
   - Atención personalizada

9. **Testimonios** — diseño editorial con citas
   - 2-3 testimonios con foto, nombre, producto comprado
   - Tipografía Noto Serif italic para la cita

10. **Newsletter** — fondo #42274E, texto blanco
    - "Únete al universo LOVISE"
    - Input email + botón "Suscribirme"
    - Nota: "Recibe novedades, ofertas exclusivas y acceso anticipado"

11. **Footer completo**

### B. TIENDA / CATÁLOGO GENERAL

- **Breadcrumbs:** Home > Tienda
- **Título:** "Nuestra colección" (Noto Serif headline-lg)
- **Barra de filtros superior:**
  - Categoría, Talla, Color, Precio, Ordenar por
  - Chips activos para filtros seleccionados
  - Contador de resultados
- **Grid de productos:** 3-4 columnas desktop, 2 móvil
- **Paginación o carga infinita**
- **Sin sidebar en desktop** — filtros superiores para máximo aire visual

### C. CATEGORÍA / COLECCIÓN

- **Hero de colección:** imagen banner + título + descripción corta
  - Ejemplo: "Mom Jeans — La silueta relajada que nunca pasa de moda"
- **Filtros:** talla, color, precio, ordenar
- **Grid de productos** con cards estándar
- **Cross-selling:** "También te puede gustar" al final

### D. PRODUCTO INDIVIDUAL

**Layout de producto (desktop: 2 columnas, móvil: stack):**

**Columna izquierda — Galería:**
- Imagen principal grande (aspect-ratio 3:4)
- Thumbnails verticales o grid de imágenes
- Zoom al hover
- Mínimo 4 fotos: frente, espalda, detalle, modelo completa

**Columna derecha — Info:**
- Breadcrumbs
- Nombre del producto (Noto Serif headline-md)
- Precio (Noto Serif, tamaño prominente)
- Precio tachado si hay descuento + badge de porcentaje
- Descripción corta (2-3 líneas)
- **Selector de talla** con link a guía de tallas
- **Selector de color** con swatches circulares
- **Botón Agregar al carrito** (primario, ancho completo)
- **Botón Wishlist** (ícono corazón)
- Beneficios rápidos con íconos:
  - ✓ Envío gratis desde $150.000
  - ✓ Cambios sin costo en 30 días
  - ✓ Pago 100% seguro

**Debajo del fold:**
- **Tabs o acordeones:**
  - Descripción completa
  - Detalles y composición
  - Guía de tallas (tabla integrada)
  - Envíos y devoluciones
- **Productos relacionados** — grid 4 columnas
- **Reseñas** — estrellas + comentarios

### E. CARRITO

- **Título:** "Tu selección" (Noto Serif)
- **Lista de productos:**
  - Imagen thumbnail
  - Nombre + talla + color
  - Precio unitario (Noto Serif)
  - Selector de cantidad
  - Botón eliminar (ícono sutil)
- **Resumen lateral (desktop) / inferior (móvil):**
  - Subtotal
  - Envío (estimado o gratis)
  - Código de descuento (input colapsable)
  - Total
  - CTA: "Finalizar compra" (botón primario grande)
  - Enlace: "Seguir comprando"
- **Fondo:** #FBF7FA con cards en #FFFFFF

### F. CHECKOUT

- **Layout 2 columnas:** formulario + resumen
- **Diseño limpio, sin distracciones** — header simplificado (solo logo)
- **Pasos claros:**
  1. Información de contacto
  2. Dirección de envío
  3. Método de envío
  4. Método de pago
- **Resumen de pedido** visible en todo momento
- **Sellos de confianza:** pago seguro, cifrado SSL
- **CTA final:** "Confirmar pedido" (botón primario prominente)
- **Fondo:** #FBF7FA

### G. MI CUENTA

**Login / Registro:**
- Layout centrado, ancho máximo 480px
- Fondo #FBF7FA
- Dos tabs: Iniciar Sesión / Crear Cuenta
- Formularios limpios con ghost borders
- "¿Olvidaste tu contraseña?" link sutil

**Dashboard de cuenta:**
- Sidebar izquierda con navegación:
  - Mi panel
  - Mis pedidos
  - Mis direcciones
  - Datos personales
  - Cerrar sesión
- Contenido a la derecha
- Tabla de pedidos limpia
- Cards de direcciones editables

### H. PÁGINAS INFORMATIVAS

**Sobre LOVISE:**
- Hero con imagen de marca
- Historia de la marca (tono cercano y elegante)
- Valores: calidad, fit, feminidad, intención
- Galería de imágenes de marca
- CTA: "Explorar la colección"

**Contacto:**
- Formulario: nombre, email, asunto, mensaje
- Info de contacto: email, WhatsApp, horario
- Mapa opcional

**FAQ:**
- Acordeones agrupados por categoría:
  - Pedidos y envíos
  - Tallas y fit
  - Cambios y devoluciones
  - Pagos

**Envíos y Devoluciones / Políticas:**
- Contenido largo con buena tipografía
- Headings claros
- Ancho de lectura: 800px máximo

---

## 4. Header y Footer Globales

### Header

**Barra superior (announcement bar):**
- Fondo: #42274E
- Texto: blanco, Manrope 0.75rem
- Contenido rotativo o estático
- Cerrable con ícono X

**Header principal:**
- Fondo: #FBF7FA o transparente sobre hero
- Sticky al scroll con backdrop-blur
- **Desktop:**
  - Nav izquierda: Tienda, Colecciones, Nuevas Llegadas
  - Logo centrado: "LOVISE" en Noto Serif, letter-spacing 0.15em
  - Nav derecha: Sobre Nosotras + íconos (búsqueda, cuenta, carrito con contador)
- **Móvil:**
  - Hamburguesa izquierda
  - Logo centrado
  - Íconos derecha (carrito)
  - Panel lateral con menú completo + cuenta + búsqueda

### Footer

**Fondo:** #42274E, texto blanco/lila claro

**Columnas (desktop 4, móvil acordeón):**

1. **LOVISE** — logo + tagline + redes sociales (Instagram, Pinterest, TikTok)
2. **Tienda** — Skinny Jeans, Mom Jeans, Levanta Cola, Wide Leg, Nuevas Llegadas, Lo Más Vendido
3. **Ayuda** — Envíos, Cambios, Guía de Tallas, FAQ, Contacto
4. **Legal** — Términos, Privacidad, Cookies

**Inferior:**
- Métodos de pago (íconos)
- © 2026 LOVISE. Todos los derechos reservados.

---

## 5. Componentes Reutilizables

### Product Card
- Imagen 3:4 con hover zoom
- Badge opcional (esquina superior izquierda)
- Nombre: Manrope 600
- Precio: Noto Serif
- Colores disponibles: swatches circulares pequeños
- Hover: sombra ambient + escala imagen

### Category Card
- Imagen de fondo con overlay gradiente suave
- Nombre de colección: Noto Serif headline-sm, blanco
- CTA sutil: "Explorar →"

### Banner Section
- Layout asimétrico: imagen + contenido
- Versiones: imagen izquierda/derecha
- Fondo: #F3E8EE o #FBF7FA

### Benefits Bar
- 4 columnas desktop, 2x2 móvil
- Ícono + título + descripción corta
- Ícono en #42274E, fondo #FBF7FA

### Newsletter Block
- Fondo #42274E
- Título en Noto Serif blanco
- Subtítulo en Manrope, lila claro
- Input email + botón

### Breadcrumbs
- Manrope label-sm
- Color: #6B5967
- Separador: "/"
- Último item: #3E2B43

### Testimonial Card
- Cita en Noto Serif italic
- Nombre: Manrope 600
- Producto: link sutil
- Rating: estrellas en #42274E

### Size Guide Table
- Tabla limpia sin bordes pesados
- Rows alternadas: #FBF7FA / #FFFFFF
- Header: fondo #42274E, texto blanco

### Accordion
- Para FAQ y detalles de producto
- Sin bordes — separación por fondo
- Ícono chevron animado
- Contenido: padding generoso

---

## 6. Tono y Copys de Muestra

### Titulares
- "Encuentra tu silueta perfecta"
- "Diseñada para mujeres que eligen con intención"
- "La nueva colección ya está aquí"
- "Tu estilo, tu silueta"
- "Calidad que se siente, fit que se nota"

### Botones
- "Explorar colección"
- "Agregar al carrito"
- "Finalizar compra"
- "Suscribirme"
- "Ver toda la tienda"
- "Conoce LOVISE"

### Descripciones de producto (ejemplo)
> Pantalón Mom Jean de tiro alto con cintura ceñida y pierna relajada. Confeccionado en denim premium con la cantidad justa de stretch para acompañar tu movimiento sin perder la forma. Costuras reforzadas, botón personalizado LOVISE y un fit que favorece todas las siluetas.

### Newsletter
- Título: "Únete al universo LOVISE"
- Sub: "Recibe novedades, ofertas exclusivas y acceso anticipado a nuevas colecciones."

### Beneficios
- "Envío gratis en pedidos desde $150.000"
- "Cambios sin costo en los primeros 30 días"
- "Pago 100% seguro con cifrado SSL"
- "Atención personalizada por WhatsApp"

### 404
- "Parece que esta página se fue de compras"
- CTA: "Volver al inicio"

---

## 7. Responsive

### Breakpoints
- Móvil: < 768px
- Tablet: 768px–1024px
- Desktop: > 1024px

### Adaptaciones clave
- **Header:** hamburguesa + logo + carrito en móvil
- **Grids:** 4 → 2 columnas en producto, 3 → 1 en categorías
- **Hero:** imagen full-width, texto centrado debajo
- **Filtros:** colapsables en drawer lateral en móvil
- **Producto:** galería arriba, info abajo
- **Footer:** columnas collapsan a acordeones
- **Carrito:** resumen debajo de la lista de productos
- **Checkout:** single column en móvil

---

## 8. Mapeo WordPress / WooCommerce

### Templates WordPress
| Template | Archivo | Uso |
|----------|---------|-----|
| Front Page | `home.html` | Landing e-commerce |
| Shop Archive | `archive-product.html` | Catálogo general WooCommerce |
| Product Category | `taxonomy-product_cat.html` | Página de colección |
| Single Product | `single-product.html` | Ficha de producto |
| Cart | `page-cart.html` | Página de carrito |
| Checkout | `page-checkout.html` | Página de checkout |
| My Account | `page-my-account.html` | Cuenta del usuario |
| Page | `page.html` | Páginas informativas genéricas |
| Single Post | `single.html` | Entrada de blog |
| Archive | `archive.html` | Listado de blog |
| 404 | `404.html` | Página no encontrada |
| Index | `index.html` | Fallback |

### Template Parts
| Part | Archivo | Área |
|------|---------|------|
| Header | `header.html` | header |
| Footer | `footer.html` | footer |
| Sidebar Shop | `sidebar-shop.html` | uncategorized |
| Mini Cart | `mini-cart.html` | uncategorized |

### Patterns (bloques reutilizables)
| Pattern | Archivo | Uso |
|---------|---------|-----|
| Hero Home | `hero-home.php` | Hero principal del home |
| Collections Grid | `collections-grid.php` | Grid de colecciones |
| Featured Products | `featured-products.php` | Productos destacados |
| Brand Banner | `brand-banner.php` | Banner de marca |
| Benefits Bar | `benefits-bar.php` | Barra de beneficios |
| Newsletter | `newsletter.php` | Bloque de newsletter |
| Testimonials | `testimonials.php` | Sección de testimonios |
| Announcement Bar | `announcement-bar.php` | Barra de anuncio superior |
| Product Card | `product-card.php` | Card individual de producto |
| Category Card | `category-card.php` | Card de categoría |
| New Arrivals | `new-arrivals.php` | Sección nuevas llegadas |
| About Hero | `about-hero.php` | Hero para página Sobre Nosotras |
| Contact Form | `contact-form.php` | Formulario de contacto |
| FAQ Section | `faq-section.php` | Acordeones de preguntas frecuentes |
| Size Guide | `size-guide.php` | Tabla de guía de tallas |

### Plugins Recomendados (máximo 15)
1. WooCommerce (obligatorio)
2. WooCommerce Payments o Mercado Pago
3. Contact Form 7 o WPForms Lite
4. Yoast SEO
5. WP Mail SMTP
6. WooCommerce Product Filter (AJAX)
7. YITH WooCommerce Wishlist
8. Smash Balloon Social (si se necesita feed)
9. UpdraftPlus (backups)
10. Wordfence (seguridad)

---

## 9. Dirección Fotográfica

### Estilo principal
- Iluminación: natural suave o estudio con softbox
- Fondos: neutros (blanco, beige, gris claro, rosa empolvado)
- Modelo: poses naturales, no forzadas
- Foco: fit, silueta, caída del pantalón
- Composición: editorial, no catálogo

### Tomas requeridas por producto
1. Modelo de frente, cuerpo completo
2. Modelo de espalda (protagonismo del fit trasero)
3. Detalle: textura, costuras, botón LOVISE
4. Modelo en movimiento o pose lifestyle

### Post-producción
- Tono cálido suave
- Ligeramente desaturado
- Overlay tint sutil (#42274E al 3-5%) para coherencia
- Contraste medio-bajo
- Blancos limpios pero no clínicos
