@twillBlockTitle('Small Image and Text')
@twillBlockIcon('image-text')

<x-formColumns>
    <x-slot name="left">
        @formField('medias', [
        'name' => 'aside_image',
        'label' => 'Image',
        'note' => '',
        'fieldNote' => ''
        ])

        @formField('input', [
        'name' => 'caption',
        'label' => 'Caption',
        'note' => '',
        ])
    </x-slot>
    <x-slot name="right">
        @formField('wysiwyg', [
        'name' => 'body_text',
        'label' => 'Content',
        'toolbarOptions' => [
        ['header' => 3],
        'bold',
        'italic',
        'underline',
        ['list' => 'ordered'],
        ['list' => 'bullet'],
        ['indent' => '-1'],
        ['indent' => '+1'],
        'link',
        ],
        ])
    </x-slot>
</x-formColumns>

@formField('radios', [
'name' => 'orientation',
'label' => 'Orientation',
'default' => 'left',
'inline' => true,
'options' => [
[
'value' => 'left',
'label' => 'Image on the left'
],
[
'value' => 'right',
'label' => 'Image on the right'
],
]
])
