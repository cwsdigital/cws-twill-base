<?php

use App\Vendor\SEOTools\CwsSeoMeta;

class CwsSEOMetaServiceProvider extends ServiceProvider {
    public function register(){
        $this->app->bind('seotools.metatags', function(){
            return new CwsSeoMeta($this->app['config']);
        });
    }
}
