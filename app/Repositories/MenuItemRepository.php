<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\MenuItem;
use Illuminate\Support\Arr;

class MenuItemRepository extends ModuleRepository
{

    public function __construct(MenuItem $model)
    {
        $this->model = $model;
    }


    public function prepareFieldsBeforeCreate($fields)
    {
        $fields = parent::prepareFieldsBeforeCreate($fields);
        $fields['linkable_id'] = Arr::get($fields, 'browsers.linkables.0.id', null);
        $fields['linkable_type'] = Arr::get($fields, 'browsers.linkables.0.endpointType', null);

        return $fields;
    }

    public function prepareFieldsBeforeSave($object, $fields)
    {
        $fields = parent::prepareFieldsBeforeSave($object, $fields);

        $id = Arr::get($fields, 'browsers.linkables.0.id', null);
        $type = Arr::get($fields, 'browsers.linkables.0.endpointType', null);

        if($id) {
            $fields['linkable_id'] = $id;
        }
        if($type) {
        $fields['linkable_type'] = $type;
        }

        return $fields;
    }



    public function getFormFields($object)
    {
        $fields = parent::getFormFields($object);

        $linkable = $object->linkable;

        if ($linkable) {
            $fields['browsers']['linkables'] = collect([
                [
                    'id' => $linkable->id,
                    'name' => $linkable->title,
                    'edit' => moduleRoute($object->linkable->getTable(), '', 'edit', $linkable->id),
                    'thumbnail' => $linkable->defaultCmsImage(['w' => 100, 'h' => 100]),

                ],
            ])->toArray();
        }

        return $fields;
    }

}
