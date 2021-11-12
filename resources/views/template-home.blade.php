{{--
Template Name: Home
--}}

@extends('layouts.app')

@section('content')
<div class="flex flex-col w-screen pb-12 space-y-12 overflow-x-hidden lg:mb-16 lg:space-y-16 2xl:mb-24 2xl:space-y-24">
  <div class="relative pr-8 bg-sky">
    <div
      class="container z-10 flex flex-col-reverse items-center pr-0 mx-auto max-w-7xl min-h-header-sm lg:min-h-header md:flex-row">

      <div class="max-w-4xl pb-24 md:flex-1 md:pb-0">

        <h2 class="text-4xl font-bold leading-none xl:text-6xl lg:leading-none lg:text-5xl text-purple">
          {!! $hero_title
          !!}</h2>

        <p class="mt-8 text-xl antialiased font-semibold text-max-w-xl">{!! $hero_subtitle
          !!}</p>

      </div>

      <div class="relative flex-none w-1/2 mb-20 ml-auto -mr-8 lg:my-0 md:pl-40 ">
        <div class="overlay">
          {!! $hero_image !!}
        </div>

      </div>

    </div>
  </div>


  @if($announcement_enabled)
  <div class="container max-w-6xl">
    <div
      class="flex flex-col items-start justify-between p-6 space-y-3 leading-tight border-l-8 lg:space-x-8 lg:space-y-0 lg:items-center lg:flex-row tracking-loose bg-pink-lightest border-pink">
      <div>
        <h3 class="text-xl font-bold">{!! $announcement_title ? $announcement_title : 'Announcement' !!}</h3>
        <p>{!! $announcement_text !!}</p>
      </div>
      <a href="{{ $announcement_link }}" class="px-8 py-2 text-lg font-bold border-2 rounded-2xl border-pink">
        {{ $announcement_linktext ? $announcement_linktext : 'read more' }}
      </a>
    </div>
  </div>
  @endif

  @if($groups_enabled)
  <div class="container flex flex-col items-center space-y-8 lg:space-x-16 lg:space-y-0 lg:flex-row max-w-7xl">
    <div class="flex-none w-2/5 py-12 text-center ">
      <img alt="Map icon" src="@asset('/images/map.svg')" />
    </div>
    <div class="flex flex-col items-start space-y-6">
      <h2 class="font-serif text-4xl 2xl:text-5xl text-blue">{!! $groups_title !!}</h2>
      <p>{!! $groups_description !!}</p>

      <a href="{{ $groups_link }}" class="px-8 py-2 text-lg font-bold border-2 rounded-2xl border-blue">
        {{ $groups_linktext ? $groups_linktext : 'read more' }}
      </a>
    </div>
  </div>
  @endif

  @if($blocks_enabled)

  <div class="container grid max-w-6xl grid-cols-1 gap-24 lg:grid-cols-2">

    @foreach($blocks as $block)
    <div class="flex flex-col space-y-8">
      <a href="{{ get_permalink($block->ID) }}">{!! get_the_post_thumbnail($block->ID, 'twothirds', ['class' => "rounded
        rounded-tr-big"]) !!}</a>
      <h3 class="text-3xl font-bold leading-tight text-purple"><a href="{{ get_permalink($block->ID) }}">{!!
          get_the_title($block->ID) !!}</a></h3>
      <div>
        {!! wp_trim_words(get_the_excerpt($block->ID), 30) !!}
      </div>
      <a class="text-lg font-bold text-blue" href="{{ get_permalink($block->ID) }}">Read more</a>
    </div>
    @endforeach
  </div>

  @endif

  <div class="container pt-32 border-t max-w-8xl">
    <h2 class="font-serif text-4xl 2xl:text-5xl text-blue">Latest posts</h2>
    <div class="grid grid-cols-1 gap-16 mt-16 lg:grid-cols-2">
      @foreach($posts as $post)
      @include('partials.post-card', [
      'hide_circles' => true,
      'post_id' => $post->ID
      ])
      @endforeach
    </div>
    <div class="mt-16 text-center">
      <a href="{{ get_permalink( get_option( 'page_for_posts' ) ) }}"
        class="inline-block px-8 py-2 text-lg font-bold border-2 rounded-2xl border-blue">
        see all posts
      </a>
    </div>
  </div>

  @if($research_enabled)
  <div class="container flex flex-col-reverse items-center max-w-5xl space-y-8 lg:space-x-8 lg:space-y-0 lg:flex-row">
    <div class="flex flex-col items-start flex-1 space-y-6 ">
      <h2 class="font-serif text-4xl 2xl:text-5xl text-blue">{!! $research_title !!}</h2>
      <p>{!! $research_description !!}</p>
      <a href="{{ get_permalink(get_option('page_for_resources')) }}"
        class="px-8 py-2 text-lg font-bold border-2 rounded-2xl border-blue">
        explore our resources
      </a>
    </div>
    <div class="flex-none w-2/5 py-12 text-center">
      <img alt="Icon of clipboard" src="@asset('/images/resources.svg')" />
    </div>
  </div>
  @endif

  @if($join_enabled)
  <div class="container relative lg:pr-8">
    <div
      class="z-10 flex flex-col-reverse items-center px-8 pb-8 mx-auto text-white xl:pl-32 lg:py-16 lg:pr-0 rounded-bl-giant bg-purple min-h-header-sm lg:min-h-header md:flex-row">
      <div
        class="flex flex-col items-end space-y-8 text-right lg:text-left lg:items-start xl:max-w-5xl md:flex-1 md:flex-grow">
        <h2 class="font-serif text-2xl antialiased text-white lg:text-4xl">{!! $join_pretitle !!}</h2>
        <p class="max-w-xl text-4xl antialiased font-bold leading-none lg:text-6xl lg:leading-none text-sky">
          {!! $join_title !!}
        </p>
        <a href="/get-involved/become-a-member-organisation/"
          class="px-8 py-2 text-lg font-bold text-white border-2 border-white rounded-2xl">
          find out more
        </a>
      </div>
      <div
        class="relative flex-none max-w-xs mb-16 ml-auto -mr-16 lg:w-1/2 lg:mb-0 lg:max-w-none lg:ml-16 pattern pattern--alt">
        {!! $join_image !!}
      </div>
    </div>
  </div>
  @endif

  @if($signup_enabled)
  <div class="container flex justify-center w-full space-y-8 bg-signup lg:space-x-8 lg:space-y-0 lg:flex-row">
    <div class="flex flex-col items-center flex-1 max-w-2xl py-16 space-y-16 text-center">
      <h2 class="font-serif text-4xl leading-tight 2xl:leading-tight 2xl:text-5xl text-blue">{!! nl2br($signup_title)
        !!}</h2>
      <form method="POST"
        action="//timetoshineleeds.us1.list-manage.com/subscribe/post?u=37893676631f957b3e7e5b3f7&id=d4a417b661"
        class="flex flex-row w-full space-x-4">
        <input name="EMAIL" placeholder="Enter your email address" aria-label="Enter your email address"
          class="flex-1 w-full px-8 py-2 text-lg border-2 rounded-2xl border-blue" type="text" />
        <input type="submit" value="{{ $signup_buttontext }}"
          class="px-8 py-2 text-lg font-bold text-white lowercase bg-purple rounded-2xl" />
      </form>
      <p class="text-sm">By submitting this form you acknowledge that the information you provide will be
        transferred to our marketing platform (Mailchimp) for
        processing in accordance with their <a class="underline" href="https://mailchimp.com/legal/privacy/"
          target="_blank">Privacy
          Policy and Terms</a>.</p>
    </div>
  </div>
  @endif

</div> @endsection