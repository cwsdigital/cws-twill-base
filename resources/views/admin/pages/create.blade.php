@formField('input', [
'name' => $titleFormKey ?? 'title',
'label' => ucfirst($titleFormKey ?? 'title'),
'translated' => $translateTitle ?? false,
'required' => true,
'onChange' => 'formatPermalink'
])

@include('admin.fields.template-select')

@if ( $permalink ?? true )
    @formField('input', [
    'name' => 'slug',
    'label' => 'Permalink',
    'translated' => true,
    'ref' => 'permalink',
    'prefix' => $permalinkPrefix ?? ''
    ])
@endif
