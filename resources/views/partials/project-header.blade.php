<div>
  <div class="container mt-16 md:mt-12 xl:max-w-5xl">
    @if(has_post_thumbnail($post && isset($post->ID) ? $post->ID : '') &&
    isset(wp_get_attachment_metadata(get_post_thumbnail_id($post && isset($post->ID) ? $post->ID :
    ''))['sizes']['square']))
    <div class="ml-auto w-3/4 md:w-80 overlay @if(isset($parent)) md:-mb-24 @else md:-mb-12 @endif">
      {!! get_the_post_thumbnail(isset($post->ID) ? $post->ID : '', 'square-s', ['class' => "clip-teardrop w-full
      md:w-full"]) !!}
    </div>
    @endif

    <div class="">

      @if(isset($post) && isset($post->post_type) && $post->post_type == 'post')
      <div class="mb-4 text-xl font-bold md:text-2xl md:mb-8">{{ get_the_date() }}</div>
      @else
      <div class="inline-flex mt-12 mb-4 text-gray-500 lg:text-xl md:mb-6">
        <a class="" href="/">Home</a>
        <span class="px-3">&gt;</span>
        <a class="" href="/projects-and-campaigns">Projects & campaigns</a>
        @if(isset($parent))
        <span class="px-3">&gt;</span>
        <a class="" href="{{ $parent->permalink}}">{!! $parent->title !!}</a>
        @endif
      </div>
      @endif


      <h2 class="max-w-3xl font-serif text-4xl lg:text-5xl xl:text-6xl text-blue">
        {!! $title !!}
      </h2>

      @if(!empty($post->post_excerpt))
      <p class="max-w-xl mt-8 text-xl font-bold leading-snug tracking-tight md:text-2xl">{!! $post->post_excerpt
        !!}</p>
      @endif


    </div>
  </div>
</div>