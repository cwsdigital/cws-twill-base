
@extends('twill::layouts.form', [
    'additionalFieldsets' => [
        ['fieldset' => 'metadata', 'label' => 'Custom Title'],
    ]
])

@section('contentFields')

    @include('admin.fields.heading')

    @formField('input', [
        'name' => 'subheading',
        'label' => 'Sub Heading',
        'maxlength' => 100
    ])
@stop

@section('fieldsets')
    @metadataFields
@stop
