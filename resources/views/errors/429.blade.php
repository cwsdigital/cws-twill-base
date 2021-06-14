@extends('errors::minimal')

@section('title')
    429 Too Many Requests - @setting('site_title')
@endsection

@section('code', '429')
@section('message', __('Too Many Requests'))
