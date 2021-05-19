@extends('twill::layouts.form')

@section('contentFields')

    @formField('repeater', [
        'type' => 'menu_item'
    ])
@stop
