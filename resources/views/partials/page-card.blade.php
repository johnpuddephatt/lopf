<a href="{{ get_permalink($page->ID) }}" @php(post_class('flex flex-row md:space-x-16'))>
    <div
        class="w-20 mb-auto hidden md:block md:w-48 flex-0 relative {{ match($key % 4) { 0 => 'circle-orange', 1 => 'circle-blue', 2 => 'circle-sky', 3 => 'circle-pink'} }}">
        @if(has_post_thumbnail(isset($page->ID) ? $page->ID : '') &&
        isset(wp_get_attachment_metadata(get_post_thumbnail_id($page->ID))['sizes']['square-xs']))
        {!! get_the_post_thumbnail($page->ID, 'square-xs', ['class' => "w-20 md:w-48 clip-teardrop max-w-none block "])
        !!}
        @else
        <img src="https://via.placeholder.com/150" class="block w-48 clip-teardrop max-w-none" />
        @endif
    </div>
    <div
        class="pl-6 md:pl-8 border-l-8 md:border-l-14 {{ match($key % 4) { 0 => 'border-orange', 1 => 'border-blue', 2 => 'border-sky', 3 => 'border-pink'} }}">
        <h3 class="mt-2 mb-4 text-2xl font-bold lg:text-3xl text-blue">{!! get_the_title($page->ID) !!}</h3>
        <p class="md:text-lg">{!! get_the_excerpt($page->ID, )!!}</p>
        <p class="mt-4 text-lg font-bold text-blue">Read more</p>
    </div>
</a>