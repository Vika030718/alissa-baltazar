@if ($eyebrow || $statement)
  <section class="site-section site-section--border-bottom philosophy">
    <div class="site-container site-container--reading philosophy__inner">
      @if ($eyebrow)
        <p class="eyebrow">
          {{ $eyebrow }}
        </p>
      @endif

      @if ($statement)
        <h2 class="title title--statement">
          {{ $statement }}
        </h2>
      @endif
    </div>
  </section>
@endif
