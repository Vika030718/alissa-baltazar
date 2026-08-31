@if (!empty($stats))
  <section class="stats">
    <div class="stats__inner">
      @foreach ($stats as $stat)
        <div class="stats__item">
          @if (!empty($stat['value']))
            <div class="stats__value">
              {{ $stat['value'] }}
            </div>
          @endif

          @if (!empty($stat['label']))
            <div class="stats__label">
              {{ $stat['label'] }}
            </div>
          @endif
        </div>
      @endforeach
    </div>
  </section>
@endif