@extends('site.layouts.site')

@section('content')
    @if($page->template)
        @includeFirst(["site.templates.{$page->template->uid}", 'site.templates.generic'])
    @else
        @include('site.templates.generic')
    @endif
@endsection
