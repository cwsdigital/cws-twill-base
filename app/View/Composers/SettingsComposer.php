<?php

namespace App\View\Composers;

use A17\Twill\Models\Setting;
use Illuminate\View\View;

class SettingsComposer
{
    protected $settings = [];

    public function __construct()
    {
        foreach (Setting::all() as $setting) {
            $this->settings[$setting->key] = $setting->value;
        }
    }

    public function compose(View $view)
    {
        $view->with('settings', $this->settings);
    }
}
