<?php

return [
    'block_single_layout' => 'site.layouts.block', // layout to use when rendering a single block in the editor
    'block_views_path' => 'site.blocks', // path where a view file per block type is stored
    'block_views_mappings' => [], // custom mapping of block types and views
    'block_preview_render_childs' => true, // indicates if childs should be rendered when using repeater in blocks
    'block_presenter_path' => null, // allow to set a custom presenter to a block model
    // Indicates if blocks templates should be inlined in HTML.
    // When setting to false, make sure to build Twill with your all your custom blocks.
    'inline_blocks_templates' => true,
    'custom_vue_blocks_resource_path' => 'assets/js/blocks',
    'use_twill_blocks' => ['text', 'image'],
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
                    'path' => base_path('vendor/area17/twill/src/Commands/stubs/repeaters'),
                    'source' => A17\Twill\Services\Blocks\Block::SOURCE_TWILL,
                ],
            ],
            'icons' => [
                base_path('vendor/area17/twill/frontend/icons'),
                resource_path('views/admin/icons'),
            ],
        ],
        'destination' => [
            'make_dir' => true,
            'blocks' => resource_path('views/admin/blocks'),
            'repeaters' => resource_path('views/admin/repeaters'),
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
