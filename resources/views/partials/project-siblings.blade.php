@if(isset($projects) and $projects)
<div class="border-t">
    <div class="container py-24 mx-auto xl:max-w-5xl 2xl:py-32">
        <h3 class="pb-12 text-xl font-bold text-blue md:text-3xl text-violet-200">More projects</h3>
        @foreach($projects as $project)
        <a class="flex items-center mt-2 mb-4 text-lg text-blue " href="{{ get_permalink($project->ID) }}">
            <hr class="inline-block w-6 mr-4 border border-b-0 border-gray-300">{!!
            get_the_title($project->ID)
            !!}</a>
        @endforeach
    </div>
</div>
@endif