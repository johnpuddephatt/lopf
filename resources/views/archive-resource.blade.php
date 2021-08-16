@extends('layouts.app')

@section('content')

@php(the_post())

@include('partials.section-header', ['background' => 'bg-sky', 'text' => 'text-purple', 'pretext' => 'text-blue' ])

<div class="container ">
  <form class="flex max-w-3xl p-8 mx-auto my-16 space-x-2 bg-blue-lightest" role="search" action="{{ home_url('/') }}"
    method="get" id="searchform">
    <input type="text" name="s" placeholder="Search resources"
      class="w-full px-3 py-2 text-2xl leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline" />
    <input type="hidden" name="post_type" value="resource" />
    <input
      class="inline-flex px-6 py-2 text-2xl font-bold border-2 text-violet-700 border-violet-600 focus:outline-none hover:border-violet-500"
      type="submit" alt="Search" value="Search" />
  </form>

  <div class="flex flex-col max-w-3xl py-12 mx-auto mb-12 space-y-12">
    <h2 class="mt-2 mb-8 text-4xl font-bold text-blue">Browse by type</h2>

    <div class="space-y-20">
      @foreach($types as $key => $type)
      <a href="{{ get_term_link($type->term_id, 'resourcetype') }}" @php(post_class('flex content-center flex-row
        space-x-12'))>

        @svg('icons.' . get_field('icon', 'resourcetype_' . $type->term_id), 'flex-none w-40 h-40')
        <div>
          <h3 class="mt-2 mb-4 text-3xl font-bold text-blue">{{ $type->name }}</h3>
          <p class="text-lg">{{ $type->description}}</p>
          <p class="mt-4 text-lg font-bold text-blue">View</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>


  <div class="container flex flex-col max-w-3xl pb-12 mx-auto mb-24 space-y-12">
    <h2 class="mt-2 mb-8 text-4xl font-bold text-blue">Browse by key learning</h2>
    <div class="space-y-20">
      @foreach($keylearnings as $key => $keylearning)
      <a href="{{ get_term_link($keylearning->term_id, 'resourcekeylearning') }}" @php(post_class('flex content-center
        flex-row space-x-12'))>
        @svg('icons.' . get_field('icon', 'resourcekeylearning_' . $keylearning->term_id), 'flex-none w-40 h-40')
        <div>
          <h3 class="mt-2 mb-4 text-3xl font-bold text-blue">{{ $keylearning->name }}</h3>
          <p class="text-lg">{{ $keylearning->description}}</p>
          <p class="mt-4 text-lg font-bold text-blue">View</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>

</div>
@endsection