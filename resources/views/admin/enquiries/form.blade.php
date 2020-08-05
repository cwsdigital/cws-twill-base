@extends('twill::layouts.form')

@push('extra_css')
    <link rel="stylesheet" type="text/css" href="/css/cws-admin.css" />
@endpush

@section('contentFields')

    <dl class="cws-enquiry-details">
        <dt>Name:</dt><dd>{{ $item->name }}</dd>
        <dt>Company:</dt><dd>{{ $item->company }}</dd>
        <dt>Email:</dt><dd><a href="mailto:{{$item->email}}">{{ $item->email }}</a></dd>
        <dt>Phone:</dt><dd>{{ $item->phone }}</dd>
        <dt>Regarding:</dt><dd>{{ $item->regarding }}</dd>
        <dt>Message:</dt><dd>{!! $item->message !!}</dd>

    </dl>

    @formField('checkbox', [
    'name' => 'read',
    'label' => ( $item->read ? 'Read at '.$item->read_at->format('g:ia \\o\\n jS M').' by '.$item->reader->name : 'Mark as Read' ),
    ])

@stop
