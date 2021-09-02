<article @php(post_class('bg-purple-hexagons bg-no-repeat bg-1/2 bg-left-bottom'))>
  <div class="container max-w-5xl pb-32 mx-auto">
    <div class="flex flex-col gap-8 md:gap-16 lg:flex-row-reverse">

      <div class="max-w-screen-sm pt-8 md:pt-12 lg:w-1/4">
        <div class="sticky z-10 mx-auto bg-white md:p-4 b-96 top-16">
          <x-heading level="2" class="mb-4">Jump to</x-heading>

          <nav>

            <p class="mb-4 text-gray-600"><a href="#project-overview">Overview</a></p>

            {!! do_shortcode('[toc]') !!}

            @if($posts)
            <p class="mb-4 text-gray-600"><a href="#project-posts">Updates</a></p>
            @endif

            @if($resources)
            <p class="mb-4 text-gray-600"><a href="#project-resources">Resources</a></p>
            @endif

          </nav>

        </div>
      </div>

      <div class="md:mt-12 lg:px-0 lg:w-3/4">
        <div id="project-overview" class="prose xl:prose-lg">
          @php(the_content())
        </div>

      </div>

    </div>

    @if( $posts )
    <div id="project-posts" class="pt-16 mb-12">
      <h2 class="text-3xl font-bold text-blue">Updates</h2>
      <p class="mt-4 mb-16">The latest articles about <strong>{{ the_title() }}</strong></p>
      @foreach($posts as $related_post)
      @include('partials.post-card', ['post_id' => $related_post->ID])
      @endforeach

      <div class="mt-16 text-center">
        <x-button href="{{ get_permalink( get_option( 'page_for_posts' ) ) }}?project={{ $post->post_name }}">View
          all {{ $post->post_title }} updates
        </x-button>
      </div>
    </div>
    @endif

    @if( $resources)
    <div class="pt-16" id="project-resources">
      <h2 class="text-3xl font-bold text-blue">Resources</h2>
      <p class="mt-4 mb-8">Reports and files relating to <strong>{{ the_title() }}</strong></p>

      @foreach($resources as $resource)
      @include('partials.project-resource-card')
      @endforeach

    </div>
    @endif

  </div>

</article>