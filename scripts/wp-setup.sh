#!/usr/bin/env bash
# WP-CLI setup script for provisioning a WordPress instance
# Run this on the server or inside a Docker container with WP-CLI installed
set -euo pipefail

# Load environment
if [[ -f .env ]]; then
    source .env
fi

SITE_URL="${WP_STAGING_URL:-http://localhost:8080}"
SITE_TITLE="${WP_SITE_TITLE:-My Site}"
ADMIN_USER="${WP_ADMIN_USER:-admin}"
ADMIN_PASS="${WP_ADMIN_PASS:-changeme}"
ADMIN_EMAIL="${WP_ADMIN_EMAIL:-admin@example.com}"
THEME_SLUG="${WP_THEME_SLUG:-wpf-starter}"

echo "=== WordPress Factory - Site Setup ==="
echo "URL: $SITE_URL"
echo "Theme: $THEME_SLUG"
echo ""

# Install WordPress core (skip if already installed)
if ! wp core is-installed --allow-root 2>/dev/null; then
    echo "Installing WordPress..."
    wp core install \
        --url="$SITE_URL" \
        --title="$SITE_TITLE" \
        --admin_user="$ADMIN_USER" \
        --admin_password="$ADMIN_PASS" \
        --admin_email="$ADMIN_EMAIL" \
        --allow-root
fi

# Activate the generated theme
echo "Activating theme: $THEME_SLUG"
wp theme activate "$THEME_SLUG" --allow-root

# Set permalink structure
wp rewrite structure '/%postname%/' --allow-root
wp rewrite flush --allow-root

# Set front page to static page
wp option update show_on_front page --allow-root

# Create essential pages
create_page() {
    local title="$1"
    local slug="$2"
    if ! wp post list --post_type=page --name="$slug" --format=count --allow-root | grep -q "^0$"; then
        echo "Page '$title' already exists."
    else
        wp post create --post_type=page --post_title="$title" --post_name="$slug" --post_status=publish --allow-root
        echo "Created page: $title"
    fi
}

create_page "Home" "home"
create_page "About" "about"
create_page "Services" "services"
create_page "Contact" "contact"
create_page "Blog" "blog"

# Set home and blog pages
HOME_ID=$(wp post list --post_type=page --name=home --field=ID --allow-root)
BLOG_ID=$(wp post list --post_type=page --name=blog --field=ID --allow-root)
wp option update page_on_front "$HOME_ID" --allow-root
wp option update page_for_posts "$BLOG_ID" --allow-root

# Delete default content
wp post delete 1 --force --allow-root 2>/dev/null || true  # Hello World
wp post delete 2 --force --allow-root 2>/dev/null || true  # Sample Page

# Install recommended plugins
echo "Installing plugins..."
wp plugin install wordpress-seo --activate --allow-root 2>/dev/null || true
wp plugin install wordfence --activate --allow-root 2>/dev/null || true

# Disable comments
wp option update default_comment_status closed --allow-root

# Set timezone
wp option update timezone_string "America/Bogota" --allow-root

echo ""
echo "=== Setup Complete ==="
echo "Site: $SITE_URL"
echo "Admin: $SITE_URL/wp-admin"
echo "User: $ADMIN_USER"
