@extends('layouts.app')

@section('content')

<div class="flex flex-row w-full border-t">
    @includeIf('partials.' . get_post_type() . '-sidebar')
    <div class="flex-1">
        <div class="container max-w-5xl mt-12">
            @while(have_posts()) @php(the_post())
            @includeFirst(['partials.' . get_post_type() . '-header', 'partials.header'])
            @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
            @endwhile
        </div>
        @includeIf('partials.' . get_post_type() . '-siblings')
    </div>
</div>
@endsection