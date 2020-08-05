@if(count($templates) > 1 )
    @formField('select', [
    'name' => 'template_id',
    'label' => 'Template',
    'options' => $templates,
    'default' => array_key_first($templates->toArray()),
    ])
@else
    @formField('hidden', [
    'name' => 'template_id',
    'label' => 'Template',
    'value' => isset($item) ? $item->template->id : array_key_first($templates->toArray()),
    ])
@endif
