<section class="about">
  <div class="about__inner">

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
        <p class="about__eyebrow">
          {{ $eyebrow }}
        </p>
      @endif

      @if ($heading)
        <h2 class="about__heading">
          {{ $heading }}
        </h2>
      @endif

      @if ($description)
        <p class="about__description">
          {{ $description }}
        </p>
      @endif

      @if ($location)
        <p class="about__location">
          {{ $location }}
        </p>
      @endif

      @if ($ctaText && $ctaUrl)
        <a
          href="{{ $ctaUrl }}"
          class="about__cta"
        >
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