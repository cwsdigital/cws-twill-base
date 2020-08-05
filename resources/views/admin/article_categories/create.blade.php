@formField('input', [
'name' => $titleFormKey ?? 'title',
'label' => ucfirst($titleFormKey ?? 'title'),
'translated' => $translateTitle ?? false,
'required' => true,
'onChange' => 'formatPermalink'
])


@formField('input', [
'name' => 'description',
'label' => 'Description',
'note' => 'Used for SEO meta description'
])

@if ( $permalink ?? true )
    @formField('input', [
    'name' => 'slug',
    'label' => 'Permalink',
    'translated' => true,
    'ref' => 'permalink',
    'prefix' => $permalinkPrefix ?? ''
    ])
@endif
