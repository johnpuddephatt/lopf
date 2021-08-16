@extends('layouts.app', ['alternative_header' => true])

@section('content')

@include('partials.section-header', ['background' => 'bg-orange', 'text' => 'text-blue', 'pretext' =>
'text-purple'])

<div class="container max-w-5xl px-4 py-48 mx-auto">
  @if (! have_posts())
  <x-alert type="warning">
    {!! __('Sorry, no results were found.', 'sage') !!}
  </x-alert>

  {!! get_search_form(false) !!}
  @endif


  @while(have_posts()) @php(the_post())
  @include('partials.post-card')
  @endwhile

  {!! get_the_posts_navigation() !!}
</div>

@endsection