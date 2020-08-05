<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Page;
use App\Repositories\Behaviours\HandleNesting;
use CwsDigital\TwillMetadata\Repositories\Behaviours\HandleMetadata;

class PageRepository extends ModuleRepository
{
    use HandleBlocks,
        HandleSlugs,
        HandleMedias,
        HandleFiles,
        HandleRevisions,
        HandleNesting,
        HandleMetadata;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }
}
