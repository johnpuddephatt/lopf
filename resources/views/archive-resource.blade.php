@extends('layouts.app')

@section('content')

@if(isset($_GET['all']))

@php query_posts([
'post_type' => 'resource',
'order' => isset($_GET['order']) ? $_GET['order'] : 'ASC',
'orderby' => isset($_GET['orderby']) ? $_GET['orderby'] : 'date'
]); @endphp



<div class="container ">
  <div class="flex flex-col max-w-3xl py-12 mx-auto mb-12 space-y-12">
    <div class="inline-flex mt-12 text-xl text-gray-500">
      <a class="" href="/">Home</a>
      <span class="px-3">&gt;</span>
      <a class="" href="/resources">Resources</a>
    </div>
    <h2 class="max-w-3xl font-serif text-6xl text-blue">
      All resources
    </h2>
    <div>
      <a href="?all&orderby=title&order=ASC"
        class="px-4 py-2 text-xl leading-loose rounded-full @if('?' . $_SERVER['QUERY_STRING'] == '?all&orderby=title&order=ASC') bg-blue text-white @else bg-sky-light @endif">Alphabetical</a>
      <a href="?all&orderby=post_date&order=DESC"
        class="px-4 py-2 text-xl leading-loose rounded-full @if('?' . $_SERVER['QUERY_STRING'] == '?all&orderby=post_date&order=DESC') bg-blue text-white @else bg-sky-light @endif">Newest
        first</a>
    </div>
    @while(have_posts()) @php(the_post())
    @include('partials.resource-card')
    @endwhile
  </div>
</div>

@else

@include('partials.section-header', ['background' => 'bg-sky', 'text' => 'text-purple', 'pretext' => 'text-blue' ])

<div class="container ">

  <form
    class="flex flex-wrap max-w-3xl p-8 mx-auto my-16 space-y-2 lg:space-y-0 lg:space-x-2 lg:flex-nowrap bg-blue-lightest"
    role="search" action="{{ home_url('/') }}" method="get" id="searchform">
    <input type="text" name="s" placeholder="Search resources"
      class="w-full px-3 py-2 text-xl leading-tight text-gray-700 border rounded shadow appearance-none lg:text-2xl focus:outline-none focus:shadow-outline" />
    <input type="hidden" name="post_type" value="resource" />
    <select class="w-full px-3 py-2 text-xl text-gray-700 border rounded shadow focus:outline-none focus:shadow-outline"
      name="post_resourcetype">
      @foreach($types as $key => $type)
      <option value="{{$type->term_id}}">{{ $type->name}}</option>
      @endforeach
    </select>
    <input
      class="inline-flex w-full px-4 py-2 text-xl font-semibold text-center border-2 rounded appearance-none lg:w-auto lg:text-2xl text-blue border-blue focus:outline-none hover:border-blue-light"
      type="submit" alt="Search" value="Search" />
  </form>

  <div class="flex flex-col max-w-3xl mx-auto mb-12 lg:space-y-12 lg:py-12">
    <h2 class="mt-2 mb-8 text-3xl font-bold lg:text-4xl text-blue">Browse all resources</h2>
    <a href="?all" class="flex flex-row items-center content-center space-x-4 md:items-start xl:space-x-12">
      @svg('icons.report', 'flex-none h-20 w-20 xl:w-40
      xl:h-40')
      <div>
        <h3 class="mt-2 text-2xl font-bold lg:text-3xl text-blue">View all</h3>
        <p class="hidden mt-4 md:block lg:text-lg">See all resources</p>
        <p class="hidden mt-4 text-lg font-bold md:block text-blue">View</p>
      </div>
    </a>
  </div>

  <div class="flex flex-col max-w-3xl py-12 mx-auto mb-12 lg:space-y-12">
    <h2 class="mt-2 mb-8 text-3xl font-bold lg:text-4xl text-blue">Browse by type</h2>

    <div class="space-y-10 lg:space-y-20">

      @foreach($types as $key => $type)
      <a href="{{ get_term_link($type->term_id, 'resourcetype') }}" @php(post_class('flex items-center md:items-start
        content-center flex-row space-x-4 xl:space-x-12'))>

        @svg('icons.' . get_field('icon', 'resourcetype_' . $type->term_id), 'flex-none h-20 w-20 xl:w-40
        xl:h-40')
        <div>
          <h3 class="mt-2 text-2xl font-bold lg:text-3xl text-blue">{{ $type->name }}</h3>
          <p class="hidden mt-4 md:block lg:text-lg">{{ $type->description}}</p>
          <p class="hidden mt-4 text-lg font-bold md:block text-blue">View</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>


  <div class="flex flex-col max-w-3xl pb-12 mx-auto mb-24 lg:space-y-12">
    <h2 class="mt-2 mb-8 text-3xl font-bold lg:text-4xl text-blue">Browse by key learning</h2>
    <div class="space-y-10 lg:space-y-20">
      @foreach($keylearnings as $key => $keylearning)
      <a href="{{ get_term_link($keylearning->term_id, 'resourcekeylearning') }}" @php(post_class('flex items-center
        md:items-start content-center flex-row space-x-4 xl:space-x-12'))>
        @svg('icons.' . get_field('icon', 'resourcekeylearning_' . $keylearning->term_id), 'flex-none h-20 w-20 xl:w-40
        xl:h-40')
        <div>
          <h3 class="mt-2 text-2xl font-bold lg:text-3xl text-blue">{{ $keylearning->name }}</h3>
          <p class="hidden mt-4 md:block lg:text-lg">{{ $keylearning->description}}</p>
          <p class="hidden mt-4 text-lg font-bold md:block text-blue">View</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>

</div>
@endif
@endsection