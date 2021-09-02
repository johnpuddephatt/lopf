@extends('layouts.app', ['alternative_header' => true])

@section('content')
@include('partials.section-header', ['background' => 'bg-purple', 'text' => 'text-sky'])

<div class="container py-32 space-y-24 xl:max-w-5xl">
  @foreach($projects as $key => $page)
  @include('partials.page-card')
  @endforeach
</div>

@endsection