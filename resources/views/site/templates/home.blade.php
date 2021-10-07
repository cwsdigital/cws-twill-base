@extends('site.layouts.site')

@section('content')
    <h1>Welcome!</h1>
    <div class="content">
        {!! $page->renderBlocks() !!}
    </div>
@endsection
