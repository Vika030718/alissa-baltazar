@extends('layouts.app')

@section('content')
  @while (have_posts())
    @php
      the_post();

      $shootTypes = get_the_terms(get_the_ID(), 'shoot_type');
    @endphp

    <article class="story">

      <header class="story__header">
        @if ($shootTypes && !is_wp_error($shootTypes))
          <p class="story__type">
            {{ $shootTypes[0]->name }}
          </p>
        @endif

        <h1 class="story__title">
          {{ get_the_title() }}
        </h1>
      </header>

      @if (has_post_thumbnail())
        <div class="story__hero">
          {!! get_the_post_thumbnail(
              get_the_ID(),
              'full',
              ['class' => 'story__hero-image']
          ) !!}
        </div>
      @endif

      <div class="story__content">
        @php
          the_content();
        @endphp
      </div>

    </article>
  @endwhile
@endsection