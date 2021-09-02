<aside class="hidden pt-24 pb-12 border-r lg:block">
    <nav class="">
        <h2 class="px-8 mb-6 text-xl font-bold text-blue">
            <a class="block mx-auto mr-16 w-60" href="/projects">
                Projects
            </a>
        </h2>

        @foreach($projects as $key => $project)
        <a href="{{ get_permalink($project->ID) }}"
            class="px-8 hover:bg-sky-lightest block py-3 text-lg @if(get_permalink() == get_permalink($project->ID)) bg-sky text-blue @else text-gray-600 @endif">
            <span class="block mx-auto mr-16 w-60">{!! $project->post_title !!}</span>
        </a>
        @endforeach

    </nav>
</aside>