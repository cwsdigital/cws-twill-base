<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class ArticleCategoryController extends ModuleController
{
    protected $moduleName = 'articleCategories';

    // Adjust this to match the front end route for the category archives e.g. 'blog/categories/', 'news/sections'
    protected $permalinkBase = 'news/categories';

    // Index view options
    // editinModal allows bypassing the full edit screen
    // allow drag-and-drop reordering of items
    public $indexOptions = [
        'reorder'       => true,
        'editInModal'   => true
    ];

    // By default order by position
    public $defaultOrders = [
        'position' => 'asc',
    ];
}
