<?php

return [
    'homepages' => [
        'title' => 'Homepage',
        'route' => 'admin.homepages.landing',
    ],
    'pages' => [
        'title' => 'Pages',
        'module' => true
    ],
    'articles' => [
        'title' => 'Articles',
        'module' => true
    ],
    'people' => [
        'title' => 'People',
        'module' => true
    ],
    'enquiries' => [
        'title' => 'Enquiries',
        'module' => true
    ],
    'menus' => [
        'title' => 'Menus',
        'module' => true
    ],
    'categories' => [
        'title' => 'Categories',
        'module' => true
    ],
    'redirects' => [
        'title' => 'Redirects',
        'module' => true
    ],
    'settings' => [
        'title' => 'Settings',
        'route' => 'admin.settings',
        'params' => ['section' => 'contact'],
        'primary_navigation' => [
            'general' => [
                'title' => 'Contact',
                'route' => 'admin.settings',
                'params' => ['section' => 'contact']
            ],
            'seo' => [
                'title' => 'SEO',
                'route' => 'admin.settings',
                'params' => ['section' => 'seo']
            ],
        ]
    ],
];
