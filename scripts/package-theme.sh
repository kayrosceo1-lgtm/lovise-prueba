#!/bin/bash
# Package the LOVISE theme as a ZIP file for installation in WordPress.
# Usage: bash scripts/package-theme.sh
# Output: lovise.zip in the project root

set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"
THEME_DIR="$PROJECT_DIR/theme"
OUTPUT="$PROJECT_DIR/lovise.zip"

# Remove old zip if exists
rm -f "$OUTPUT"

# Create zip from theme directory, naming the root folder "lovise"
cd "$THEME_DIR"
cd ..
# Use a temp directory to ensure the zip root is "lovise/"
TEMP_DIR=$(mktemp -d)
cp -r "$THEME_DIR" "$TEMP_DIR/lovise"
cd "$TEMP_DIR"
zip -r "$OUTPUT" lovise/ -x "lovise/styles/.gitkeep" "lovise/assets/fonts/.gitkeep"
rm -rf "$TEMP_DIR"

echo ""
echo "✓ Theme packaged: $OUTPUT"
echo "  Install via WordPress Admin → Appearance → Themes → Add New → Upload Theme"
