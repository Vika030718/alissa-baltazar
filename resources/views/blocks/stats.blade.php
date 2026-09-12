@if (!empty($stats))
  <section class="site-section site-section--border-top site-section--border-bottom stats">
    <div class="site-container stats__inner">
      @foreach ($stats as $stat)
        <div class="stats__item">
          @if (!empty($stat['value']))
            <div class="stats__value">
              {{ $stat['value'] }}
            </div>
          @endif

          @if (!empty($stat['label']))
            <div class="meta-label">
              {{ $stat['label'] }}
            </div>
          @endif
        </div>
      @endforeach
    </div>
  </section>
@endif
