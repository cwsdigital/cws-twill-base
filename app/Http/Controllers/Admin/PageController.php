<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Template;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PageController extends ModuleController
{
    protected $moduleName = 'pages';

    // We don't want to include the module url in permalinks
    // allows the url to display the url as https://{siteurl}/{$page-slug}
    protected $permalinkBase = '';

    // Blade view to be rendered for previews
    protected $previewView = 'site.pages.page';

    // Columns to show on the index page
    protected $indexColumns = [
        'title' => [
            'title' => 'Title',
            'field' => 'title',
        ],
    ];

    // Allow drag-and-drop reordering of pages
    protected $indexOptions = [
        'reorder' => true,
    ];

    public function __construct(Application $app, Request $request) {
        parent::__construct($app, $request);

        $this->permalinkBase = $this->getPermalinkBase($request);
    }

    // Provide extra data to the index view
    protected function indexData($request)
    {
        return [
            'templates' => $this->getAvailableTemplates(),
            'nested' => true,
            'nestedDepth' => 3, // this controls the allowed depth in UI
        ];
    }

    // Setup required data for the preview view
    protected function previewData($item)
    {

        $data = [];
        $data['page'] = $item;

        return $data;
    }

    // Prepare the items for nested display
    protected function transformIndexItems($items)
    {
        return $items->toTree();
    }

    // Add the child items to index items as required
    protected function indexItemData($item)
    {
        return ($item->children ? [
            'children' => $this->getIndexTableData($item->children),
        ] : []);
    }


    protected function getBrowserItems($scopes = [])
    {
        return $this->repository->get(
            $this->indexWith,
            $scopes,
            $this->orderScope(),
            request('offset') ?? $this->perPage ?? 50,
            true
        );
    }

    // Prepare data for the form view
    // we provide:
    //  - the available templates,
    //  - whether the current template enables the block editor
    //  - the metadata options
    protected function formData($request)
    {
        $param = strtolower($this->modelName);
        $id = $request->route($param);
        if($id) {
            $page = $this->repository->getById($id);
            $editor = $page->template->show_content_editor;
        } else {
            $editor = Config::get('twill.enabled.block-editor') && $this->moduleHas('blocks') && !$this->disableEditor;
        }
        return [
            'templates' => $this->getAvailableTemplates(),
            'editor' => $editor,
            'metadata_card_type_options' => config('metadata.card_type_options'),
            'metadata_og_type_options' => config('metadata.opengraph_type_options'),
        ];
    }

    // Dynamic permalinkbase based on the ancestry of the current page
    // allows for the permalink to show the hierarchy e.g https://{siteurl}/{parent-slug}/{page-slug}
    protected function getPermalinkBase($request) {
        $param = strtolower($this->modelName);
        $id = $request->route($param);
        if( !$id ) {
            return  $this->permalinkBase;
        }

        $page = $this->repository->getById($id);
        if( !$page->isRoot() ) {
            $permalinkBase = '';
            $ancestors = $page->ancestors()->with('slugs')->get();
            foreach($ancestors as $ancestor) {
                $permalinkBase .= '/'. $ancestor->slug;
            }
            //remove first slash and return
            return substr( $permalinkBase . $this->permalinkBase, 1);
        } else {
            return  $this->permalinkBase;
        }
    }

    // Get a list of templates available to be selected by the current editor
    protected function getAvailableTemplates() {
        $role = auth()->user()->role;
        if($role == 'SUPERADMIN' || $role == 'ADMIN') {
            return Template::pluck('name', 'id');
        } else {
            return Template::forClient()->pluck('name', 'id');
        }
    }
}
