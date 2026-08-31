@if ($eyebrow || $statement)
  <section class="philosophy">
    <div class="philosophy__inner">

      @if ($eyebrow)
        <p class="philosophy__eyebrow">
          {{ $eyebrow }}
        </p>
      @endif

      @if ($statement)
        <h2 class="philosophy__statement">
          {{ $statement }}
        </h2>
      @endif

    </div>
  </section>
@endif