@extends('layouts.app')

@section('content')
  @while (have_posts())
    @php
      the_post();
      $shootTypes = get_the_terms(get_the_ID(), 'shoot_type');
    @endphp

    <article class="site-section story">
      <header class="site-container site-container--reading story__header">
        @if ($shootTypes && !is_wp_error($shootTypes))
          <p class="eyebrow">
            {{ $shootTypes[0]->name }}
          </p>
        @endif

        <h1 class="title title--page">
          {{ get_the_title() }}
        </h1>
      </header>

      @if (has_post_thumbnail())
        <div class="site-container story__hero">
          {!! get_the_post_thumbnail(
              get_the_ID(),
              'full',
              ['class' => 'story__hero-image']
          ) !!}
        </div>
      @endif

      <div class="site-container site-container--content story__content">
        @php
          the_content();
        @endphp
      </div>
    </article>
  @endwhile
@endsection
