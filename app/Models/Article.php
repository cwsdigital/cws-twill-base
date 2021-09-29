<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use App\Models\Behaviours\HasHeading;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory,
        HasBlocks,
        HasSlug,
        HasMedias,
        HasFiles,
        HasRevisions,
        HasHeading,
        HasMetadata;

    protected $fillable = [
        'publish_start_date',
        'publish_end_date',
        'published',
        'title',
        'excerpt',
        'article_category_id'
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
        'description' => 'excerpt',
        'og_description' => 'excerpt'
    ];

    public $dates = [
        'publish_start_date',
        'publish_end_date'
    ];

    public $metadataDefaultOgType = 'website';
    public $metadataDefaultCardType = 'summary_large_image';

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}
