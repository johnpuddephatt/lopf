@extends('layouts.app', ['alternative_header' => true])

@section('content')
@include('partials.section-header', ['background' => 'bg-purple', 'text' => 'text-sky'])

<div class="container max-w-5xl py-32 space-y-24">
  @foreach($projects as $key => $page)
  @include('partials.page-card')
  @endforeach
</div>

@endsection