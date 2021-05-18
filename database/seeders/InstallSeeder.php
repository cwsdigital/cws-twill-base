<?php

namespace Database\Seeders;

use App\Models\Homepage;
use App\Models\Page;
use App\Models\Template;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genericTemplate = Template::factory()->create([
            'uid' => 'generic',
            'title' => 'standard',
        ]);

        $homeTemplate = Template::factory()->create([
            'uid' => 'home',
            'title' => 'Home',
            'admin_only' => 1,
            'show_content_editor' => 0
        ]);

        $contactTemplate = Template::factory()->create([
            'uid' => 'contact',
            'title' => 'Contact',
            'admin_only' => 1,
            'show_content_editor' => 0
        ]);

        $homePage = Homepage::factory()->create([
            'title' => 'Home',
            'published' => 1
        ])->each(function ($homepage) use ($homeTemplate) {
            $homepage->template()->associate($homeTemplate);
            $homepage->metadata()->create();
        });

        $contactPage = Page::factory()->create([
            'title' => 'Contact',
            'published' => 1
        ])->each(function ($page) use ($contactTemplate) {
            $page->template()->associate($contactTemplate);
            $page->metadata()->create();
        });
    }
}
