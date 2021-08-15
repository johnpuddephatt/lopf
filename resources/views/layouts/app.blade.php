@include('svg-paths')
@include('partials.site-header', ['alternative_header' => $alternative_header ?? false ])
<div id="app" class="min-h-screen mx-auto text-black">

  <main id="main" class="main">
    @yield('content')
  </main>

  @hasSection('sidebar')
  <aside class="sidebar">
    @yield('sidebar')
  </aside>
  @endif

</div>
@include('partials.site-footer')