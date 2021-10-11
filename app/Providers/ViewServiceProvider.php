<?php

namespace App\Providers;

use App\View\Composers\FooterMenuComposer;
use App\View\Composers\MainMenuComposer;
use App\View\Composers\SettingsComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        View::composer('*', SettingsComposer::class);

        View::composer('components.navigation.main-menu', MainMenuComposer::class);

        View::composer('components.navigation.footer-menu', FooterMenuComposer::class);
    }
}
