{{--
  Template Name: Section Template
--}}

@extends('layouts.app', ['alternative_header' => true])

@section('content')
@while(have_posts()) @php(the_post())
@include('partials.section-header')
@include('partials.section-navigation')
@endwhile
@endsection