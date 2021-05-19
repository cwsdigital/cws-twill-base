@extends('errors::minimal')

@section('title')
    403 Forbidden - @setting('site_title')
@endsection
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
