<div class="relative pt-12 -mb-40 md:pt-16 text-violet-900">
  <div class="absolute inset-0 bg-gray-950 clip-bottom-slant"></div>
  <div
    class="container relative z-10 flex flex-col-reverse items-center gap-4 px-4 mx-auto max-w-7xl min-h-header-sm lg:min-h-header md:gap-8 md:flex-row">

    <div class="max-w-5xl pb-28 md:flex-1 md:pb-40 md:my-auto">
      @if(isset($parent))
      <a class="inline-flex items-center pb-2 mb-8 text-xl font-extrabold border-b-4 md:text-3xl text-violet-200 border-violet-300"
        href="{{ $parent->permalink}}">{{ $parent->title}}</a>
      @else
      <hr class="mb-4 md:mb-8 border-violet-300">
      @endif


      <div class="items-center md:flex">
        @if(has_post_thumbnail(isset($post->ID) ? $post->ID : ''))
        <div
          class="w-16 h-16 p-3 mb-4 mr-3 bg-white rounded-full md:w-20 md:h-20 2xl:mr-4 2xl:p-6 2xl:w-28 2xl:h-28 md:mb-0">
          {!! get_the_post_thumbnail(isset($post->ID) ? $post->ID : '', 'square-s', ['class' => "h-full w-full"])
          !!}
        </div>
        @endif
        <x-heading size="4"
          :class="strlen($title) < 35 ? 'text-5xl md:text-6xl tracking-tighter 2xl:text-8xl text-white' : 'md:text-5xl tracking-tighter xl:text-6xl text-white'">
          {!! $title !!}
        </x-heading>
      </div>

      @if(!empty($post->post_excerpt))
      <p
        class="max-w-2xl text-gray-200 text-xl font-extrabold leading-snug tracking-tight md:text-2xl @if(has_post_thumbnail(isset($post->ID) ? $post->ID : '')) mt-6 @else mt-8 @endif">
        {!! $post->post_excerpt
        !!}</p>
      @endif
    </div>


  </div>
</div>