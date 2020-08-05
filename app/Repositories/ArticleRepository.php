<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Article;
use CwsDigital\TwillMetadata\Repositories\Behaviours\HandleMetadata;

class ArticleRepository extends ModuleRepository
{
    use HandleBlocks,
        HandleSlugs,
        HandleMedias,
        HandleFiles,
        HandleRevisions,
        HandleMetadata;

    public function __construct(Article $model)
    {
        $this->model = $model;
    }
}
