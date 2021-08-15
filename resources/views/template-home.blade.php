{{--
  Template Name: Home
--}}

@extends('layouts.app')

@section('content')
<div class="relative pr-8 bg-sky">
  <div
    class="container z-10 flex flex-col-reverse items-center p-16 pr-0 mx-auto max-w-7xl min-h-header-sm lg:min-h-header md:flex-row">

    <div class="max-w-4xl md:flex-1">

      <h2 class="font-bold 2xl:text-6xl text-purple">{{ $title }}</h2>

      <p class="mt-8 text-xl antialiased font-semibold leading-tight text-max-w-xl">{!! $subtitle
        !!}</p>

    </div>

    <div class="relative flex-none w-1/2 pl-32 -mr-8 overlay ">
      {!! $hero_image !!}

    </div>

  </div>
</div>
@endsection