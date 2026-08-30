<section class="hero">
  <div class="hero__inner">
    <div class="hero__content">
      @if ($eyebrow)
        <p class="hero__eyebrow">{{ $eyebrow }}</p>
      @endif

      @if ($heading)
        <h1 class="hero__heading">{{ $heading }}</h1>
      @endif

      @if ($description)
  <p class="hero__description">{{ $description }}</p>
@endif

      @if ($ctaText && $ctaUrl)
        <a class="hero__cta" href="{{ $ctaUrl }}">
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