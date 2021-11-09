<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

<a href="{{ home_url('/') }}" class="absolute top-0 left-0 z-50 ">
  <x-logo :text="$alternative_header ? 'blue': 'sky'" :background="$alternative_header ? 'sky': 'blue'" />
</a>

<div class="container py-12 text-right lg:hidden">
  <button id="main-menu-button"
    class="relative z-50 inline-block px-4 py-2 ml-auto font-semibold bg-white border-2 rounded text-blue border-blue">
    Menu
  </button>
</div>

<div id="main-menu"
  class="fixed top-0 bottom-0 z-40 w-screen overflow-y-auto lg:h-auto pt-36 left-full lg:pt-0 @if($alternative_header) bg-sky-lightest @else bg-sky @endif lg:static lg:bg-transparent">
  <div id="main-menu-container"
    class="flex flex-col-reverse justify-end mt-20 overflow-y-auto lg:block lg:mt-0 lg:h-auto">
    @if(!empty($secondaryNavigation)) <header class="lg:border-b border-blue-lighter">
      <div class="container justify-end px-0 py-1 text-right lg:flex text-blue lg:text-blue-light xl:text-lg">
        {!! $secondaryNavigation !!}
      </div>
    </header>
    @endif

    @if(!empty($primaryNavigation))
    <nav
      class="container justify-end px-0 py-6 text-right lg:py-12 lg:flex text-blue xl:text-2xl 2xl:text-3xl lg:text-xl">
      {!! $primaryNavigation !!}
    </nav>
    @endif
  </div>

</div>