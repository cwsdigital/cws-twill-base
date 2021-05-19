<?php

namespace App\Providers;

use App\View\Composers\MainMenuComposer;
use App\View\Composers\SettingsComposer;
use Illuminate\View\View;

class ViewServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        View::composer('*', SettingsComposer::class);

        View::composer('main-menu', MainMenuComposer::class);

        View::composer('footer-menu', FooterMenuComposer::class);
    }
}
