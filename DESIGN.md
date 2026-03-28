# Design System Strategy: The Digital Atelier

## 1. Overview & Creative North Star
The "Creative North Star" for this design system is **"The Digital Atelier."** 

Standard UI is often rigid and utilitarian. To move beyond the "template" look, this system treats every screen as a bespoke editorial canvas. We embrace **Soft Minimalism**—an aesthetic where luxury is defined by what *isn't* there. By utilizing a high-contrast typography scale (pairing an authoritative Serif with an understated Sans-serif) and intentional asymmetry, we create a feeling of curated artistry. This isn't just an interface; it’s a digital gallery. Large "breathing room" (negative space) and layered depth replace the cluttered density of traditional apps, ensuring that the plum-toned content remains the singular focus of the user’s journey.

## 2. Colors: Tonal Depth & Tactility
The color palette is derived directly from the brand’s heritage: a deep Plum for authority and a dusty Rose for softness, anchored by a Pure White base.

*   **Primary (#42274e):** Our deep plum. Used for primary actions, high-level typography, and brand-defining icons.
*   **Secondary (#6b5967 / #f1d9e9):** The dusty rose accents. Use these for soft background sections or complementary details that require less visual "weight."
*   **The "No-Line" Rule:** We do not use 1px solid borders for sectioning. Boundaries must be defined solely through background color shifts. For example, transition from a `surface` (#f9f9f9) to a `surface-container-low` (#f3f3f4) to signal a new thematic block.
*   **Surface Hierarchy & Nesting:** Think of the UI as stacked sheets of fine paper. 
    *   **Level 0:** `surface-container-lowest` (#ffffff) - The base canvas.
    *   **Level 1:** `surface-container` (#eeeeee) - Nested modules or sidebar areas.
*   **Glass & Gradient Rule:** For a premium feel, use Glassmorphism on floating navigation bars or modals. Apply a `surface` color at 70% opacity with a `backdrop-blur: 20px`. Main CTA buttons should use a subtle vertical gradient from `primary` (#42274e) to `primary_container` (#5a3d66) to add a 3D tactile quality.

## 3. Typography: Editorial Authority
The type system creates a conversation between tradition (Serif) and modernity (Sans-serif).

*   **Display & Headlines (Noto Serif):** These are the "voice" of the brand. Use `display-lg` (3.5rem) for hero statements with tight letter-spacing and intentional leading to create a high-fashion editorial look.
*   **Functional Text (Manrope):** All functional UI, labels, and body copy use Manrope. Its geometric yet humanist nature ensures readability at small scales without competing with the Serif headlines.
*   **The Hierarchy Strategy:** A vast scale difference between `headline-lg` and `body-md` is intentional. This "size-contrast" is a hallmark of luxury design, guiding the eye through a clear narrative path.

## 4. Elevation & Depth: Atmospheric Layering
We avoid the "shadow-heavy" look of 2010s design. Instead, we use **Tonal Layering**.

*   **The Layering Principle:** Place a `surface-container-lowest` card on a `surface-container-low` background. The subtle 2-bit color difference creates a soft, natural lift that feels sophisticated and organic.
*   **Ambient Shadows:** If a card must "float," use an ultra-diffused shadow. 
    *   *Values:* `0px 20px 40px rgba(66, 39, 78, 0.06)`. Note the color: the shadow is a 6% opacity version of our plum `primary`, making it feel like ambient light rather than a grey smudge.
*   **The Ghost Border Fallback:** For accessibility in form fields, use the `outline_variant` token at 20% opacity. This "Ghost Border" provides enough contrast for WCAG compliance while maintaining a minimalist aesthetic.

## 5. Components: Minimalist Primitives
All components follow the **Roundedness Scale (Default: 0.25rem)** to maintain a sharp, "tailored" look. Avoid "pill" shapes (full roundedness) unless used for secondary chips.

*   **Buttons:**
    *   *Primary:* Plum gradient fill, `on_primary` (White) text, sharp corners (`sm` or `md` radius).
    *   *Tertiary:* Underlined Noto Serif text with no container.
*   **Cards:** Forbid divider lines. Use `spacing-12` (4rem) of vertical white space to separate card sections. Use a `surface-container-lowest` fill to distinguish cards from the main `surface`.
*   **Input Fields:** Ghost Borders only. The label should use `label-md` in Plum (#42274e). Error states use a soft `error_container` wash (#ffdad6) rather than a harsh red line.
*   **Chips:** Use the `secondary_fixed` (#f4dcec) color for a soft, jewelry-like feel for tags or categories.
*   **Signature Component - The "Atelier Carousel":** Large images that overlap the container edge, using asymmetrical spacing (`spacing-16` on the left, `spacing-4` on the right) to create a dynamic, non-grid feel.

## 6. Do’s and Don’ts

### Do’s
*   **DO** use extreme white space. If a section feels "finished," add 20% more padding.
*   **DO** use Noto Serif for numbers (e.g., prices, dates) to give them a premium, "engraved" look.
*   **DO** use `surface_tint` overlays (5% opacity) on images to unify them with the brand’s color story.

### Don’ts
*   **DON’T** use 1px solid black or grey lines. They break the "Atelier" softness.
*   **DON’T** use standard blue for links. All interactive text is either Plum (#42274e) or Plum at 60% opacity.
*   **DON’T** crowd the edges of the screen. Maintain a minimum gutter of `spacing-8` (2.75rem) for mobile and `spacing-24` (8.5rem) for desktop.
*   **DON’T** use generic drop shadows. If a component doesn't feel separated enough, increase the background color contrast instead.