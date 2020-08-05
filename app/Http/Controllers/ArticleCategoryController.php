<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Page;
use Artesaos\SEOTools\Facades\SEOTools;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;
use Illuminate\Database\Eloquent\Builder;

class ArticleCategoryController extends Controller
{

    public function show($slug) {
        $category = ArticleCategory::forSlug($slug)->published()->firstOrFail();

        $articles = Article::whereHas('category', function( Builder $query) use ($category) {
            $query->where('article_category_id', $category->id);
        })->published()->visible()->paginate(15);

        $allArticlesCount = Article::published()->visible()->count();

        $categories = ArticleCategory::whereHas('articles', function ($query) {
                                         $query->published()->visible();
                                     })
                                     ->withCount(['articles' => function ($query) {
                                         $query->published()->visible();
                                     }])
                                     ->published()->get() ?? [];

        SEOTools::setTitle($category->title.' Articles Archive');
        SEOTools::setDescription($category->description);

        return view('site.article-categories.show', [
            'category' => $category,
            'articles' => $articles,
            'categories' => $categories,
            'allArticlesCount' => $allArticlesCount,
        ]);
    }

}
