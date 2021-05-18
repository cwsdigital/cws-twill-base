<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasPosition;
use A17\Twill\Models\Behaviors\Sortable;
use A17\Twill\Models\Model;
use App\Models\Behaviours\HasHeading;
use App\Models\Behaviours\IsNested;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model implements Sortable
{
    use HasFactory,
        HasBlocks,
        HasSlug,
        HasMedias,
        HasFiles,
        HasRevisions,
        HasPosition,
        HasMetadata,
        IsNested,
        HasHeading;

    protected $fillable = [
        'template_id',
        'published',
        'title',
        'heading',
        'intro_content',
        'position',
        'parent_id'
    ];

    public $slugAttributes = [
        'title',
    ];

    public $mediasParams = [
        'cover' => [
            'desktop' => [
                [
                    'name' => 'desktop',
                    'ratio' => 16 / 9,
                ],
            ],
            'mobile' => [
                [
                    'name' => 'mobile',
                    'ratio' => 1,
                ],
            ],
            'flexible' => [
                [
                    'name' => 'free',
                    'ratio' => 0,
                ],
                [
                    'name' => 'landscape',
                    'ratio' => 16 / 9,
                ],
                [
                    'name' => 'portrait',
                    'ratio' => 3 / 5,
                ],
            ],
        ],
    ];

    public $metadataFallbacks = [
        'title' => 'heading',
        'description' => 'intro_content',
        'og_description' => 'intro_content'
    ];

    public $metadataDefaultOgType = 'website';
    public $metadataDefaultCardType = 'summary_large_image';


    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
