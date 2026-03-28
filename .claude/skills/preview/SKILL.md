---
name: preview
description: Generate WordPress Playground blueprint and start local preview of the block theme
---

# Preview

Start a WordPress Playground instance to preview the generated theme.

## When to Use
When the user says `/preview` or wants to see the theme in action.

## Steps

### 1. Validate Theme
First, check that the theme has the minimum required files:
- `theme/style.css`
- `theme/theme.json`
- `theme/templates/index.html`

### 2. Generate Blueprint
Create or update `playground/blueprint.json`:

```json
{
  "$schema": "https://playground.wordpress.net/blueprint-schema.json",
  "landingPage": "/",
  "phpVersion": "8.2",
  "wpVersion": "latest",
  "features": {
    "networking": true
  },
  "steps": [
    {
      "step": "installTheme",
      "themeData": {
        "resource": "url",
        "url": "file:///path/to/theme.zip"
      }
    },
    {
      "step": "setSiteOptions",
      "options": {
        "blogname": "Preview Site",
        "show_on_front": "page"
      }
    }
  ]
}
```

### 3. Start Playground
Run: `npx @wp-playground/cli start --blueprint=playground/blueprint.json`

Or for a simpler approach, run from the theme directory:
`cd theme && npx @wp-playground/cli start`

### 4. Alternative: Use wp-env
If the user has Docker, offer `wp-env` as alternative:
`npx @wordpress/env start`

### 5. Tell the User
- The local URL where the preview is running
- How to access the admin (usually /wp-admin with admin/password)
- How to stop the preview (Ctrl+C)
- For client preview, suggest deploying to EasyPanel staging instead
