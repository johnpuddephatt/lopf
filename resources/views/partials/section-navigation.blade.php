@if($children)

<div class="container flex flex-col py-16 mx-auto space-y-12 md:py-32 md:space-y-24 xl:max-w-5xl">
    @foreach($children as $key => $page)
    @include('partials.page-card')
    @endforeach
</div>

@endif