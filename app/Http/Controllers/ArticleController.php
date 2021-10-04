<?php

namespace App\Http\Controllers;

use App\Models\Article;
use CwsDigital\TwillMetadata\Traits\SetsMetadata;

class ArticleController extends Controller
{
    use SetsMetadata;

    public function index() {
       $articles = Article::published()->visible()->paginate(10);

       return view('site.articles.index', ['articles' => $articles]);
    }

    public function show($slug) {

        $article = Article::forSlug($slug)->with('category')->published()->firstOrFail();
        $this->setMetadata($article);

        return view('site.articles.show', ['article' => $article, 'breadcrumbs' => $this->getBreadcrumbs($article) ]);
    }

}
