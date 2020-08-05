<?php

return [
    'block_editor' => [
        'blocks' => [
            'body-text' => [
                'title' => 'Body Text',
                'icon' => 'text',
                'component' => 'a17-block-body-text',
            ],
            'full-width-image' => [
                'title' => 'Full-Width Image',
                'icon' => 'image',
                'component' => 'a17-block-full-width-image',
            ],
            'large-image-and-text' => [
                'title' => 'Large Image and Text',
                'icon' => 'image',
                'component' => 'a17-block-large-image-and-text',
            ],
            'small-image-and-text' => [
                'title' => 'Small Image and Text',
                'icon' => 'image',
                'component' => 'a17-block-small-image-and-text',
            ],
        ],
        'crops' => [
            'full_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 3 / 2,
                        'minValues' => [
                            'width' => 1800,
                            'height' => 1200,
                        ],
                    ],
                ],
                'square' => [
                    [
                        'name' => 'square',
                        'ratio' => 1
                    ]
                ]
            ],
            'aside_image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 3 / 2,
                        'minValues' => [
                            'width' => 1200,
                            'height' => 800,
                        ],
                    ],
                ],
                'square' => [
                    [
                        'name' => 'square',
                        'ratio' => 1
                    ]
                ]
            ],
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
       */
    ],
    'bucketsRoutes' => [
        /*
        // this enables a homepage/featured route
        'featured' => 'homepage'
        */
    ],
];
