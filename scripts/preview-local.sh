#!/bin/bash
# Start a local WordPress Playground preview with the LOVISE theme.
# Requires: npx (Node.js)
# Usage: bash scripts/preview-local.sh

set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"
THEME_DIR="$PROJECT_DIR/theme"

echo "Starting WordPress Playground with LOVISE theme..."
echo "Theme directory: $THEME_DIR"
echo ""

# Method 1: wp-now (simplest, mounts theme directory directly)
if command -v npx &> /dev/null; then
  echo "Starting with wp-now..."
  echo "Open http://localhost:8881 when ready"
  echo ""
  cd "$THEME_DIR"
  npx @wp-now/wp-now start --wp=latest --php=8.2
else
  echo "Error: npx not found. Install Node.js first."
  echo ""
  echo "Alternative: Upload theme ZIP manually"
  echo "  1. Run: bash scripts/package-theme.sh"
  echo "  2. Go to https://playground.wordpress.net/"
  echo "  3. Upload lovise.zip via Appearance → Themes → Add New"
  exit 1
fi
