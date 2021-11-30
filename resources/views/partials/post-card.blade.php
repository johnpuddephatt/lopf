<a href="{{ get_permalink($post_id ?? null) }}" @php(post_class('flex items-center flex-row body-font max-w-3xl'))>
    @if(!isset($hide_circles) || !$hide_circles)
    @if(has_post_thumbnail($post_id ?? null))
    {!! get_the_post_thumbnail($post_id ?? null, 'square', [ 'class' => 'object-cover object-center mr-8 rounded-full
    w-36 h-36
    hidden lg:block flex-none' ])
    !!}
    @else
    <div class="flex-none hidden mr-12 rounded-full lg:block h-36 w-36 bg-orange-lightest"></div>
    @endif
    @endif
    <div class="pl-8 border-l-8 border-orange">
        <div class="mb-1 font-semibold text-blue ">{{ get_the_date(null, $post_id ?? null) }}</div>
        <h3 class="mt-0 mb-2 text-xl font-bold lg:text-2xl">
            {!! get_the_title($post_id ?? null) !!}
        </h3>
        <div class="text-sm lg:text-base">
            {!! get_the_excerpt($post_id ?? null) !!}
        </div>
        <div class="mt-3 font-bold leading-none text-blue">Read more</div>
    </div>
</a>