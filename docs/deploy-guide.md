# Guía de Deploy — LOVISE a EasyPanel

## Requisitos previos

- WordPress instalado en EasyPanel (imagen oficial `wordpress:latest`)
- Acceso al panel de EasyPanel desde el navegador
- Acceso al wp-admin de tu WordPress en producción
- Los archivos `lovise.zip` y `scripts/setup-production.sh` de este repositorio

## Paso 1: Abrir la terminal del contenedor WordPress

1. Entra a **EasyPanel** en tu navegador (ej: `http://TU-IP:3000`)
2. Busca tu app de **WordPress**
3. Haz clic en el servicio de WordPress (no el de MySQL)
4. Busca el botón **"Terminal"** o **"Console"** — esto abre un shell dentro del contenedor
5. Verifica que WP-CLI funciona escribiendo:
   ```
   wp --info --allow-root
   ```
   Deberías ver la versión de WP-CLI. Si no aparece, instálalo con:
   ```
   curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
   chmod +x wp-cli.phar
   mv wp-cli.phar /usr/local/bin/wp
   ```

## Paso 2: Subir y ejecutar el script de setup

### Opción A: Copiar y pegar el script (más fácil)

1. Abre el archivo `scripts/setup-production.sh` en tu editor de texto
2. Copia TODO el contenido
3. En la terminal de EasyPanel, crea el archivo:
   ```
   cat > /tmp/setup.sh << 'SCRIPT_END'
   ```
4. Pega el contenido del script
5. Escribe en una nueva línea:
   ```
   SCRIPT_END
   ```
6. Ejecuta:
   ```
   bash /tmp/setup.sh
   ```

### Opción B: Descargar desde GitHub (si subiste el repo)

```
cd /tmp
curl -sL https://raw.githubusercontent.com/kayrosceo1-lgtm/lovise-prueba/main/scripts/setup-production.sh -o setup.sh
bash setup.sh
```

### Lo que hace el script:

- Instala WooCommerce y lo configura en español con moneda COP
- Crea todas las páginas (Inicio, Tienda, Carrito, Checkout, Sobre LOVISE, Contacto, FAQ, Guía de Tallas, Envíos)
- Crea las 5 categorías de producto (Skinny Jeans, Mom Jeans, Levanta Cola, Wide Leg, Palazzo)
- Crea los 8 productos con precios, descripciones e imágenes
- Crea el menú principal con dropdown de colecciones
- Configura la front page, permalinks en español y zona horaria Colombia
- Descarga imágenes de moda desde Pexels (gratis, sin licencia)

Espera a que termine. Verás un resumen al final con el conteo de páginas y productos.

## Paso 3: Subir el tema LOVISE

1. Abre tu WordPress en el navegador: `http://TU-IP:PUERTO/wp-admin/`
2. Inicia sesión con tu usuario y contraseña
3. Ve a **Apariencia → Temas**
4. Clic en **"Añadir nuevo tema"** (o "Add New")
5. Clic en **"Subir tema"** (o "Upload Theme")
6. Selecciona el archivo **`lovise.zip`** que está en la raíz de este repositorio
7. Clic en **"Instalar ahora"**
8. Una vez instalado, clic en **"Activar"**

## Paso 4: Verificar

Abre tu sitio en el navegador (`http://TU-IP:PUERTO/`) y verifica:

- [ ] Home: Hero con imagen, colecciones, productos, testimonios, newsletter, footer
- [ ] Menú: Inicio, Tienda (con dropdown), Sobre LOVISE, Contacto
- [ ] Tienda: Grid de 4 columnas con los 8 productos
- [ ] Producto individual: Galería + info + botón agregar al carrito
- [ ] Carrito y Checkout: Con estilos LOVISE
- [ ] Sobre LOVISE: Historia, valores, CTA
- [ ] Contacto: Formulario + info de contacto
- [ ] Preguntas frecuentes: Acordeones funcionales
- [ ] Guía de tallas: Tabla + consejos por modelo
- [ ] Footer: Links a todas las páginas

## Solución de problemas

### "No se encontró wp-config.php"
Asegúrate de ejecutar el script dentro del contenedor de WordPress, no en el host.

### Las imágenes no se descargan
El contenedor necesita acceso a internet. Verifica con: `curl -I https://images.pexels.com`
Si no funciona, las imágenes se pueden subir manualmente desde wp-admin → Medios.

### WP-CLI no está instalado
La imagen oficial de WordPress no siempre incluye WP-CLI. Instálalo manualmente:
```
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
mv wp-cli.phar /usr/local/bin/wp
```

### Los permalinks no funcionan (error 404)
En wp-admin ve a **Ajustes → Enlaces permanentes** y clic en "Guardar cambios" sin modificar nada. Esto regenera el archivo `.htaccess`.

### El tema se ve diferente a local
Haz Ctrl+Shift+R para limpiar la caché del navegador. Si persiste, verifica que el tema esté activado en Apariencia → Temas.

## Actualizaciones futuras

Para actualizar el tema después de hacer cambios:

1. Edita los archivos en `theme/` en tu repositorio local
2. Vuelve a empaquetar: ejecuta en la raíz del proyecto:
   ```
   python -c "
   import zipfile, os
   with zipfile.ZipFile('lovise.zip', 'w', zipfile.ZIP_DEFLATED) as zf:
       for root, dirs, files in os.walk('theme'):
           for f in files:
               fp = os.path.join(root, f)
               zf.write(fp, 'lovise' + fp[5:].replace(os.sep, '/'))
   print('lovise.zip actualizado')
   "
   ```
3. Sube el nuevo `lovise.zip` en wp-admin → Temas → Añadir nuevo → Subir tema
4. WordPress te preguntará si quieres reemplazar el existente → confirma
