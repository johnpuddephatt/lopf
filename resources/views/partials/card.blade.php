<a href="{{ get_permalink($page->ID) }}" @php(post_class('block text-gray-600 body-font border mb-4 p-4'))>
    <div class="container flex flex-col mx-auto md:flex-row">
        <div class="w-40 mb-10 md:mb-0">
            <img class="object-cover object-center rounded" alt="hero"
                src="{{get_the_post_thumbnail_url($page->ID, 'thumbnail') ?: 'https://dummyimage.com/150x150'}}">
        </div>
        <div class="flex flex-col items-center text-center lg:flex-grow md:w-1/2 md:pl-8 md:items-start md:text-left">
            <x-heading level="2">
                {!! get_the_title($page->ID) !!}
            </x-heading>
            <div class="leading-relaxed">
                {!! get_the_excerpt($page->ID) !!}
            </div>
        </div>
    </div>
</a>