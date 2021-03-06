<?php

namespace App\Http\Controllers;

use A17\Twill\Models\Model;
use App\Twill\Capsules\Homepages\Models\Homepage;
use App\Twill\Capsules\Pages\Models\Page;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;

class PageController extends Controller
{

    use setsMetadata;

    public function home()
    {
        $page = Homepage::firstOrFail();
        $this->setMetadata($page);

        $data = [];
        $data['page'] = $page;

        return view('site.pages.page', $data);
    }

    public function show($slug)
    {
        $path = $this->getSlugParts($slug);
        $page = $this->findNestedItem($path);
        $this->setMetadata($page);

        $data = [];
        $data['page'] = $page;

        return view('site.pages.page', $data);
    }

    private function getSlugParts($slug)
    {
        return explode('/', $slug);
    }

    /**
     * Recursively find the page we want from an array of path segments
     *  start from the root and work down the tree
     *  if any pages don't exist or aren't published return a 404
     *
     * @param  array  $path
     * @param  int  $index
     * @param  Page|null  $parent
     * @return Page | 404
     */
    private function findNestedItem(array $path, int $index = 0, Model $parent = null)
    {
        if ($index <= count($path) - 1) {
            $page = Page::forSlug($path[$index])
                        ->where('parent_id', ($parent ? $parent->id : null))
                        ->published()
                        ->firstOrFail();
            return $this->findNestedItem($path, ++$index, $page);
        } else {
            return $parent;
        }
    }

    public function getBreadcrumbs($page)
    {
        $ancestryTree = Page::defaultOrder()->ancestorsAndSelf($page->id);
        $breadcrumbs = [];
        $ancestryTree->each(function ($page) use (&$breadcrumbs) {
            $breadcrumbs["$page->title"] = route('page.show', $page->fullSlug);
        });
        return $breadcrumbs;
    }

}
