@if($siblings)
<aside class="hidden pt-24 pb-12 border-r md:block">
    <nav class="">
        <h2 class="px-6 mb-6 text-xl font-bold 2xl:px-8 text-blue">
            <a class="block mx-auto mr-16 w-60" href=" {{ $parent->permalink}}">
                {{ $parent->title}}
            </a>
        </h2>
        @foreach($siblings as $page)
        <a class="px-6 hover:bg-sky-lightest 2xl:px-8 block py-3 text-lg @if(get_permalink() == get_permalink($page->ID))bg-sky text-blue @else text-gray-600 @endif"
            href="{{ get_permalink($page->ID) }}">
            <span class="block mx-auto mr-16 w-60">{!! get_the_title($page->ID) !!}</span>
        </a>
        @endforeach
    </nav>
</aside>
@endif