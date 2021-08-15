@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())

<div class="flex flex-row w-full border-t">
    @include('partials.page-sidebar')
    <div class="flex-1">
        @include('partials.page-header')
        @includeFirst(['partials.content-page', 'partials.content-single'])
        @include('partials.page-siblings')
    </div>
</div>


@endwhile
@endsection