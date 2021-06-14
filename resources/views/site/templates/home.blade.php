@extends('site.layouts.site')

@section('content')
    <h1>{{$page->heading}}</h1>
    <div class="content">
        {!! $page->renderBlocks() !!}
    </div>
@endsection
