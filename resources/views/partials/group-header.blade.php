<div>
  <div class="container max-w-3xl mt-12">

    <div class="inline-flex mt-12 mb-4 text-gray-500 lg:text-xl md:mb-6">
      <a class="" href="/">Home</a>
      <span class="px-3">&gt;</span>
      <a href="/activities-and-services/">Activities &amp; Services</a>
      <span class="px-3">&gt;</span>
      <a href="/activities-and-services/find-a-group-or-neighbourhood-network/">Find a group</a>
    </div>

    <h2 class="font-serif text-4xl lg:text-5xl xl:text-6xl text-blue">
      {!! $title !!}
    </h2>

    @if($neighbourhood_network)
    <p class="inline-block px-6 py-2 mt-4 text-lg font-normal rounded-md bg-orange-light">Neighbourhood
      Network
    </p>
    @endif

    @if(!empty($post->post_excerpt))
    <p class="max-w-xl mt-8 text-xl font-bold leading-snug tracking-tight md:text-2xl">
      {!! $post->post_excerpt !!}
    </p>
    @endif

    @if(isset($area_covered))
    <p class="flex py-3 text-lg item-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1 text-blue-lightest" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
      </svg>
      Area covered: {{ $area_covered }}</a>
    </p>
    @endif

    <div class="pt-12 divide-y divide-solid divide-sky-light">

      @if($contact_details->address)
      <p aria-label="Address" class="flex py-3 item-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1 text-blue-lightest" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        {{ $contact_details->address }}</a>
      </p>
      @endif



      @if($contact_details->phone)
      <p aria-label="Phone" class="flex py-3 item-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1 text-blue-lightest" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
        </svg>
        <a href="tel:{{ str_replace(' ', '', $contact_details->phone) }}">{{ $contact_details->phone }}</a>
      </p>
      @endif

      @if($contact_details->email)
      <p aria-label="Email" class="flex py-3 item-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1 text-blue-lightest" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
        </svg>
        <a href="mailto:{{ $contact_details->email }}">{{ $contact_details->email }}</a>
      </p>
      @endif

      @if($contact_details->website)
      <p aria-label="Website" class="flex py-3 item-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-1 text-blue-lightest" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
        </svg>
        <a target="_blank" href="{{ $contact_details->website }}">{{ str_replace('http://', '',
          str_replace('https://', '', $contact_details->website)) }}</a>
      </p>
      @endif

      @if($contact_details->facebook)
      <p aria-label="Facebook" class="flex py-3 item-center">
        <svg class="w-6 h-6 mr-1 text-blue-lightest" fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd"
            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
            clip-rule="evenodd"></path>
        </svg>
        <a target="_blank" href="https://facebook.com/{{ str_replace('@', '', $contact_details->facebook) }}">{{
          $contact_details->facebook }}</a>
      </p>
      @endif

      @if($contact_details->twitter)
      <p aria-label="Twitter" class="flex py-3 item-center">
        <svg class="w-6 h-6 mr-1 text-blue-lightest" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
          </path>
        </svg>
        <a target="_blank" href="https://twitter.com/{{ str_replace('@', '', $contact_details->twitter) }}">{{
          $contact_details->twitter }}</a>
      </p>
      @endif
    </div>
  </div>
</div>