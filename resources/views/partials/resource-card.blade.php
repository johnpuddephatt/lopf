<a href="{{ get_permalink($post_id ?? null) }}" @php(post_class('ring-1 flex items-center flex-row justify-between
    body-font bg-white max-w-3xl p-4 lg:p-8 2xl:p-10 border-l-8 ring-gray-200 border-pink '))>
    <div class="max-w-3xl mr-8">
        <h3 class="mt-0 mb-1 text-lg font-bold lg:text-xl text-blue body-font">
            {!! get_the_title($post_id ?? null) !!}
        </h3>
        <div class="flex flex-col gap-4 mt-4 md:flex-row">
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
    </div>
    <x-icon.arrow-right class="flex-none w-8 h-12 text-pink" />
</a>