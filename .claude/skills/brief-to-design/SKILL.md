---
name: brief-to-design
description: Read client brief and generate visual design using Stitch MCP, saving design artifacts to the repo
---

# Brief to Design

Transform a client brief into a visual design using Google Stitch.

## When to Use
When the user says `/brief-to-design` or asks to create a design from a brief.

## Steps

### 1. Read the Brief
Read `briefs/brief.md` (or the file the user specifies). Extract:
- Business name and industry
- Target audience
- Brand colors, fonts, logo
- Required pages
- Reference sites
- Desired functionality

### 2. Generate Stitch Prompt
Compose a detailed prompt for Stitch based on the brief. Include:
- The type of website (business, portfolio, e-commerce, etc.)
- Brand personality and visual direction
- Number of screens needed (home, about, services, contact, etc.)
- Color preferences from the brief
- Reference site aesthetics

### 3. Call Stitch MCP
Use the Stitch MCP tools in this order:

1. **`generate_screen_from_text`** or **`build_site`** - Generate the initial screens
2. **`get_screen_code`** - Download HTML for each screen
3. **`get_screen_image`** - Download screenshot of each screen
4. **`extract_design_context`** - Extract the Design DNA (colors, typography, spacing)

### 4. Save Design Artifacts

Save everything to the `design/` directory:

- `design/screens/{page-name}.html` - Raw HTML from Stitch for each screen
- `design/screens/{page-name}.png` - Screenshot of each screen
- `design/tokens/design-tokens.json` - Extracted design tokens:
  ```json
  {
    "colors": {
      "primary": "#hex",
      "secondary": "#hex",
      "accent": "#hex",
      "background": "#hex",
      "foreground": "#hex"
    },
    "typography": {
      "heading": "Font Family",
      "body": "Font Family",
      "sizes": { "sm": "14px", "base": "16px", "lg": "20px", "xl": "28px", "2xl": "40px" }
    },
    "spacing": {
      "xs": "8px", "sm": "16px", "md": "24px", "lg": "32px", "xl": "48px", "2xl": "72px"
    }
  }
  ```

### 5. Create Design Document
Generate `design/approved/design.md` with this structure:

```markdown
---
status: draft
created: YYYY-MM-DD
stitch_project: [project-id-if-available]
---

# Design: [Project Name]

## Color Palette
| Name | Hex | Usage |
|------|-----|-------|
| Primary | #xxx | Headings, dark backgrounds |
| ... | ... | ... |

## Typography
- **Headings:** [Font Family], weights: 700
- **Body:** [Font Family], weights: 400, 500
- **Scale:** sm / base / lg / xl / 2xl

## Spacing System
xs (8px) / sm (16px) / md (24px) / lg (32px) / xl (48px) / 2xl (72px)

## Page Layouts
### Home
- Hero section with [description]
- Features grid with [description]
- CTA section

### About
[layout description]

### Services
[layout description]

### Contact
[layout description]

## Component Inventory
- Navigation: [type]
- Hero: [style]
- Cards: [style]
- Buttons: [primary, secondary, outline]
- Footer: [layout]

## Notes
[Any additional observations]
```

### 6. Present to User
Show the user a summary of what was generated and ask them to:
1. Review `design/approved/design.md`
2. Review the screenshots in `design/screens/`
3. Change `status: draft` to `status: approved` when ready
4. Then run `/design-to-theme` to generate the WordPress theme

## If Stitch MCP is Not Available
If Stitch MCP tools are not connected:
1. Tell the user to configure Stitch MCP (see CLAUDE.md for instructions)
2. Alternatively, ask the user to:
   - Go to stitch.withgoogle.com
   - Create designs based on the brief
   - Export the design.md manually
   - Place it in `design/approved/design.md`
3. The user can also paste Stitch HTML directly and you can extract tokens from it
