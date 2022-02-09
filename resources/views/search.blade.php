@extends('layouts.app')

@section('content')
@include('partials.page-header')

<div class="container min-h-screen my-12 xl:max-w-5xl">
  @if (! have_posts())
  <x-alert type="warning" class="mb-16">
    {!! __('Sorry, no results were found.', 'sage') !!}
  </x-alert>

  {!! get_search_form(false) !!}
  @endif

  <div class="space-y-16">
    @php global $wp_query @endphp
    @if($wp_query->found_posts)
      <div class="max-w-3xl text-right">Found {{ $wp_query->found_posts }} results</div>
    @endif
    @while(have_posts()) @php(the_post())
    @if(isset($_GET['post_type']) && $_GET['post_type'] == 'resource')
    @include('partials.resource-card')
    @elseif(isset($_GET['post_type']) && $_GET['post_type'] == 'post')
    @include('partials.post-card')
    @else
    @include('partials.content-search')
    @endif
    @endwhile
  </div>

  {!! the_posts_pagination() !!}
</div>
@endsection