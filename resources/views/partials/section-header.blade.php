<div class="relative pr-8">
  <div
    class="container z-10 flex flex-col-reverse items-end p-16 pr-0 mx-auto text-white rounded-tr-giant {{ $background ?? 'bg-blue' }} max-w-7xl min-h-header-sm lg:min-h-header md:flex-row">

    <div class="max-w-5xl md:flex-1">

      <h2 class="font-serif text-4xl antialiased {{ $pretext ?? 'text-white' }}">{{ $post->post_title }}</h2>

      @if(!empty($post->post_excerpt))
      <p class="max-w-xl mt-8 text-6xl leading-none lg:leading-none antialiased font-bold {{ $text ?? 'text-sky' }}">{!!
        $post->post_excerpt
        !!}</p>
      @endif
    </div>

    @if(has_post_thumbnail(isset($post->ID) ? $post->ID : '') &&
    isset(wp_get_attachment_metadata(get_post_thumbnail_id($post->ID))['sizes']['twothirds']))
    <div class="relative flex-1 pl-16 -mr-8 pattern">
      {!! get_the_post_thumbnail(isset($post->ID) ? $post->ID : '', 'twothirds', ['class' => "
      w-full
      "]) !!}
    </div>
    @endif
  </div>
</div>