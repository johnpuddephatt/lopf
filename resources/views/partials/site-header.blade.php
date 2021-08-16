<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

<a href="{{ home_url('/') }}" class="absolute top-0 left-0 z-50 ">
  <x-logo :text="$alternative_header ? 'blue': 'sky'" :background="$alternative_header ? 'sky': 'blue'" />
</a>

<div class="py-12 text-right lg:hidden">
  <div class="container">
    Menu
  </div>
</div>

<div class="fixed top-0 bottom-0 z-40 w-screen left-full pt-60 lg:pt-0 bg-sky md:static md:bg-transparent">

  @if(!empty($secondaryNavigation))
  <header class="lg:border-b border-blue-lighter">
    <div class="container justify-end px-0 py-1 lg:flex text-blue-light xl:text-lg">

      {!! $secondaryNavigation !!}
    </div>
  </header>
  @endif

  @if(!empty($primaryNavigation))
  <nav class="container justify-end px-0 py-12 lg:flex text-blue xl:text-2xl 2xl:text-3xl md:text-base">
    {!! $primaryNavigation !!}
  </nav>
  @endif

</div>