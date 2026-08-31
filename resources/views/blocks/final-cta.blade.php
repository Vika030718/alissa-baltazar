<section class="final-cta">
  <div class="final-cta__inner">

    <div class="final-cta__content">
      @if ($eyebrow)
        <p class="final-cta__eyebrow">
          {{ $eyebrow }}
        </p>
      @endif

      @if ($heading)
        <h2 class="final-cta__heading">
          {{ $heading }}
        </h2>
      @endif

      @if ($description)
        <p class="final-cta__description">
          {{ $description }}
        </p>
      @endif
    </div>

    @if ($ctaText && $ctaUrl)
      <a
        class="final-cta__button"
        href="{{ $ctaUrl }}"
      >
        {{ $ctaText }}
      </a>
    @endif

  </div>
</section>