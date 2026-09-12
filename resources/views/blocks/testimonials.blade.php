<section class="site-section site-section--spaced site-section--border-bottom testimonials">
  <div class="site-container testimonials__inner">
    <header class="testimonials__header">
      <div>
        @if ($eyebrow)
          <p class="eyebrow">
            {{ $eyebrow }}
          </p>
        @endif

        @if ($heading)
          <h2 class="title title--section">
            {{ $heading }}
          </h2>
        @endif
      </div>

      @if ($rating || $ratingText)
        <div class="testimonials__rating">
          <div class="testimonials__stars" aria-hidden="true">
            ★★★★★
          </div>

          <div>
            @if ($rating)
              <strong>{{ $rating }}</strong>
            @endif

            @if ($ratingText)
              <span>{{ $ratingText }}</span>
            @endif
          </div>
        </div>
      @endif
    </header>

    @if (!empty($testimonials))
      <div class="testimonials__grid">
        @foreach ($testimonials as $testimonial)
          <article class="testimonials__card">
            <div class="testimonials__card-stars" aria-hidden="true">
              ★★★★★
            </div>

            @if (!empty($testimonial['quote']))
              <blockquote class="testimonials__quote">
                “{{ $testimonial['quote'] }}”
              </blockquote>
            @endif

            <footer class="testimonials__author">
              @if (!empty($testimonial['name']))
                <strong>{{ $testimonial['name'] }}</strong>
              @endif

              @if (!empty($testimonial['source']))
                <span>{{ $testimonial['source'] }}</span>
              @endif
            </footer>
          </article>
        @endforeach
      </div>
    @endif

    @if ($reviewsUrl)
      <div class="testimonials__footer">
        <a
          class="button button--outline"
          href="{{ $reviewsUrl }}"
          target="_blank"
          rel="noopener noreferrer"
        >
          Read all Google reviews
        </a>
      </div>
    @endif
  </div>
</section>
