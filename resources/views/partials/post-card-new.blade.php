@php($category = get_the_category($post_id ?? null)[0] ?? null)
 
@php($categoryBorderClasses = [
    'news' => 'border-sky',
    'events' => 'border-pink',
    'research' => 'border-orange',
    'funding' => 'border-blue',
    'training' => 'border-green'
])

@php($categoryBackgroundClasses = [
    'news' => 'bg-sky-lightest',
    'events' => 'bg-pink-lightest',
    'research' => 'bg-orange-lightest',
    'funding' => 'bg-blue-lightest',
    'training' => 'bg-green-lightest'
])

<a href="{{ get_permalink($post_id ?? null) }}" @php(post_class('flex flex-col space-y-8'))>
<div class="relative border-l-8 {{ ($category && array_key_exists($category->slug, $categoryBorderClasses) ? $categoryBorderClasses[$category->slug] : 'border-sky') }}">
    @if(has_post_thumbnail($post_id ?? null))
    
    {!! get_the_post_thumbnail($post_id ?? null, 'twothirds', ['class' =>
        " rounded-tr-[3em] " 
        ]) !!}
    @else
    <div class="bg-sky-light rounded-tr-[3em] pt-[66%] "></div>
    @endif

    @if($category) 

    <div class="absolute -bottom-2 rounded-full {{ $category && array_key_exists($category->slug, $categoryBackgroundClasses) ? $categoryBackgroundClasses[$category->slug] : 'bg-sky-light' }} p-1 -left-4">
        @includeIf('components.icon.category-' . $category->slug, ['class' => 'w-12 h-12 text-blue'])
    </div>

    @endif
    </div>
    <div class="">
        <div class="mb-1 font-semibold text-blue ">{{ get_the_date(null, $post_id ?? null) }}</div>
        <h3 class="text-xl mb-2 font-bold leading-tight ">
            {!! get_the_title($post_id ?? null) !!}
        </h3>
        <div class="text-sm lg:text-base">
            {!! get_the_excerpt($post_id ?? null) !!}
        </div>
        <div class="mt-3 font-bold leading-none text-blue">Read more</div>
    </div>
</a>
