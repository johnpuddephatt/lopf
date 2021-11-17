@extends('layouts.app')

@section('content')
@include('partials.page-header')

<div class="container max-w-5xl my-32">
  @if (! have_posts())
  <x-alert type="warning">
    {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
  </x-alert>
  <div class="flex justify-center mt-12">
    {!! get_search_form(false) !!}
  </div>
  @endif
</div>
@endsection