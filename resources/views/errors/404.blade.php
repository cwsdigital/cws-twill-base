@extends('errors::minimal')

@section('title', "404 Page Not Found - {{ @setting('site_title') }}" )
@section('code', '404')
@section('message', __('Not Found'))
