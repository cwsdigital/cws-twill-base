@extends('twill::layouts.form', [
    'additionalFieldsets' => [
        ['fieldset' => 'metadata', 'label' => 'Custom Title'],
    ]
])


@section('contentFields')
    @formField('select',[
    'name' => 'article_category_id',
    'label' => 'Category',
    'options' => $categories,
    'required' => true
    ])


    @include('admin.fields.heading')

    @formField('input', [
        'name' => 'excerpt',
        'label' => 'Excerpt',
        'maxlength' => 100,
        'required' => true
    ])

    @formField('block_editor')
@stop

@section('fieldsets')
    @metadataFields
@stop
