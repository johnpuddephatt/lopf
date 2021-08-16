@include('svg-paths')
@include('partials.site-header', ['alternative_header' => $alternative_header ?? false ])

<main id="main" class="main">
  @yield('content')
</main>

@hasSection('sidebar')
<aside class="sidebar">
  @yield('sidebar')
</aside>
@endif

@include('partials.site-footer')