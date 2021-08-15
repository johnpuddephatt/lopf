@extends('layouts.app')

@section('content')
@include('partials.page-header')

<div class="container max-w-5xl mt-12">
  @if (! have_posts())
  <x-alert type="warning">
    {!! __('Sorry, no results were found.', 'sage') !!}
  </x-alert>

  {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php(the_post())
  @if(isset($_GET['post_type']))
  @include('partials.resource-card')
  @else
  @include('partials.content-search')
  @endif
  @endwhile

  {!! get_the_posts_navigation() !!}
</div>
@endsection