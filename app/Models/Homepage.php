<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasFiles;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;
use App\Models\Behaviours\HasHeading;
use CwsDigital\TwillMetadata\Models\Behaviours\HasMetadata;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Homepage extends Model
{
    use HasFactory,
        HasBlocks,
        HasMedias,
        HasFiles,
        HasRevisions,
        HasMetadata,
        HasHeading;

    protected $fillable = [
        'published',
        'title',
        'heading',
        'subheading',
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
        'description' => 'page_heading',
        'og_description' => 'page_heading'
    ];

    public $metadataDefaultOgType = 'website';
    public $metadataDefaultCardType = 'summary_large_image';

    public function getCanPublishAttribute()
    {
        return false;
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
