@extends('errors::minimal')

@section('title')
    419 Page Expired - @setting('site_title')
@endsection
@section('code', '419')
@section('message', __('Page Expired'))
