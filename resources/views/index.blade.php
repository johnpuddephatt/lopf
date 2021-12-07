@extends('layouts.app', ['alternative_header' => true])

@section('content')

@include('partials.section-header', ['background' => 'bg-orange', 'text' => 'text-blue', 'pretext' =>
'text-purple'])

<div class="container px-4 py-24 mx-auto xl:max-w-5xl">
  @if (! have_posts())
  <x-alert type="warning">
    {!! __('Sorry, no results were found.', 'sage') !!}
  </x-alert>
  @endif

  <form class="max-w-3xl mx-auto mb-24" role="search" action="{{ home_url('/') }}" method="get" id="searchform">
    <div class="flex flex-wrap px-8 py-12 space-y-2 bg-orange-lightest lg:space-y-0 lg:space-x-2 lg:flex-nowrap">
      <input type="text" aria-label="Text to search for" name="s" placeholder="Search news"
        class="w-full px-3 py-2 text-xl leading-tight text-gray-700 border rounded appearance-none lg:text-2xl focus:outline-none focus:shadow-outline" />
      <input
        class="inline-flex w-full px-4 py-2 text-xl font-semibold text-center border-2 rounded appearance-none lg:w-auto lg:text-2xl text-blue border-blue focus:outline-none hover:border-blue-light"
        type="submit" alt="Search" value="Search" />
    </div>
  </form>

  <div class="space-y-8 xl:space-y-16">
    @while(have_posts()) @php(the_post())
    @include('partials.post-card')
    @endwhile
  </div>

  <div class="mt-16">
    {!! get_the_posts_navigation() !!}
  </div>
</div>

@endsection