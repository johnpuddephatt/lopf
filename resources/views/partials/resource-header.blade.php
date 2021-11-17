<div>
  <div class="container mt-12 xl:max-w-5xl">

    <div>

      <div class="inline-flex mt-12 mb-4 text-xl text-gray-500 md:mb-6">
        <a class="" href="/">Home</a>
        <span class="px-3">&gt;</span>
        <a class="" href="/resources">Resources</a>
        <span class="px-3">&gt;</span>

        @if($resource_types)
        <a href="{{ get_term_link($resource_types[0]->term_id, 'resourcetype') }}">
          {!! $resource_types[0]->name !!}
        </a>
        @endif
      </div>



      <h2 class="font-serif text-6xl text-blue">
        {!! $title !!}
      </h2>

      <div class="flex flex-col gap-4 mt-4 text-lg md:flex-row">
        @if(get_field("date"))
        <div class="text-gray-600">
          {{ get_field( "date", $post_id ?? null ) }} </div>
        @endif
        @if(get_field("publisher") && get_field("date"))
        <span class="hidden text-gray-300 md:block">&mdash;</span>
        @endif
        @if(get_field("publisher"))
        <div>
          {{ get_field( "publisher", $post_id ?? null ) }} </div>
        @endif
      </div>

      @if(!empty($post->post_excerpt))
      <p class="max-w-xl mt-8 text-xl font-extrabold leading-snug tracking-tight md:text-2xl">{!! $post->post_excerpt
        !!}</p>
      @endif

      @if($resource_keylearnings)
      <div class="flex items-center gap-2 mt-6">
        <span>Key learnings:</span>
        @foreach($resource_keylearnings as $keylearning)
        <a class="px-6 py-2 bg-gray-100 rounded-full"
          href="{{ get_term_link($keylearning->term_id, 'resourcekeylearning') }}">
          {{ $keylearning->name }}
        </a>
        @endforeach
      </div>
      @endif

    </div>
  </div>
</div>