<header class="site-header">
  <div class="site-container site-header__inner">
    <div class="site-header__brand">
      @if (has_custom_logo())
        {!! get_custom_logo() !!}
      @else
        <a href="{{ home_url('/') }}">
          {!! $siteName !!}
        </a>
      @endif
    </div>

    @if (has_nav_menu('primary_navigation'))
      <nav
        class="site-header__nav"
        aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}"
      >
        {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'site-header__menu',
          'container' => false,
          'echo' => false,
        ]) !!}
      </nav>
    @endif

    <a class="button button--outline button--sm" href="{{ home_url('/contact/') }}">
      Inquire
    </a>
  </div>
</header>
