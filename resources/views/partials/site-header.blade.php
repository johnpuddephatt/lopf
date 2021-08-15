@if(!empty($secondaryNavigation))
<header class="border-b text-blue-light border-blue-lighter">
  <div class="container flex flex-col flex-wrap items-center justify-end px-0 py-1 xl:text-lg md:flex-row">
    <a class="sr-only focus:not-sr-only" href="#main">
      {{ __('Skip to content') }}
    </a>
    {!! $secondaryNavigation !!}
  </div>
</header>
@endif

<header class="z-20 text-blue">
  <div class="container flex flex-col flex-wrap items-center px-0 py-12 md:flex-row">
    <a href="{{ home_url('/') }}" class="absolute top-0 left-0 z-20 ">

      <x-logo :text="$alternative_header ? 'blue': 'sky'" :background="$alternative_header ? 'sky': 'blue'" />
    </a>
    @if(!empty($primaryNavigation))
    <nav class="flex flex-wrap items-center justify-center xl:text-2xl 2xl:text-3xl md:text-base md:ml-auto">
      {!! $primaryNavigation !!}
    </nav>
    @endif
  </div>
</header>