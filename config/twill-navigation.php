<?php

return [
    'homepage' => [
        'title' => 'Homepage',
        'route' => 'admin.homepage.overview',
        'primary_navigation' => [
            'overview' => [
                'title' => 'Overview',
                'route' => 'admin.homepage.overview',
            ],
            /*
             * Enable this if you have featured buckets within the homepage
            'featured' => [
                'title' => 'Featured Content',
                'route' => 'admin.homepage.featured'
            ]
            */
        ]
    ],
    'pages' => [
        'title' => 'Pages',
        'module' => true
    ],
    'articles' => [
        'title' => 'Articles',
        'route' => 'admin.articles.articles.index',
        'primary_navigation' => [
            'articles' => [
                'title' => 'Articles',
                'module' => true
            ],
            'articleCategories' => [
                'title' => 'Categories',
                'module' => true
            ]
        ]
    ],
    'enquiries' => [
        'title' => 'Enquiries',
        'module' => true
    ],
    'menus' => [
        'title' => 'Menus',
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
