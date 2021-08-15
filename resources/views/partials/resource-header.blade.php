<div>
  <div class="container max-w-5xl mt-12">

    <div>

      <div class="inline-flex mt-12 mb-4 text-xl text-gray-500 md:mb-6">
        <a class="" href="/">Home</a>
        <span class="px-3">&gt;</span>
        <a class="" href="/resources">Resources</a>
        <span class="px-3">&gt;</span>

        @if($types)

        <a href="{{ get_term_link($types[0]->term_id, 'resourcetype') }}">
          {{ $types[0]->name }}
        </a>
        @endif
      </div>



      <h2 class="font-serif text-6xl text-blue">
        {!! $title !!}
      </h2>

      @if($date)
      <p>{{ $date }}</p>
      @endif

      @if(!empty($post->post_excerpt))
      <p class="max-w-xl mt-8 text-xl font-extrabold leading-snug tracking-tight md:text-2xl">{!! $post->post_excerpt
        !!}</p>
      @endif

      <div class="mt-6">
        @foreach($keylearnings as $keylearning)
        <x-button href="{{ get_term_link($keylearning->term_id, 'resourcekeylearning') }}">
          {{ $keylearning->name }}
        </x-button>
        @endforeach
      </div>

    </div>
  </div>
</div>