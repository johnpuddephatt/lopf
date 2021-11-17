<div>
  <div class="container mt-12 xl:max-w-5xl">
    @if(has_post_thumbnail($post && isset($post->ID) ? $post->ID : '') &&
    isset(wp_get_attachment_metadata(get_post_thumbnail_id($post && isset($post->ID) ? $post->ID :
    ''))['sizes']['square']))
    <div class="ml-auto w-80 overlay @if(isset($parent)) -mb-12 md:-mb-24 @else -mb-12 @endif">
      {!! get_the_post_thumbnail(isset($post->ID) ? $post->ID : '', 'square-s', ['class' => "clip-teardrop w-full
      md:w-full"]) !!}
    </div>
    @endif

    <div class="">

      @if(isset($post) && isset($post->post_type) && $post->post_type == 'post')
      <div class="mb-4 text-xl font-bold md:text-2xl md:mb-8">{{ get_the_date() }}</div>
      @elseif(isset($parent))
      <div class="inline-flex mt-12 mb-4 text-xl text-gray-500 md:mb-6">
        <a class="" href="/">Home</a>
        <span class="px-3">&gt;</span>
        @if(isset($parent))
        <a class="" href="/projects">Projects</a>
        <span class="px-3">&gt;</span>
        @endif
        <a class="" href="{{ $parent->permalink}}">{!! $parent->title !!}</a>
      </div>
      @endif


      <h2 class="max-w-3xl font-serif text-6xl text-blue">
        {!! $title !!}
      </h2>

      @if(!empty($post->post_excerpt))
      <p class="max-w-xl mt-8 text-xl font-bold leading-snug tracking-tight md:text-2xl">{!! $post->post_excerpt
        !!}</p>
      @endif


    </div>
  </div>
</div>