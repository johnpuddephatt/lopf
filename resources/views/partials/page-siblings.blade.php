@if($siblings)
<div class="border-t">
    <div class="container py-24 mx-auto xl:max-w-5xl 2xl:py-32">
        <h3 class="pb-12 text-xl font-bold text-blue md:text-3xl">More pages in this section</h3>
        @foreach($siblings as $page)
        <a class="flex items-center mt-2 mb-4 text-lg text-blue " href="{{ get_permalink($page->ID) }}">
            <hr class="inline-block w-6 mr-4 border border-b-0 border-gray-300">{!!
            get_the_title($page->ID)
            !!}</a>
        @endforeach
    </div>
</div>
@endif