@extends('errors::minimal')

@section('title')
    401 Unauthorized - @setting('site_title')
@endsection
@section('code', '401')
@section('message', __('Unauthorized'))
