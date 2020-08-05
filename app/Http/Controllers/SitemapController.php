<?php


namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Homepage;
use App\Models\Page;
use Illuminate\Support\Facades\App;

class SitemapController extends Controller {

    public function __invoke() {
        // create new sitemap object
        $sitemap = App::make('sitemap');

        // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
        // by default cache is disabled
        $sitemap->setCache('laravel.sitemap', 60);

        // check if there is cached sitemap and build new only if is not
        if (!$sitemap->isCached()) {

            $homepage = HomePage::first();
            if($homepage){
                $sitemap->add( route('home'), $homepage->modified, '1.0', 'daily');
            }

            $pages = Page::published()->get();
            foreach($pages as $entry) {
                $sitemap->add( route('page.show', $entry->fullslug), $entry->modified, '0.9', 'monthly');
            }

            $articles = Article::published()->visible()->get();
            foreach($articles as $entry) {
                $sitemap->add(route('article.show', $entry->slug), $entry->modified, '0.8', 'monthly');
            }

            $categories = ArticleCategory::published()->get();
            foreach($categories as $entry) {
                $sitemap->add(route('category.show', $entry->slug), $entry->modified, '0.8', 'monthly');
            }

        }

        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        if( request()->format('xml')) {
            return $sitemap->render('xml');
        } else {
            return $sitemap->render('html');
        }


    }
}
