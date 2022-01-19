<a href="{{ get_permalink($resource->ID) }}" @php(post_class('ring-1 flex items-center flex-row justify-between
    body-font bg-white max-w-3xl p-4 lg:p-8 2xl:p-10 border-l-8 ring-gray-200 border-pink '))>
    
    <div class="max-w-3xl mr-8">
        
        <h3 class="mt-0 mb-1 text-lg font-bold lg:text-xl text-blue body-font">
            {!! $resource->post_title !!}
        </h3>

        <div class="flex flex-col gap-4 mt-4 md:flex-row">
        
        @if(get_field(' date', $resource->ID))
    <div class="text-gray-600">
        {{ get_field('date', $resource->ID ) }}
    </div>
    @endif

    @if(get_field("publisher", $resource->ID) && get_field("date", $resource->ID))
    <span class="hidden text-gray-300 md:block">&mdash;</span>
    @endif

    @if(get_field("publisher", $resource->ID))
    <div>
        {{ get_field( "publisher", $resource->ID ) }}
    </div>
    @endif
    </div>
    </div>
    <x-icon.arrow-right class="flex-none w-8 h-12 text-pink" />
</a>