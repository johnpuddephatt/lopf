@include('svg-paths')
@include('partials.site-header', ['alternative_header' => $alternative_header ?? false ])

<main id="main" class="w-screen overflow-x-hidden main">
  @yield('content')
</main>

@include('partials.site-footer')