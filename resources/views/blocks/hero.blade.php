<section class="site-section hero">
  <div class="site-container hero__inner">
    <div class="hero__content">
      @if ($eyebrow)
        <p class="eyebrow eyebrow--line">{{ $eyebrow }}</p>
      @endif

      @if ($heading)
        <h1 class="title title--display">{{ $heading }}</h1>
      @endif

      @if ($description)
        <p class="body-copy">{{ $description }}</p>
      @endif

      @if ($ctaText && $ctaUrl)
        <a class="button button--outline" href="{{ $ctaUrl }}">
          {{ $ctaText }}
        </a>
      @endif
    </div>

    @if ($imageId)
      <div class="hero__media">
        {!! wp_get_attachment_image(
            $imageId,
            'full',
            false,
            ['class' => 'hero__image']
        ) !!}
      </div>
    @endif
  </div>
</section>
