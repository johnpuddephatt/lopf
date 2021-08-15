@if($children)

<div class="container flex flex-col max-w-5xl py-32 mx-auto space-y-24">
    @foreach($children as $key => $page)
    @include('partials.page-card')
    @endforeach
</div>

@endif