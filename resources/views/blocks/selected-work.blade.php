@if ($heading || !empty($stories))
  <section class="site-section site-section--spaced site-section--border-bottom selected-work">
    <div class="site-container selected-work__inner">
      <header class="selected-work__header">
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
      </header>

      @if (!empty($stories))
        <div class="selected-work__grid">
          @foreach ($stories as $index => $story)
            <article class="selected-work__card">
              <a class="selected-work__image-link" href="{{ $story['url'] }}">
                <span class="selected-work__number">
                  {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                </span>

                @if ($story['imageId'])
                  {!! wp_get_attachment_image(
                      $story['imageId'],
                      'large',
                      false,
                      ['class' => 'selected-work__image']
                  ) !!}
                @endif
              </a>

              @if ($story['type'])
                <p class="meta-label">
                  {{ $story['type'] }}
                </p>
              @endif

              <h3 class="title title--card">
                <a href="{{ $story['url'] }}">
                  {{ $story['title'] }}
                </a>
              </h3>

              <a class="text-link text-link--rule" href="{{ $story['url'] }}">
                View Story
              </a>
            </article>
          @endforeach
        </div>
      @endif
    </div>
  </section>
@endif
