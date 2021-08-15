<div>
  <div class="container max-w-3xl mt-12">

    <div class="inline-flex mt-12 mb-4 text-xl text-gray-500 md:mb-6">
      <a class="" href="/">Home</a>
      <span class="px-3">&gt;</span>
      <a class="" href="/groups">Groups</a>
      <span class="px-3">&gt;</span>
      <a class="" href="{{ $parent->permalink}}">{{ $parent->title}}</a>
    </div>

    <h2 class="font-serif text-6xl text-blue">
      {!! $title !!}
    </h2>

    @if(!empty($post->post_excerpt))
    <p class="max-w-xl mt-8 text-xl font-extrabold leading-snug tracking-tight md:text-2xl">
      {!! $post->post_excerpt !!}
    </p>
    @endif


  </div>
</div>