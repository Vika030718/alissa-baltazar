<section class="site-section site-section--spaced site-section--border-bottom final-cta">
  <div class="site-container final-cta__inner">
    <div class="final-cta__content">
      @if ($eyebrow)
        <p class="eyebrow">
          {{ $eyebrow }}
        </p>
      @endif

      @if ($heading)
        <h2 class="title title--section-large">
          {{ $heading }}
        </h2>
      @endif

      @if ($description)
        <p class="body-copy">
          {{ $description }}
        </p>
      @endif
    </div>

    @if ($ctaText && $ctaUrl)
      <a class="button button--accent" href="{{ $ctaUrl }}">
        {{ $ctaText }}
      </a>
    @endif
  </div>
</section>
