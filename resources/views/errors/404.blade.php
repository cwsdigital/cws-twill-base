@extends('errors::minimal')

@section('title')
    404 Page Not Found - @setting('site_title')
@endsection

@section('code', 'Sorry')
@section('message')
    <p class="text-s2">We couldn't find the page you were looking for. </p>
    <p><a href="/">Go to the homepage</a></p>
@endsection
