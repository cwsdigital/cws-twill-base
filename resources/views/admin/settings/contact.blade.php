@extends('twill::layouts.settings')

@section('contentFields')
    @formField('input', [
    'label' => 'Phone',
    'name' => 'phone',
    'textLimit' => '80'
    ])

    @formField('input', [
    'label' => 'Mobile',
    'name' => 'mobile',
    'textLimit' => '80'
    ])

    @formField('input', [
    'label' => 'Email',
    'name' => 'email',
    'textLimit' => '80'
    ])

    @formField('input', [
    'label' => 'Address',
    'name' => 'address',
    'textLimit' => '254'
    ])

    @formField('input', [
    'label' => 'Facebook Profile',
    'name' => 'facebook_profile',
    'textLimit' => '254',
    'prefix' => 'https://www.facebook.com/'
    ])

    @formField('input', [
    'label' => 'LinkedIn Profile',
    'name' => 'linkedin_profile',
    'textLimit' => '254',

    ])

@stop
