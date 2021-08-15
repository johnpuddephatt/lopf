{{--
  Template Name: Full-width Template
--}}
@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())

<div class="flex flex-row w-full border-t">
  @include('partials.page-sidebar')
  <div class="flex-1">
    @include('partials.page-header')

    <article @php(post_class())>

      <div class="w-full max-w-none md:mt-24">
        @php(the_content())
      </div>

    </article>

    @include('partials.page-siblings')
  </div>
</div>


@endwhile
@endsection