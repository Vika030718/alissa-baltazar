<section class="site-section site-section--spaced site-section--surface about">
  <div class="site-container about__inner">
    <div class="about__media">
      @if ($imageId)
        {!! wp_get_attachment_image(
            $imageId,
            'large',
            false,
            ['class' => 'about__image']
        ) !!}
      @endif
    </div>

    <div class="about__content">
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

      @if ($location)
        <p class="about__location">
          {{ $location }}
        </p>
      @endif

      @if ($ctaText && $ctaUrl)
        <a href="{{ $ctaUrl }}" class="button button--outline">
          {{ $ctaText }}
        </a>
      @endif

      @if ($quote)
        <blockquote class="about__quote">
          {{ $quote }}
        </blockquote>
      @endif
    </div>
  </div>
</section>
