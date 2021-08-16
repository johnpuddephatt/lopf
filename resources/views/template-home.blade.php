{{--
  Template Name: Home
--}}

@extends('layouts.app')

@section('content')
<div class="relative pr-8 bg-sky">
  <div
    class="container z-10 flex flex-col-reverse items-center pr-0 mx-auto max-w-7xl min-h-header-sm lg:min-h-header md:flex-row">

    <div class="max-w-4xl pb-24 md:flex-1 lg:pb-0">

      <h2 class="text-5xl font-bold leading-none lg:leading-none lg:text-6xl text-purple">{{ $title }}</h2>

      <p class="mt-8 text-xl antialiased font-semibold text-max-w-xl">{!! $subtitle
        !!}</p>

    </div>

    <div class="relative flex-none w-1/2 mb-20 ml-auto -mr-8 lg:my-0 lg:pl-40 ">
      <div class="overlay">
        {!! $hero_image !!}
      </div>

    </div>

  </div>
</div>
@endsection