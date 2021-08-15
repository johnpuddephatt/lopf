@if($siblings)
<div class="border-t">
    <div class="container max-w-5xl py-32 mx-auto">
        <h3 class="pb-12 text-xl font-bold md:text-3xl text-violet-200">More pages in this section</h3>
        @foreach($siblings as $page)
        <a class="flex items-center mt-2 mb-4 -ml-10 text-lg text-blue " href="{{ get_permalink($page->ID) }}">
            <hr class="inline-block w-6 mr-4 border border-b-0 border-gray-300">{!!
            get_the_title($page->ID)
            !!}</a>
        @endforeach
    </div>
</div>
@endif