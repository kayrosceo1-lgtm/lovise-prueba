# WordPress Factory V1

## What This Is

A semi-automated pipeline for building WordPress sites. The workflow is:

**Brief -> Stitch Design -> Approved Design -> Block Theme -> Preview -> Deploy to EasyPanel**

This is NOT a headless architecture. This is NOT a SaaS. This is a tool for a small agency that takes client briefs, designs with Google Stitch, generates native WordPress block themes, and deploys to EasyPanel staging.

## Core Rules

1. **Block Themes ONLY** - Never use Elementor, Divi, Bricks, or any page builder
2. **theme.json is king** - All design tokens (colors, typography, spacing) live in theme.json
3. **Flat files** - Templates are HTML with block comments, not PHP templates
4. **Code in Git, State in DB** - Never commit database dumps, uploads, or wp-config.php
5. **Stitch is the design source of truth** - design.md and design tokens come from Stitch
6. **Repository is the code source of truth** - All generated code lives here
7. **Max 15 plugins** - Prefer native blocks and patterns over plugin bloat
8. **Modern WordPress only** - Use Block Editor APIs, Interactivity API, theme.json v3

## Project Structure

```
briefs/              Client briefs (structured markdown)
design/              Stitch output and design artifacts
  tokens/            Design tokens extracted from Stitch (colors, typography, spacing)
  screens/           Screen exports from Stitch (HTML, images)
  approved/          Approved designs ready for theme generation
theme/               WordPress Block Theme (the main deliverable)
  style.css          Theme header
  theme.json         Global design tokens and settings
  templates/         Full page templates (index.html, single.html, page.html, etc.)
  parts/             Template parts (header.html, footer.html)
  patterns/          Reusable block patterns (hero.php, cta.php, etc.)
  functions.php      Minimal - only enqueue fonts, register patterns
  assets/            Static assets (fonts, images)
  styles/            Style variations
plugins/             Custom plugins (only when block theme isn't enough)
scripts/             Automation scripts (WP-CLI setup, content import)
playground/          WordPress Playground blueprints for preview
deploy/              Deployment configs (Docker, GitHub Actions)
docs/                Project documentation
  research/          NotebookLM exports, reference materials
```

## Workflow Skills

### /brief-to-design
Reads the brief from `briefs/brief.md`, generates a Stitch-ready prompt, and uses Stitch MCP to create initial designs. Saves results to `design/screens/` and `design/tokens/`.

### /design-to-theme
Reads approved design from `design/approved/design.md`, extracts tokens, and generates the complete block theme: theme.json, templates, parts, patterns, and styles.

### /preview
Generates a WordPress Playground blueprint and starts a local preview.

### /deploy
Pushes code to GitHub and triggers EasyPanel deployment webhook.

## Stitch MCP Integration

Stitch is connected via MCP. Two options:

**Option A - Community CLI (simpler, no API key):**
```json
{
  "mcpServers": {
    "stitch": {
      "command": "npx",
      "args": ["@_davideast/stitch-mcp", "proxy"]
    }
  }
}
```

**Option B - Google Remote HTTP (needs API key):**
```json
{
  "mcpServers": {
    "stitch": {
      "type": "http",
      "url": "https://stitch.googleapis.com/mcp",
      "headers": { "X-Goog-Api-Key": "${STITCH_API_KEY}" }
    }
  }
}
```

### Stitch Tools Available
- `build_site` - Generate screens from prompt, get routes and HTML
- `get_screen_code` - Download screen HTML
- `get_screen_image` - Download screen screenshot
- `extract_design_context` - Extract "Design DNA" (tokens, colors, typography)
- `generate_screen_from_text` - Generate a new screen from text prompt
- `list_projects` - List Stitch projects

### Design Artifacts to Save
After Stitch generates screens:
1. Save `design/tokens/design-tokens.json` - extracted colors, fonts, spacing
2. Save `design/screens/*.html` - raw HTML from each screen
3. Save `design/screens/*.png` - screenshots of each screen
4. Create `design/approved/design.md` - the consolidated design document with:
   - Color palette
   - Typography scale
   - Spacing system
   - Component inventory
   - Page layouts
   - Navigation structure

### Design Approval Gate
Before generating WordPress theme:
1. The human reviews `design/approved/design.md`
2. The human marks it as approved (adds `status: approved` to frontmatter)
3. Only then does /design-to-theme proceed

## Theme Generation Rules

When generating the block theme from an approved design:

### theme.json
- Use version 3 schema
- Map Stitch colors to `settings.color.palette`
- Map Stitch fonts to `settings.typography.fontFamilies`
- Map Stitch spacing to `settings.spacing.spacingSizes`
- Set `settings.appearanceTools: true`
- Define `settings.layout.contentSize` and `wideSize`
- Style elements: links, headings, buttons
- Style specific blocks as needed

### Templates
- `templates/index.html` - required fallback
- `templates/home.html` - front page
- `templates/page.html` - generic page
- `templates/single.html` - single post
- `templates/archive.html` - archive/blog listing
- `templates/404.html` - not found page

### Template Parts
- `parts/header.html` - site header with navigation
- `parts/footer.html` - site footer

### Patterns
- Create patterns for each distinct section from the design
- Each pattern is a `.php` file in `patterns/` with a block comment header
- Common patterns: hero, features, testimonials, cta, pricing, team, contact-form
- Patterns are the primary building blocks - make them modular and reusable

### Custom Blocks
- Only create custom blocks when native core blocks + patterns cannot achieve the design
- Use `@wordpress/create-block` for scaffolding
- Keep them in `plugins/` as a separate plugin

## Preview Strategy

### Primary: WordPress Playground (local/shareable)
- Generate `playground/blueprint.json` with theme, plugins, and demo content
- Run with `npx @wp-playground/cli start --blueprint=playground/blueprint.json`
- For client sharing, use the Playground URL builder

### Secondary: EasyPanel Staging (production-like)
- Full WordPress on server with real database
- Used for final review before production
- URL: configured in `.env` as `WP_STAGING_URL`

## Deploy Strategy (V1)

### What goes to GitHub
- `theme/` - the complete block theme
- `plugins/` - custom plugins only
- `deploy/` - deployment configs
- `playground/` - blueprints
- `.github/workflows/` - CI/CD

### What does NOT go to GitHub
- `.env` - secrets
- `wordpress/` - WP core
- `uploads/` - media files
- Database dumps
- `node_modules/`

### CI/CD Flow
1. Push to `main` branch
2. GitHub Actions runs validation (theme structure, JSON lint)
3. GitHub Actions triggers EasyPanel deploy webhook
4. EasyPanel pulls the new code and updates the WordPress container
5. Theme and plugins are synced to `/var/www/html/wp-content/`

### EasyPanel Setup (one-time)
1. Create WordPress app from EasyPanel template
2. Configure domain and SSL
3. Set up GitHub integration (webhook or SSH deploy)
4. Mount volumes for `wp-content/uploads` and database

## NotebookLM Integration

NotebookLM is used as a research companion, NOT as a pipeline dependency.

### How to use
- Export research notes from NotebookLM as Markdown to `docs/research/`
- When Claude Code needs context about architectural decisions, read from `docs/research/`
- For ongoing research, query NotebookLM via the `nlm` CLI tool

### Key Notebook
- ID: `94965256-bbca-48d5-80f7-8c6d0a8388dd`
- Title: "Architecting the Semi-Automated WordPress Factory"
- Contains: architecture decisions, workflow analysis, risk assessment

## WordPress Agent Skills

Install the Automattic agent-skills for modern WordPress best practices:
- `wp-block-themes` - Block theme development standards
- `wp-plugin-development` - Plugin development standards
- `wp-performance` - Performance best practices

Reference: https://github.com/Automattic/agent-skills

## Key Commands

```bash
# Initialize a new project
./scripts/wpf init my-client-site

# Validate theme structure
./scripts/wpf validate

# Start local preview
./scripts/wpf preview

# Deploy to staging
./scripts/wpf deploy staging
```
