---
name: design-to-theme
description: Convert an approved Stitch design into a complete WordPress block theme with theme.json, templates, parts, and patterns
---

# Design to Theme

Generate a complete WordPress block theme from an approved design.

## When to Use
When the user says `/design-to-theme` or asks to generate a theme from the approved design.

## Prerequisites
- `design/approved/design.md` must exist with `status: approved` in frontmatter
- `design/tokens/design-tokens.json` should exist (or tokens must be in design.md)

## Steps

### 1. Read the Approved Design
Read `design/approved/design.md` and `design/tokens/design-tokens.json`.
Verify the status is `approved`. If not, warn the user.

### 2. Generate theme.json
Map design tokens to WordPress theme.json v3:

- **Colors** -> `settings.color.palette[]`
  - Each color gets: slug, color (hex), name
- **Typography** -> `settings.typography.fontFamilies[]` and `fontSizes[]`
  - Use fluid typography with min/max values
  - Register Google Fonts if needed
- **Spacing** -> `settings.spacing.spacingSizes[]`
  - Map the spacing scale to WordPress spacing presets
- **Layout** -> `settings.layout.contentSize` and `wideSize`
- **Styles** -> Map global styles for body, links, headings, buttons
- **Element styles** -> Style links, headings, buttons globally

Write to `theme/theme.json`.

### 3. Update style.css
Update the theme header in `theme/style.css` with the project name.

### 4. Generate Template Parts
Based on the design's navigation and footer:

**`theme/parts/header.html`**
- Site title or logo
- Navigation menu
- Match the design's header layout (centered, split, sticky, etc.)

**`theme/parts/footer.html`**
- Footer columns if multi-column
- Copyright text
- Social links if applicable

### 5. Generate Patterns
For each distinct section in the design, create a pattern file in `theme/patterns/`:

Common patterns:
- `hero.php` - Hero/banner section
- `features.php` - Feature grid or cards
- `cta.php` - Call to action
- `testimonials.php` - Client testimonials
- `pricing.php` - Pricing table
- `team.php` - Team members
- `contact-form.php` - Contact section
- `gallery.php` - Image gallery
- `stats.php` - Statistics/numbers
- `faq.php` - FAQ accordion

Each pattern file must have the block comment header:
```php
<?php
/**
 * Title: Pattern Name
 * Slug: theme-slug/pattern-slug
 * Categories: featured
 * Keywords: keyword1, keyword2
 * Description: What this pattern does.
 */
?>
<!-- block markup here -->
```

### 6. Generate Templates
Create page templates that compose patterns:

- `templates/home.html` - Compose home page patterns
- `templates/page.html` - Generic page
- `templates/single.html` - Single post
- `templates/archive.html` - Blog archive
- `templates/404.html` - Not found
- Additional templates as needed (landing, contact, etc.)

Each template must include header and footer parts:
```html
<!-- wp:template-part {"slug":"header","area":"header"} /-->
<!-- main content -->
<!-- wp:template-part {"slug":"footer","area":"footer"} /-->
```

### 7. Generate functions.php
Keep it minimal:
- Register pattern categories
- Enqueue Google Fonts if used (via `wp_enqueue_style` with `fonts.googleapis.com`)
- Add editor styles
- NO classic theme functions (add_theme_support for thumbnails, etc. is handled by theme.json)

### 8. Validate
Run validation checks:
- theme.json is valid JSON
- All templates reference existing template parts
- All patterns have proper headers
- No PHP errors in pattern files

### 9. Update Playground Blueprint
Update `playground/blueprint.json` to include the new theme.

### 10. Present Results
Tell the user:
- What was generated (list of files)
- How to preview: `./scripts/wpf preview` or `npx @wp-playground/cli start` from theme/
- Remind them to review and adjust patterns as needed

## WordPress Block Markup Rules
- Always use `<!-- wp:block-name {"attrs"} -->` syntax
- Use preset values: `var:preset|color|primary`, `var:preset|spacing|30`
- Use `has-{slug}-color`, `has-{slug}-background-color` classes
- Use `layout` attribute for flex/grid/constrained layouts
- Never use inline CSS when a preset exists
- Never use `!important`
