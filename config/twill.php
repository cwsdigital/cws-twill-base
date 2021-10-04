<?php

return [
    'block_editor' => [
        'crops' => [

        ],
        'use_twill_blocks' => ['text', 'image'],
        'directories' => [
            'source' => [
                'blocks' => [
                    [
                        'path' => base_path('vendor/area17/twill/src/Commands/stubs/blocks'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_TWILL,
                    ],
                    [
                        'path' => resource_path('views/admin/blocks'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_APP,
                    ],
                ],
                'repeaters' => [
                    [
                        'path' => resource_path('views/admin/repeaters'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_APP,
                    ],
                    [
                        'path' => app_path('Twill/Capsules/Menus/resources/views/admin/repeaters'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_APP,
                    ],
                    [
                        'path' => app_path('Twill/Capsules/People/resources/views/admin/repeaters'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_APP,
                    ],
                    [
                        'path' => base_path('vendor/area17/twill/src/Commands/stubs/repeaters'),
                        'source' => A17\Twill\Services\Blocks\Block::SOURCE_TWILL,
                    ],
                ],
            ],
        ],
    ],
    'capsules' => [
        'list' => [
            [
                'name' => 'Homepages',
                'enabled' => true,
            ],
            [
                'name' => 'Pages',
                'enabled' => true
            ],
            [
                'name' => 'Articles',
                'enabled' => false
            ],
            [
                'name' => 'People',
                'enabled' => false
            ],
            [
                'name' => 'Menus',
                'enabled' => true,
            ],
            [
                'name' => 'Enquiries',
                'enabled' => true
            ],
            [
                'name' => 'Categories',
                'enabled' => false
            ],
            [
                'name' => 'Redirects',
                'enabled' => true
            ]
        ]
    ],
    'dashboard' => [
        'modules' => [

        ],
        'analytics' => [
            'enabled' => false,
            'service_account_credentials_json' => '',
        ],
    ],
    'settings' => [
        'crops' => [
            'default_social_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 1.91 / 1,
                    ],
                ],
            ],
        ],
    ],
    'buckets' => [
        /*
       Enable this block to enable featured buckets section for homepage editing
       // this is the 'page' container for the buckets in the admin, you can have multiple of these if required
        'featured' => [
            'name'      => 'homepage',
            'buckets'   => [
                // these are the actual buckets within this page container
                'services' => [
                    'name'          => 'Featured Services',
                    'bucketables'   => [
                        [
                            'module'    => 'services',
                            'name'      => 'Services',
                            'scopes'    => [ 'published' => true ]
                        ]
                    ],
                    'max_items'     => 4,
                ],
                'case_study' => [
                    'name'          => 'Featured Case Study',
                    'bucketables'   => [
                        [
                            'module'    => 'caseStudies',
                            'name'      => 'Case Studies',
                            'scopes'    => ['published' => true]
                        ]
                    ],
                    'max_items'     => 1,
                ]
            ]
        ],
       */],
    'bucketsRoutes' => [
        /*
        // this enables a homepage/featured route
        'featured' => 'homepage'
        */],
];
