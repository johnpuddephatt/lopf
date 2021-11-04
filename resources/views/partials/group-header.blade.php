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


    @if($contact_details->phone)
    <p>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
      </svg>
      {{ $contact_details->phone }}
    </p>
    @endif

    @if($contact_details->email)
    <p>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
      </svg>
      <a href="mailto:{{ $contact_details->email }}">{{ $contact_details->email }}</a>
    </p>
    @endif

    @if($contact_details->website)
    <p>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
      </svg>
      <a href="{{ $contact_details->website }}">{{ $contact_details->website }}</a>
    </p>
    @endif

    @if($contact_details->facebook)
    <p>
      <a href="{{ $contact_details->facebook }}">{{ $contact_details->facebook }}</a>
    </p>
    @endif

    @if($contact_details->twitter)
    <p>
      <a href="http://twitter.com/{{ str_replace('@', '', $contact_details->twitter) }}">
        {{ $contact_details->twitter }}</a>
    </p>
    @endif


  </div>
</div>