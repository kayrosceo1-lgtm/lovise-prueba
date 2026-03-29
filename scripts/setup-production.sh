#!/bin/bash
# ============================================================================
# LOVISE — Script de Setup para Producción
# ============================================================================
# Este script configura un WordPress limpio con todo lo necesario para LOVISE:
# WooCommerce, páginas, productos, categorías, menú, imágenes y configuración.
#
# REQUISITOS:
#   - WordPress instalado y funcionando
#   - WP-CLI disponible (viene incluido en la imagen oficial de WordPress)
#   - Ejecutar como root dentro del contenedor: bash setup-production.sh
#
# IDEMPOTENTE: Se puede ejecutar múltiples veces sin duplicar contenido.
# ============================================================================

set -e

# Colores para output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

log() { echo -e "${GREEN}[LOVISE]${NC} $1"; }
warn() { echo -e "${YELLOW}[LOVISE]${NC} $1"; }

# Auto-detectar directorio de WordPress
WP_DIR=""
for dir in /var/www/html /code /var/www /app; do
    if [ -f "$dir/wp-config.php" ]; then
        WP_DIR="$dir"
        break
    fi
done

if [ -z "$WP_DIR" ]; then
    # Buscar en todo el sistema como último recurso
    WP_DIR=$(find / -name "wp-config.php" -maxdepth 4 2>/dev/null | head -1 | xargs dirname 2>/dev/null)
fi

if [ -z "$WP_DIR" ]; then
    echo "ERROR: No se encontró wp-config.php. Ejecuta este script dentro del contenedor WordPress."
    exit 1
fi

log "WordPress encontrado en: $WP_DIR"
cd "$WP_DIR"

# ============================================================================
# 1. INSTALAR Y CONFIGURAR WOOCOMMERCE
# ============================================================================
log "Instalando WooCommerce..."
wp plugin install woocommerce --activate --allow-root 2>/dev/null || wp plugin activate woocommerce --allow-root 2>/dev/null
log "WooCommerce instalado y activado."

# ============================================================================
# 2. IDIOMA Y ZONA HORARIA
# ============================================================================
log "Configurando idioma y zona horaria..."
wp language core install es_CO --allow-root 2>/dev/null || true
wp site switch-language es_CO --allow-root 2>/dev/null || true
wp language plugin install woocommerce es_CO --allow-root 2>/dev/null || true
wp option update timezone_string "America/Bogota" --allow-root
wp option update date_format "j \\d\\e F \\d\\e Y" --allow-root
wp option update time_format "g:i a" --allow-root
log "Idioma: es_CO, zona: America/Bogota"

# ============================================================================
# 3. CONFIGURACIÓN DEL SITIO
# ============================================================================
log "Configurando sitio..."
wp option update blogname "LOVISE" --allow-root
wp option update blogdescription "Encuentra tu silueta perfecta" --allow-root

# Permalinks bonitos
wp rewrite structure '/%postname%/' --allow-root

# Desactivar coming soon de WooCommerce
wp option update woocommerce_coming_soon "no" --allow-root 2>/dev/null || true
wp option delete woocommerce_coming_soon --allow-root 2>/dev/null || true

log "Sitio configurado: LOVISE"

# ============================================================================
# 4. CONFIGURACIÓN DE WOOCOMMERCE
# ============================================================================
log "Configurando WooCommerce (moneda, país, formatos)..."
wp option update woocommerce_currency "COP" --allow-root
wp option update woocommerce_default_country "CO" --allow-root
wp option update woocommerce_currency_pos "left_space" --allow-root
wp option update woocommerce_price_thousand_sep "." --allow-root
wp option update woocommerce_price_decimal_sep "," --allow-root
wp option update woocommerce_price_num_decimals "0" --allow-root
wp option update woocommerce_weight_unit "kg" --allow-root
wp option update woocommerce_dimension_unit "cm" --allow-root

# Permalinks de WooCommerce en español
wp option update woocommerce_permalinks '{"product_base":"producto","category_base":"coleccion","tag_base":"etiqueta","attribute_base":"","use_verbose_page_rules":false}' --format=json --allow-root

log "WooCommerce: COP, Colombia, permalinks en español"

# ============================================================================
# 5. CREAR PÁGINAS
# ============================================================================
log "Creando páginas..."

create_page() {
    local TITLE="$1"
    local SLUG="$2"
    # Verificar si ya existe
    local EXISTS=$(wp post list --post_type=page --name="$SLUG" --format=count --allow-root)
    if [ "$EXISTS" -gt 0 ]; then
        warn "  Página '$TITLE' ya existe, saltando."
        wp post list --post_type=page --name="$SLUG" --field=ID --allow-root
        return
    fi
    wp post create --post_type=page --post_title="$TITLE" --post_name="$SLUG" --post_status=publish --porcelain --allow-root
}

PAGE_INICIO=$(create_page "Inicio" "inicio")
PAGE_TIENDA=$(create_page "Tienda" "tienda")
PAGE_CART=$(create_page "Carrito" "cart")
PAGE_CHECKOUT=$(create_page "Checkout" "checkout")
PAGE_ACCOUNT=$(create_page "Mi cuenta" "my-account")
PAGE_ABOUT=$(create_page "Sobre LOVISE" "sobre-lovise")
PAGE_CONTACT=$(create_page "Contacto" "contacto")
PAGE_FAQ=$(create_page "Preguntas Frecuentes" "preguntas-frecuentes")
PAGE_SIZES=$(create_page "Guía de Tallas" "guia-de-tallas")
PAGE_SHIPPING=$(create_page "Envíos y Devoluciones" "envios-y-devoluciones")

# Configurar páginas de WooCommerce
log "Asignando páginas a WooCommerce..."
wp option update woocommerce_shop_page_id "$PAGE_TIENDA" --allow-root
wp option update woocommerce_cart_page_id "$PAGE_CART" --allow-root
wp option update woocommerce_checkout_page_id "$PAGE_CHECKOUT" --allow-root
wp option update woocommerce_myaccount_page_id "$PAGE_ACCOUNT" --allow-root

# Front page estática
wp option update show_on_front "page" --allow-root
wp option update page_on_front "$PAGE_INICIO" --allow-root

log "Páginas creadas y asignadas."

# ============================================================================
# 6. CREAR CATEGORÍAS DE PRODUCTO
# ============================================================================
log "Creando categorías de producto..."

create_category() {
    local NAME="$1"
    local SLUG="$2"
    local DESC="$3"
    local EXISTS=$(wp term list product_cat --slug="$SLUG" --format=count --allow-root)
    if [ "$EXISTS" -gt 0 ]; then
        warn "  Categoría '$NAME' ya existe."
        wp term list product_cat --slug="$SLUG" --field=term_id --allow-root
        return
    fi
    wp term create product_cat "$NAME" --slug="$SLUG" --description="$DESC" --porcelain --allow-root
}

CAT_SKINNY=$(create_category "Skinny Jeans" "skinny-jeans" "La silueta ceñida que estiliza.")
CAT_MOM=$(create_category "Mom Jeans" "mom-jeans" "Comodidad relajada con tiro alto.")
CAT_LEVANTA=$(create_category "Levanta Cola" "levanta-cola" "Realza tu silueta naturalmente.")
CAT_WIDE=$(create_category "Wide Leg" "wide-leg" "Pierna amplia con caída elegante.")
CAT_PALAZZO=$(create_category "Palazzo" "palazzo" "Fluidez y movimiento en cada paso.")

log "Categorías creadas: Skinny, Mom, Levanta Cola, Wide Leg, Palazzo"

# ============================================================================
# 7. DESCARGAR IMÁGENES
# ============================================================================
log "Descargando imágenes para productos y colecciones..."

UPLOADS_DIR="$WP_DIR/wp-content/uploads/lovise"
mkdir -p "$UPLOADS_DIR"

download_image() {
    local URL="$1"
    local FILENAME="$2"
    if [ -f "$UPLOADS_DIR/$FILENAME" ]; then
        warn "  $FILENAME ya existe, saltando."
        return
    fi
    curl -sL "$URL" -o "$UPLOADS_DIR/$FILENAME" 2>/dev/null
    if [ -f "$UPLOADS_DIR/$FILENAME" ] && [ -s "$UPLOADS_DIR/$FILENAME" ]; then
        log "  Descargada: $FILENAME"
    else
        warn "  ERROR descargando $FILENAME — se usará placeholder"
        rm -f "$UPLOADS_DIR/$FILENAME"
    fi
}

# Hero e imágenes de marca
download_image "https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=1600" "hero-main.jpg"
download_image "https://images.pexels.com/photos/2220316/pexels-photo-2220316.jpeg?auto=compress&cs=tinysrgb&w=1200" "brand.jpg"

# Colecciones
download_image "https://images.pexels.com/photos/1926769/pexels-photo-1926769.jpeg?auto=compress&cs=tinysrgb&w=800" "col-skinny.jpg"
download_image "https://images.pexels.com/photos/2220316/pexels-photo-2220316.jpeg?auto=compress&cs=tinysrgb&w=800" "col-mom.jpg"
download_image "https://images.pexels.com/photos/2983464/pexels-photo-2983464.jpeg?auto=compress&cs=tinysrgb&w=800" "col-levanta.jpg"
download_image "https://images.pexels.com/photos/2220326/pexels-photo-2220326.jpeg?auto=compress&cs=tinysrgb&w=800" "col-wide.jpg"
download_image "https://images.pexels.com/photos/2887766/pexels-photo-2887766.jpeg?auto=compress&cs=tinysrgb&w=800" "col-palazzo.jpg"

# Productos (8 imágenes diferentes)
download_image "https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=600" "product-skinny-noir.jpg"
download_image "https://images.pexels.com/photos/2220316/pexels-photo-2220316.jpeg?auto=compress&cs=tinysrgb&w=600" "product-skinny-pushup.jpg"
download_image "https://images.pexels.com/photos/2983464/pexels-photo-2983464.jpeg?auto=compress&cs=tinysrgb&w=600" "product-mom-clasico.jpg"
download_image "https://images.pexels.com/photos/1926769/pexels-photo-1926769.jpeg?auto=compress&cs=tinysrgb&w=600" "product-mom-vintage.jpg"
download_image "https://images.pexels.com/photos/2887766/pexels-photo-2887766.jpeg?auto=compress&cs=tinysrgb&w=600" "product-levanta-premium.jpg"
download_image "https://images.pexels.com/photos/2220326/pexels-photo-2220326.jpeg?auto=compress&cs=tinysrgb&w=600" "product-levanta-clasico.jpg"
download_image "https://images.pexels.com/photos/2681751/pexels-photo-2681751.jpeg?auto=compress&cs=tinysrgb&w=600" "product-wide-leg.jpg"
download_image "https://images.pexels.com/photos/3622614/pexels-photo-3622614.jpeg?auto=compress&cs=tinysrgb&w=600" "product-palazzo.jpg"

# Asegurar permisos
chown -R www-data:www-data "$UPLOADS_DIR" 2>/dev/null || true

log "Imágenes descargadas."

# ============================================================================
# 8. FUNCIÓN PARA CREAR ATTACHMENT DE IMAGEN
# ============================================================================
import_image() {
    local IMAGE_PATH="$1"
    local TITLE="$2"

    if [ ! -f "$IMAGE_PATH" ]; then
        warn "  Imagen no encontrada: $IMAGE_PATH"
        echo "0"
        return
    fi

    # Check if already imported
    local FILENAME=$(basename "$IMAGE_PATH")
    local EXISTING=$(wp post list --post_type=attachment --meta_key=_wp_attached_file --meta_value="lovise/$FILENAME" --format=count --allow-root 2>/dev/null || echo "0")
    if [ "$EXISTING" -gt 0 ]; then
        wp post list --post_type=attachment --meta_key=_wp_attached_file --meta_value="lovise/$FILENAME" --field=ID --allow-root 2>/dev/null | head -1
        return
    fi

    wp media import "$IMAGE_PATH" --title="$TITLE" --porcelain --allow-root 2>/dev/null || echo "0"
}

# ============================================================================
# 9. CREAR PRODUCTOS
# ============================================================================
log "Creando productos..."

create_product() {
    local TITLE="$1"
    local SLUG="$2"
    local PRICE="$3"
    local CAT_SLUG="$4"
    local EXCERPT="$5"
    local IMAGE_FILE="$6"
    local FEATURED="$7"

    # Verificar si ya existe
    local EXISTS=$(wp post list --post_type=product --name="$SLUG" --format=count --allow-root)
    if [ "$EXISTS" -gt 0 ]; then
        warn "  Producto '$TITLE' ya existe, saltando."
        return
    fi

    # Importar imagen
    local IMAGE_ID=$(import_image "$UPLOADS_DIR/$IMAGE_FILE" "$TITLE")

    # Crear producto
    local PRODUCT_ID=$(wp wc product create \
        --name="$TITLE" \
        --slug="$SLUG" \
        --type=simple \
        --regular_price="$PRICE" \
        --short_description="$EXCERPT" \
        --status=publish \
        --catalog_visibility=visible \
        --user=1 \
        --porcelain \
        --allow-root 2>/dev/null)

    if [ -z "$PRODUCT_ID" ] || [ "$PRODUCT_ID" = "0" ]; then
        # Fallback: crear con wp post create
        PRODUCT_ID=$(wp post create \
            --post_type=product \
            --post_title="$TITLE" \
            --post_name="$SLUG" \
            --post_excerpt="$EXCERPT" \
            --post_status=publish \
            --porcelain \
            --allow-root)
        wp post meta update $PRODUCT_ID _regular_price "$PRICE" --allow-root
        wp post meta update $PRODUCT_ID _price "$PRICE" --allow-root
        wp post meta update $PRODUCT_ID _visibility "visible" --allow-root
        wp post meta update $PRODUCT_ID _stock_status "instock" --allow-root
    fi

    # Asignar categoría
    wp post term set $PRODUCT_ID product_cat "$CAT_SLUG" --allow-root 2>/dev/null

    # Asignar imagen
    if [ "$IMAGE_ID" != "0" ] && [ -n "$IMAGE_ID" ]; then
        wp post meta update $PRODUCT_ID _thumbnail_id "$IMAGE_ID" --allow-root
    fi

    # Marcar como destacado si aplica
    if [ "$FEATURED" = "yes" ]; then
        wp post meta update $PRODUCT_ID _featured "yes" --allow-root
    fi

    log "  Producto creado: $TITLE (#$PRODUCT_ID)"
}

create_product "Jean Skinny Noir" "jean-skinny-noir" "189900" "skinny-jeans" \
    "Jean skinny de tiro alto en negro intenso. Denim premium con stretch para acompañar tu movimiento sin perder la forma." \
    "product-skinny-noir.jpg" "yes"

create_product "Skinny Push Up" "skinny-push-up" "194900" "skinny-jeans" \
    "Tecnología push up combinada con el fit skinny. Efecto levanta cola en silueta ceñida." \
    "product-skinny-pushup.jpg" "yes"

create_product "Mom Jean Clásico" "mom-jean-clasico" "179900" "mom-jeans" \
    "Tiro alto, cintura ceñida y pierna relajada. El mom jean que nunca pasa de moda." \
    "product-mom-clasico.jpg" "no"

create_product "Mom Jean Vintage" "mom-jean-vintage" "184900" "mom-jeans" \
    "Lavado vintage con detalles de desgaste sutil. El mom jean con personalidad." \
    "product-mom-vintage.jpg" "yes"

create_product "Levanta Cola Premium" "levanta-cola-premium" "199900" "levanta-cola" \
    "Nuestro best seller. Diseño que realza y modela tu silueta con la comodidad del denim stretch." \
    "product-levanta-premium.jpg" "yes"

create_product "Levanta Cola Clásico" "levanta-cola-clasico" "189900" "levanta-cola" \
    "El levanta cola esencial de LOVISE. Denim stretch de alta recuperación." \
    "product-levanta-clasico.jpg" "no"

create_product "Wide Leg Crudo" "wide-leg-crudo" "209900" "wide-leg" \
    "Pierna amplia con caída elegante en tono crudo natural. Cintura alta definida." \
    "product-wide-leg.jpg" "yes"

create_product "Palazzo Fluido" "palazzo-fluido" "219900" "palazzo" \
    "Cintura alta con pierna ultra wide. Tela fluida que se mueve contigo." \
    "product-palazzo.jpg" "no"

log "Productos creados."

# ============================================================================
# 10. CREAR MENÚ
# ============================================================================
log "Creando menú principal..."

# Verificar si el menú ya existe
MENU_EXISTS=$(wp menu list --format=count --allow-root)
if [ "$MENU_EXISTS" -gt 0 ]; then
    # Borrar menú existente
    wp menu delete "menu-principal" --allow-root 2>/dev/null || true
fi

wp menu create "Menu Principal" --allow-root
wp menu location assign menu-principal primary --allow-root

# Obtener IDs de páginas
SHOP_ID=$(wp post list --post_type=page --name=tienda --field=ID --allow-root)
ABOUT_ID=$(wp post list --post_type=page --name=sobre-lovise --field=ID --allow-root)
CONTACT_ID=$(wp post list --post_type=page --name=contacto --field=ID --allow-root)

# Obtener URL del sitio
SITE_URL=$(wp option get siteurl --allow-root)

# Agregar ítems al menú
wp menu item add-custom menu-principal "Inicio" "$SITE_URL/" --allow-root

TIENDA_ITEM=$(wp menu item add-post menu-principal $SHOP_ID --title="Tienda" --porcelain --allow-root)

# Sub-menú de colecciones
SKINNY_ID=$(wp term list product_cat --slug=skinny-jeans --field=term_id --allow-root)
MOM_ID=$(wp term list product_cat --slug=mom-jeans --field=term_id --allow-root)
LEVANTA_ID=$(wp term list product_cat --slug=levanta-cola --field=term_id --allow-root)
WIDE_ID=$(wp term list product_cat --slug=wide-leg --field=term_id --allow-root)
PALAZZO_ID=$(wp term list product_cat --slug=palazzo --field=term_id --allow-root)

wp menu item add-term menu-principal product_cat $SKINNY_ID --title="Skinny Jeans" --parent-id=$TIENDA_ITEM --allow-root
wp menu item add-term menu-principal product_cat $MOM_ID --title="Mom Jeans" --parent-id=$TIENDA_ITEM --allow-root
wp menu item add-term menu-principal product_cat $LEVANTA_ID --title="Levanta Cola" --parent-id=$TIENDA_ITEM --allow-root
wp menu item add-term menu-principal product_cat $WIDE_ID --title="Wide Leg" --parent-id=$TIENDA_ITEM --allow-root
wp menu item add-term menu-principal product_cat $PALAZZO_ID --title="Palazzo" --parent-id=$TIENDA_ITEM --allow-root

wp menu item add-post menu-principal $ABOUT_ID --title="Sobre LOVISE" --allow-root
wp menu item add-post menu-principal $CONTACT_ID --title="Contacto" --allow-root

log "Menú creado con dropdown de colecciones."

# ============================================================================
# 11. LIMPIEZA Y FLUSH
# ============================================================================
log "Limpieza final..."

# Borrar página "Sample Page" y "Hello World" post
wp post delete $(wp post list --post_type=page --name=sample-page --format=ids --allow-root 2>/dev/null) --force --allow-root 2>/dev/null || true
wp post delete $(wp post list --post_type=post --name=hello-world --format=ids --allow-root 2>/dev/null) --force --allow-root 2>/dev/null || true

# Flush
wp rewrite flush --allow-root
wp cache flush --allow-root 2>/dev/null || true

# ============================================================================
# RESUMEN
# ============================================================================
echo ""
echo "============================================"
echo "  LOVISE — Setup completo"
echo "============================================"
echo ""
log "Sitio: $(wp option get siteurl --allow-root)"
log "Idioma: es_CO"
log "Moneda: COP"
log "Páginas: $(wp post list --post_type=page --post_status=publish --format=count --allow-root)"
log "Productos: $(wp post list --post_type=product --post_status=publish --format=count --allow-root)"
log "Categorías: $(wp term list product_cat --format=count --allow-root)"
echo ""
log "SIGUIENTE PASO:"
log "  1. Sube el archivo lovise.zip en wp-admin → Apariencia → Temas → Añadir nuevo → Subir tema"
log "  2. Activa el tema LOVISE"
log "  3. Visita tu sitio y verifica que todo se vea bien"
echo ""
