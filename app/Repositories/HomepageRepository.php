<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Homepage;
use CwsDigital\TwillMetadata\Repositories\Behaviours\HandleMetadata;

class HomepageRepository extends ModuleRepository
{
    use HandleBlocks,
        HandleMedias,
        HandleFiles,
        HandleRevisions,
        HandleMetadata;

    public function __construct(Homepage $model)
    {
        $this->model = $model;
    }
}
