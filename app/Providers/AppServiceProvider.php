<?php

namespace App\Providers;

use A17\Twill\Models\Setting;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'articles' => 'App\Models\Article',
            'articleCategories' => 'App\Models\ArticleCategory',
            'homepages' => 'App\Models\Homepage',
            'pages' =>  'App\Models\Page',
        ]);

        Blade::directive('setting', function ($key) {
            return "<?php echo array_key_exists($key, \$settings) ? \$settings[$key] : '' ; ?>";
        });

        Blade::if('ifsetting', function ($key) {
            $setting = Setting::where('key', $key)->first();
            if ($setting) {
                return (bool) $setting->value;
            }
            return false;
        });
    }
}
