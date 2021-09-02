<a href="{{ $resource->link }}" @php(post_class('ring-1 flex items-center flex-row justify-between body-font mb-4
    md:mb-8 p-4 lg:p-8 2xl:p-12 max-w-3xl border-l-8 ring-gray-200 border-pink '))>
    <div class="max-w-3xl mr-8">
        <h3 class="mt-0 mb-1 text-xl font-bold body-font">
            {!! $resource->post_title !!}
        </h3>
        @if(get_field(' date')) <div class="hidden md:block">
    {{ get_field( 'date', $resource->ID ) }}
    </div>
    @endif
    </div>
    <x-icon.arrow-right class="w-8 h-12 text-pink" />
</a>