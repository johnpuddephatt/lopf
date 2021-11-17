<div>
  <div class="container max-w-5xl mb-24 mt-36">

    @if(has_post_thumbnail($post && isset($post->ID) ? $post->ID : '') &&
    isset(wp_get_attachment_metadata(get_post_thumbnail_id($post && isset($post->ID) ? $post->ID :
    ''))['sizes']['square']))
    <div class="ml-auto w-80 overlay -mb-12 @if(isset($parent)) md:-mb-24 @endif">
      {!! get_the_post_thumbnail(isset($post->ID) ? $post->ID : '', 'square-s', ['class' => "object-cover object-center
      clip-teardrop w-full
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


      @if(get_the_author_meta('ID') != 1)
      <div class="flex items-center py-2 mt-8">
        {!! get_avatar(get_the_author_meta('ID'), 32, null, 'Profile image for ' . get_the_author(), [
        "class" => "object-cover w-10 h-10 mr-2 rounded-full"
        ]) !!}
        <div class="leading-tight">
          <p class="text-sm font-semibold tracking-tight text-black">
            <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
              {{ get_the_author() }}
            </a>
          </p>
          @if(get_the_field('role', 'user_' . get_the_author_meta('ID')))
          <p class="text-xs font-normal tracking-tight text-gray-400">
            {{ the_field('role', 'user_' . get_the_author_meta('ID')) }}
          </p>
          @endif
        </div>
      </div>
      @endif


    </div>
  </div>
</div>