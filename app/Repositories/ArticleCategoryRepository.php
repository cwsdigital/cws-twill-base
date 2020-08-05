<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\ArticleCategory;

class ArticleCategoryRepository extends ModuleRepository
{
    use HandleSlugs;

    public function __construct(ArticleCategory $model)
    {
        $this->model = $model;
    }
}
