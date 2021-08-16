<article @php(post_class())>
  <div class="container max-w-5xl mx-auto mb-32">

    <div class="w-full mt-12 lg:w-3/4">

      @if(isset($file_oembed) && $file_oembed)
      {!! $file_oembed !!}
      @else
      <x-button href="{{ $file_upload }}">Download file</x-button>
      @endif

    </div>
  </div>

</article>