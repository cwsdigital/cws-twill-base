<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Repositories\EnquiryRepository;
use Illuminate\Support\Collection;

class EnquiryController extends ModuleController
{
    protected $moduleName = 'enquiries';

    /*
     * Options of the index view
     */
    protected $indexOptions = [
        'create' => false,
        'edit' => true,
        'publish' => false,
        'bulkPublish' => true,
        'feature' => false,
        'bulkFeature' => false,
        'restore' => true,
        'bulkRestore' => true,
        'delete' => true,
        'duplicate' => false, //this setting doesn't appear to be working!
        'bulkDelete' => true,
        'reorder' => false,
        'permalink' => false,
        'bulkEdit' => true,
        'editInModal' => false,
        'forceDelete' => true,
        'bulkForceDelete' => true,
    ];

    /*
     * Key of the index column to use as title/name/anythingelse column
     * This will be the first column in the listing and will have a link to the form
     */
    protected $titleColumnKey = 'name';

    /*
     * Columns to display on the index listing view
     */
    protected $indexColumns = [

        'name' => [
            'title' => 'Name',
            'field' => 'name',
        ],
        'email' => [
            'title' => 'Email',
            'field' => 'email',
        ],
        'phone' => [
            'title' => 'Phone',
            'field' => 'phone',
        ],
        'company' => [
            'title' => 'Company',
            'field' => 'company',
        ],
        'regarding' => [
            'title' => 'Regarding',
            'field' => 'regarding',
        ],
        'message' => [
            'title' => 'Message',
            'field' => 'message',
        ],

    ];

    /**
     * Override the default main filters for the index view.
     * We don't want published / draft etc
     * Add in Read / Unread
     * Want Trash to be the last item so overriding whole method rather then calling parent and appending
     *
     * @param \Illuminate\Database\Eloquent\Collection $items
     * @param array $scopes
     * @return array
     */

    protected function getIndexTableMainFilters($items, $scopes = [])
    {
        $statusFilters = [];

        $scope = ($this->submodule ? [
                $this->getParentModuleForeignKey() => $this->submoduleParentId,
            ] : []) + $scopes;

        array_push($statusFilters, [
            'name' => twillTrans('twill::lang.listing.filter.all-items'),
            'slug' => 'all',
            'number' => $this->repository->getCountByStatusSlug('all', $scope),
        ]);

        array_push($statusFilters,  [
            'name' => 'Unread',
            'slug' => 'unread',
            'number' => $this->repository->getCountByStatusSlug('unread', $scope),
        ], [
            'name' => 'Read',
            'slug' => 'read',
            'number' => $this->repository->getCountByStatusSlug('read', $scope),
        ]);

        if ($this->getIndexOption('restore')) {
            array_push($statusFilters, [
                'name' => twillTrans('twill::lang.listing.filter.trash'),
                'slug' => 'trash',
                'number' => $this->repository->getCountByStatusSlug('trash', $scope),
            ]);
        }

        return $statusFilters;

    }

    /*
     * Filters mapping ('filterName' => 'filterColumn')
     * You can associate items list to filters by having a filterNameList key in the indexData array
     * For example, 'category' => 'category_id' and 'categoryList' => app(CategoryRepository::class)->listAll()
     */
    protected $filters = [];

    /**
     * Additional links to display in the listing filter
     *
     * @var array
     */
    protected $filterLinks = [];

    /**
     * Filters that are selected by default in the index view.
     *
     * Example: 'filter_key' => 'default_filter_value'
     *
     * @var array
     */
    protected $filtersDefaultOptions = [];

    /**
     * Relations to eager load for the form view.
     *
     * @var array
     */
    protected $formWith = [
        'reader',
    ];


    /*
     * Add anything you would like to have available in your module's index view
     */
    protected function indexData($request)
    {
        return [];
    }

    /**
     * Overriding method to add in read / unread into the allowable status filter scope values
     *
     * @param array $prepend
     * @return array
     */
    protected function filterScope($prepend = [])
    {
        $scope = [];

        $requestFilters = $this->getRequestFilters();

        $this->filters = array_merge($this->filters, $this->defaultFilters);

        if (array_key_exists('status', $requestFilters)) {
            switch ($requestFilters['status']) {
                case 'published':
                    $scope['published'] = true;
                    break;
                case 'draft':
                    $scope['draft'] = true;
                    break;
                case 'trash':
                    $scope['onlyTrashed'] = true;
                    break;
                case 'mine':
                    $scope['mine'] = true;
                    break;
                case 'read':
                    $scope['read'] = true;
                    break;
                case 'unread':
                    $scope['unread'] = true;
                    break;
            }

            unset($requestFilters['status']);
        }

        foreach ($this->filters as $key => $field) {
            if (array_key_exists($key, $requestFilters)) {
                $value = $requestFilters[$key];
                if ($value == 0 || !empty($value)) {
                    // add some syntaxic sugar to scope the same filter on multiple columns
                    $fieldSplitted = explode('|', $field);
                    if (count($fieldSplitted) > 1) {
                        $requestValue = $requestFilters[$key];
                        Collection::make($fieldSplitted)->each(function ($scopeKey) use (&$scope, $requestValue) {
                            $scope[$scopeKey] = $requestValue;
                        });
                    } else {
                        $scope[$field] = $requestFilters[$key];
                    }
                }
            }
        }

        return $prepend + $scope;
    }

    /*
     * Pass extra config to the view
     */
    protected function formData($request)
    {
        return [
            'contentFieldsetLabel' => 'Enquiry Details',
            'editableTitle' => false,
            'customTitle' => 'View Enquiry',
        ];
    }
}
