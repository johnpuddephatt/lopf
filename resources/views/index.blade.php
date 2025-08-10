@extends('layouts.app', ['alternative_header' => true])

@section('content')

@include('partials.section-header', ['background' => 'bg-blue', 'text' => 'text-sky', 'pretext' =>
'text-white'])

<div class="container  max-w-6xl my-8 lg:my-12">

    <div class="flex justify-center flex-wrap text-blue font-semibold lg:text-xl items-end gap-3 lg:gap-6 xl:gap-8">
    <div class="pb-1 border-b-2 hidden lg:block border-transparent">Filter by:</div>
      <a href="{{ home_url('/news') }}" class="{{ !isset($_GET['category']) || $_GET['category'] === '' ? ' !border-blue' : 'border-transparent' }} inline-flex items-center  py-1    hover:border-blue-light border-b-2  focus:outline-none">
        All
      </a>
@foreach(['news', 'events', 'research', 'funding', 'training'] as $category)
      <a href="{{ home_url('/news/') . '?category=' . $category }}" class="{{ isset($_GET['category']) && $_GET['category'] === $category ? ' border-blue' : 'border-transparent' }}   py-1  flex flex-col border-b-2  items-center   hover:border-blue-light focus:outline-none">
      <div class="rounded-full mb-1 p-1.5 lg:p-2 {{ [
            'news' => 'bg-sky-lightest',
            'events' => 'bg-pink-lightest',
            'research' => 'bg-orange-lightest',
            'funding' => 'bg-blue-lightest',
            'training' => 'bg-green-lightest'
        ][$category] ?? 'bg-sky-light' }}">
              @includeIf('components.icon.category-' . $category, ['class' => 'w-6 h-6 lg:w-8 lg:h-8 '])
      </div>


        {{ ucfirst($category) }}
      </a>
@endforeach

      </div>
  </div>

  <form class="bg-orange-lightest " role="search" action="{{ home_url('/') }}" method="get" id="searchform">
    <input type="hidden" name="post_type" value="post" />
    <div class="max-w-3xl mx-auto flex flex-wrap px-8 py-12 space-y-2  lg:space-y-0 lg:space-x-2 lg:flex-nowrap">
      <input type="text" aria-label="Text to search for" name="s" placeholder="Search news"
        class="w-full px-3 py-2 text-xl leading-tight border-transparent text-gray-700  rounded appearance-none lg:text-2xl focus:outline-none focus:shadow-outline" />
      <input
        class="inline-flex w-full px-6 pb-1.5  py-2 text-xl font-semibold text-center border-2 border-blue rounded appearance-none lg:w-auto  text-white bg-blue focus:outline-none hover:border-blue-light"
        type="submit" alt="Search" value="Search" />
    </div>
  </form>

<div class="container px-4 py-24 mx-auto xl:max-w-5xl">

@if(isset($_GET['category']))
  <a class="inline-flex mb-12 border-2 gap-2 text-lg items-center font-semibold hover:bg-blue-lightest text-blue border-blue p-2" href="{{ home_url('/news') }}">
 Only showing {{ $_GET['category'] }} articles

  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>

  </a>
@endif
  @if (! have_posts())
  <x-alert type="warning">
    {!! __('Sorry, no results were found.', 'sage') !!}
  </x-alert>
  @endif



  <div class="grid gap-8 lg:grid-cols-2 xl:grid-cols-3">
  @php($index = 0)
    @while(have_posts()) @php(the_post())
    @php($index++)
    @include('partials.post-card-new')

    
    @if($index === 6)
    <div class="col-span-1 my-16 lg:col-span-2 xl:col-span-3  relative"><div class=" z-10 flex flex-col-reverse items-center p-4 py-12 lg:py-4 lg:px-16  mx-auto text-blue  bg-sky max-w-7xl  md:flex-row"><div class="xl:max-w-5xl md:flex-1">
     <h2 class="max-w-xl mb-2 lg:mt-8 text-3xl lg:text-5xl leading-none lg:leading-none antialiased font-bold">
        Got something to share?</h2>
        <p class="text-lg mb-8">If you have something newsworthy to share, we want to hear from you!</p>


        <a href="/send-us-your-news" class=" px-8 py-2 text-lg font-bold border-2 rounded-2xl border-blue text-blue">
      Send us your news or events
      </a>
        </div> <div class="relative flex-1 w-48 mb-4 ml-auto lg:mb-0 lg:max-w-none lg:ml-16  pattern">
        <img width="640" height="420" src="https://images.unsplash.com/photo-1593804863197-0a95c8ebef64?ixid=MnwyNjQwOTh8MHwxfGFsbHx8fHx8fHx8fDE2MzYzNzc3MTk&amp;ixlib=rb-1.2.1&amp;fm=jpg&amp;q=85&amp;fit=crop&amp;w=640&amp;h=420" alt="woman in blue and white floral long sleeve shirt holding white ceramic mug" decoding="async" fetchpriority="high" class="
      w-full rounded-full aspect-square object-cover
       wp-post-image"></div></div></div>
    @endif
    @endwhile
  </div>

  <div class="mt-16">
    {!! get_the_posts_navigation() !!}
  </div>
</div>

@endsection