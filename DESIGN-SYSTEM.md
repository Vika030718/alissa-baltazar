# Alissa Baltazar — Front-end Design System

This refactor separates **design-system primitives** from **block-specific layout**.

## Layers

- `styles/settings/_variables.scss` — design tokens: color, typography, spacing, layout, controls, motion, z-index.
- `styles/base/_foundation.scss` — global box model and page foundation.
- `styles/layout/_layout.scss` — shared page geometry (`.site-container`, `.site-section`).
- `styles/components/_typography.scss` — reusable editorial typography and text links.
- `styles/components/_buttons.scss` — one button primitive with explicit variants.
- `styles/blocks/*` — only geometry or behavior unique to a Gutenberg block.
- `styles/sections/*` — only header/footer-specific layout.
- `styles/pages/*` — page-specific composition such as Story content.

## Shared classes

### Layout

```html
<section class="site-section site-section--spaced site-section--border-bottom">
  <div class="site-container">...</div>
</section>
```

Available container widths:

- `.site-container` — standard 1440px design boundary.
- `.site-container--content` — 1100px content boundary.
- `.site-container--reading` — 720px reading measure.

Available section modifiers:

- `.site-section--spaced`
- `.site-section--surface`
- `.site-section--border-top`
- `.site-section--border-bottom`

The `site-` prefix is intentional: the project already uses Tailwind, which has its own `.container` utility.

### Typography

```html
<p class="eyebrow">Selected Work</p>
<h1 class="title title--display">...</h1>
<h2 class="title title--section">...</h2>
<h3 class="title title--card">...</h3>
<p class="body-copy">...</p>
<p class="meta-label">Wedding</p>
<a class="text-link" href="#">Read Article</a>
```

Title variants:

- `title--display` — homepage hero.
- `title--page` — page / Story H1.
- `title--section` — normal section heading.
- `title--section-large` — larger editorial section heading.
- `title--statement` — centered statement / philosophy.
- `title--card` — card heading.

### Buttons

```html
<a class="button button--outline" href="#">View Work</a>
<a class="button button--accent" href="#">Inquire</a>
<a class="button button--outline button--sm" href="#">Inquire</a>
```

All button typography, radius, focus state and transitions live in one place.

## Rule for block SCSS

A block file should answer: **what is unique about this component?**

Keep in block files:

- grid structure;
- image aspect ratios;
- decorative pseudo-elements;
- component-specific positioning;
- unique responsive behavior.

Do not repeat in block files:

- standard container widths;
- section background / spacing / borders when a shared modifier works;
- eyebrow typography;
- title typography;
- standard button styles;
- standard metadata labels;
- standard editorial links.

## Responsive work

The existing breakpoints were intentionally preserved as much as possible. The next cleanup should consolidate media queries and move repeated responsive decisions into a small breakpoint strategy without changing the desktop design system.
