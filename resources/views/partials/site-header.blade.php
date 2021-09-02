<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

<a href="{{ home_url('/') }}" class="absolute top-0 left-0 z-50 ">
  <x-logo :text="$alternative_header ? 'blue': 'sky'" :background="$alternative_header ? 'sky': 'blue'" />
</a>

<div class="container py-12 text-right md:hidden">
  <div id="main-menu-button"
    class="relative z-50 inline-block px-4 py-2 ml-auto font-semibold bg-white border-2 rounded text-blue border-blue">
    Menu
  </div>
</div>

<div id="main-menu"
  class="fixed top-0 bottom-0 z-40 w-screen h-screen md:h-auto pt-36 left-full md:pt-0 @if($alternative_header) bg-sky-lightest @else bg-sky @endif md:static md:bg-transparent">
  <div id="main-menu-container"
    class="flex flex-col-reverse justify-end h-full mt-20 overflow-y-auto md:block md:mt-0 md:h-auto">
    @if(!empty($secondaryNavigation)) <header class="md:border-b border-blue-lighter">
      <div class="container justify-end px-0 py-1 md:flex text-blue md:text-blue-light xl:text-lg">
        {!! $secondaryNavigation !!}
      </div>
    </header>
    @endif

    @if(!empty($primaryNavigation))
    <nav class="container justify-end px-0 py-6 md:py-12 md:flex text-blue xl:text-2xl 2xl:text-3xl md:text-xl">
      {!! $primaryNavigation !!}
    </nav>
    @endif
  </div>

</div>