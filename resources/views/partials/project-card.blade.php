<a href="{{ get_permalink($project->ID) }}"
    class="block relative sm:flex shadow-lg items-center text-white bg-black @if(isset($classes)) {{$classes}} @endif @if($key % 2 == 0) flex-row @else flex-row-reverse @endif">

    @if(has_post_thumbnail($project->ID) &&
    App\has_thumbnail_size($project->ID, 'square'))
    {!! get_the_post_thumbnail($project->ID, 'square', ['class' => "object-cover object-center flex-none sm:w-1/2",
    'sizes' => '(max-width: 640px) 95vw, (max-width: 1024px) 50vw, (max-width: 1536px) 512px, 576px']) !!}
    @else
    <x-placeholder class="flex-none object-cover object-center w-1/2" />
    @endif

    <div class="flex-none p-6 md:py-0 xl:px-8 2xl:px-16 sm:w-1/2">

        <p class="font-extrabold mb-3 text-xl @if($key % 2 == 0) text-orange-400 @else text-violet-200 @endif">Project.
        </p>
        <x-heading size="3" class=" md:mb-10 xl:text-4xl 2xl:text-5xl">{{ $project->post_title }}</x-heading>
        <p class="hidden mt-4 mb-2 text-sm md:block md:text-base">{{ $project->post_excerpt }}</p>
        <p class="font-extrabold inline-flex items-center text-xl @if($key % 2 == 0) text-orange-400 @else text-violet-200 @endif lowercase hover:text-white "
            title="read more">
            <span class="py-2 border-b @if($key % 2 == 0) border-orange-400 @else border-violet-200 @endif">Read
                More</span>
            <x-icon.arrow-right class="w-24 h-24 text-pink" />
        </p>
    </div>
</a>