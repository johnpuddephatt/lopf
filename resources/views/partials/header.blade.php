<div>
  <div class="container max-w-5xl mb-24 mt-36">

    @if(has_post_thumbnail($post && isset($post->ID) ? $post->ID : '') &&
    isset(wp_get_attachment_metadata(get_post_thumbnail_id($post && isset($post->ID) ? $post->ID :
    ''))['sizes']['square']))
    <div class="ml-auto w-80 overlay -mb-12 @if(isset($parent)) md:-mb-24 @endif">
      {!! get_the_post_thumbnail(isset($post->ID) ? $post->ID : '', 'square-s', ['class' => "clip-teardrop w-full
      md:w-full"]) !!}
    </div>
    @endif

    <div class="">

      @if(isset($post) && isset($post->post_type) && $post->post_type == 'post')
      <div class="mb-4 text-xl font-bold md:text-2xl md:mb-8">{{ get_the_date() }}</div>
      @endif


      <h2 class="max-w-3xl font-serif text-5xl xl:text-6xl text-blue">
        {!! $title !!}
      </h2>

      @if(!empty($post->post_excerpt))
      <p class="max-w-xl mt-8 text-xl font-bold leading-tight tracking-tight md:text-2xl">{!! $post->post_excerpt
        !!}</p>
      @endif


    </div>
  </div>
</div>