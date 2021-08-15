<a href="{{ get_permalink($post_id ?? null) }}" @php(post_class('flex items-center flex-row justify-between body-font
    bg-white max-w-3xl'))>
    <div class="flex-none mr-12 rounded-full h-36 w-36 bg-orange-lightest"></div>
    <div class="pl-6 border-l-8 border-orange">
        <div class="mb-1 font-bold text-blue ">{{ get_the_date(null, $post_id ?? null) }}</div>
        <h3 class="mt-0 mb-4 text-3xl font-bold body-font">
            {!! get_the_title($post_id ?? null) !!}
        </h3>
        <div class="hidden md:block">
            {!! get_the_excerpt($post_id ?? null) !!}
        </div>
        <div class="mt-3 font-bold leading-none text-blue">Read more</div>
    </div>
</a>