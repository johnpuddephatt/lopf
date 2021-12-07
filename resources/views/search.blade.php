@extends('layouts.app')

@section('content')
@include('partials.page-header')

<div class="container min-h-screen my-12 xl:max-w-5xl">
  @if (! have_posts())
  <x-alert type="warning">
    {!! __('Sorry, no results were found.', 'sage') !!}
  </x-alert>

  {!! get_search_form(false) !!}
  @endif

  <div class="space-y-16">
    @while(have_posts()) @php(the_post())
    @if(isset($_GET['post_type']))
    @include('partials.resource-card')
    @else
    @include('partials.post-card')
    @endif
    @endwhile
  </div>

  {!! get_the_posts_navigation() !!}
</div>
@endsection