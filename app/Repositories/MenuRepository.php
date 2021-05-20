<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleRepeaters;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Menu;

class MenuRepository extends ModuleRepository
{
    use HandleSlugs,
        HandleRepeaters;

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields)
    {
        $this->updateRepeater($object, $fields, 'menu_items', 'MenuItem', 'menu_item');
        parent::afterSave($object, $fields);
    }
//
    public function getFormFields($object)
    {
       $fields = parent::getFormFields($object);
       $fields = $this->getFormFieldsForRepeater($object, $fields, 'menu_items', 'MenuItem', 'menu_item');
       return $fields;
    }
}
