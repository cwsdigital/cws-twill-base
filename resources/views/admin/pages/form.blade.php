@extends('twill::layouts.form', [
    'additionalFieldsets' => [
        ['fieldset' => 'metadata', 'label' => 'Custom Title'],
    ]
])


@section('contentFields')

    @include('admin.fields.template-select')

    @include('admin.fields.heading')

    @formField('wysiwyg', [
        'name' => 'intro_content',
        'label' => 'Intro Content',
        'maxlength' => 100,
    ])

    @if($item->template->show_content_editor)
        @formField('block_editor')
    @endif
@stop

@section('fieldsets')
    @metadataFields
@stop
