<div>
  <div class="container max-w-3xl mt-12">

    <h2 class="font-serif text-6xl text-blue">
      {!! $title !!}
    </h2>

    @if(!empty($post->post_excerpt))
    <p class="max-w-xl mt-8 text-xl font-extrabold leading-snug tracking-tight md:text-2xl">{!! $post->post_excerpt
      !!}</p>
    @endif


  </div>
</div>