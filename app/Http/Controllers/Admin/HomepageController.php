<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Template;

class HomepageController extends ModuleController
{
    protected $moduleName = 'homepages';

    // this doesn't really matter as there is only one entry and the routes file will hardcode the url to /
    protected $permalinkBase = 'home';

    // Blade view to render for the preview view
    protected $previewView = 'site.pages.page';

    // Configure permissions for this module
    // Cant create / publish new entries, only edit ths one existing entry
    protected $indexOptions = [
        'create' => false,
        'edit' => true,
        'publish' => false,
        'bulkPublish' => false,
        'feature' => false,
        'bulkFeature' => false,
        'restore' => true,
        'bulkRestore' => true,
        'forceDelete' => false,
        'bulkForceDelete' => false,
        'delete' => false,
        'duplicate' => false,
        'bulkDelete' => false,
        'reorder' => false,
        'permalink' => true,
        'bulkEdit' => true,
        'editInModal' => false,
    ];

    protected function previewData($item)
    {
//        $frontendPageController = new \App\Http\Controllers\PageController;
        $item->template = Template::firstWhere('slug', 'home');
        $data = [];
        $data['page'] = $item;

//        $data = $frontendPageController->getTemplateVars($item, $data);

        return $data;
    }

    // Data required for the form view
    protected function formData($request)
    {
        return [
            'metadata_card_type_options' => config('metadata.card_type_options'),
            'metadata_og_type_options' => config('metadata.opengraph_type_options'),
        ];
    }
}
