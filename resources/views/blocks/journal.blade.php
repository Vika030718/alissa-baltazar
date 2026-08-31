<section class="journal">
  <div class="journal__inner">

    <header class="journal__header">
      @if ($eyebrow)
        <p class="journal__eyebrow">
          {{ $eyebrow }}
        </p>
      @endif

      @if ($heading)
        <h2 class="journal__heading">
          {{ $heading }}
        </h2>
      @endif
    </header>

    @if (!empty($posts))
      <div class="journal__grid">
        @foreach ($posts as $post)
          <article class="journal__card">

            <a
              class="journal__image-link"
              href="{{ $post['url'] }}"
            >
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
              <p class="journal__category">
                {{ $post['category'] }}
              </p>
            @endif

            <h3 class="journal__title">
              <a href="{{ $post['url'] }}">
                {{ $post['title'] }}
              </a>
            </h3>

            <a
              class="journal__link"
              href="{{ $post['url'] }}"
            >
              Read Article
            </a>

          </article>
        @endforeach
      </div>
    @endif

  </div>
</section>