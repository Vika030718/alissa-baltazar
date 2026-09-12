<section class="site-section site-section--spaced site-section--border-bottom journal">
  <div class="site-container journal__inner">
    <header class="journal__header">
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

    @if (!empty($posts))
      <div class="journal__grid">
        @foreach ($posts as $post)
          <article class="journal__card">
            <a class="journal__image-link" href="{{ $post['url'] }}">
              @if ($post['imageId'])
                {!! wp_get_attachment_image(
                    $post['imageId'],
                    'large',
                    false,
                    ['class' => 'journal__image']
                ) !!}
              @endif
            </a>

            @if ($post['category'])
              <p class="meta-label">
                {{ $post['category'] }}
              </p>
            @endif

            <h3 class="title title--card">
              <a href="{{ $post['url'] }}">
                {{ $post['title'] }}
              </a>
            </h3>

            <a class="text-link" href="{{ $post['url'] }}">
              Read Article
            </a>
          </article>
        @endforeach
      </div>
    @endif
  </div>
</section>
