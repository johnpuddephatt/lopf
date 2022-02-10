@extends('layouts.app')

@section('content')
<div class="flex flex-row w-full border-t">
  @include('partials.resource-sidebar')
  <div class="flex-1">
    <div class="container flex flex-row my-12 xl:max-w-5xl">

      <div>

        <div class="inline-flex mt-12 mb-4 text-gray-500 lg:text-xl md:mb-6">
          <a class="" href="/">Home</a>
          <span class="px-3">&gt;</span>
          <a class="" href="/resources">Resources</a>
        </div>

        <h2 class="font-serif text-4xl lg:text-5xl xl:text-6xl text-blue">
          {!! get_queried_object()->name !!}
        </h2>

        <p class="max-w-xl mt-8 text-lg font-medium leading-snug md:text-xl">{!!
          get_queried_object()->description !!}</p>

        <div class="mt-8 prose">
          {!! get_field('content', get_queried_object()->taxonomy . '_' . get_queried_object()->term_id) !!}
        </div>
      </div>

      @svg('icons.' . get_field('icon', get_queried_object()->taxonomy . '_' . get_queried_object()->term_id),'w-48
      h-48 mt-12 ml-auto' )

    </div>
    <div class="bg-gray-100">
      <div class="container py-24 space-y-8 xl:max-w-5xl">

      @php $wp_the_query = new WP_Query() @endphp
      <div class="max-w-3xl text-right">
        Showing {{ get_queried_object()->count }} resources.
      </div>

        @if (! have_posts())

        <x-alert type="warning">
          {!! __('Sorry, no matching resources were found.', 'sage') !!}
        </x-alert>

        @endif

        @while(have_posts()) @php(the_post())
          @include('partials.resource-card')
        @endwhile

        {!! the_posts_pagination() !!}
      </div>
      
    </div>
  </div>

</div>

@endsection