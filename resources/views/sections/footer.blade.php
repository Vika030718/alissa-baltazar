<footer class="site-footer">
  <div class="site-footer__inner">

    <div class="site-footer__brand">
    
    @if (has_custom_logo())
      {!! get_custom_logo() !!}
    @else
      <a href="{{ home_url('/') }}">
        {!! $siteName !!}
      </a>
    @endif


      <p class="site-footer__copyright">
        © {{ date('Y') }} Alissa Baltazar Photography
      </p>
    </div>

    <nav class="site-footer__nav" aria-label="Footer navigation">
      <a href="{{ home_url('/weddings/') }}">Weddings</a>
      <a href="{{ home_url('/couples/') }}">Couples</a>
      <a href="{{ home_url('/branding/') }}">Branding</a>
      <a href="{{ home_url('/journal/') }}">Journal</a>
      <a href="{{ home_url('/contact/') }}">Contact</a>
    </nav>

    <div class="site-footer__social">
      <a href="#" target="_blank" rel="noopener noreferrer">Instagram</a>
      <a href="#" target="_blank" rel="noopener noreferrer">Pinterest</a>
      <a href="#" target="_blank" rel="noopener noreferrer">Google Reviews</a>
    </div>

  </div>
</footer>