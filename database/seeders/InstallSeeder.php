<?php

namespace Database\Seeders;

use App\Models\Homepage;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Template;
use Illuminate\Database\Seeder;

class InstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*=====================================================================
         *
         * TEMPLATES
         *
         * ==================================================================*/

        $genericTemplate = Template::firstOrCreate([
            'uid' => 'generic',
            'title' => 'standard',
        ]);

        $homeTemplate = Template::firstOrCreate([
            'uid' => 'home',
            'title' => 'Home',
            'admin_only' => 1,
            'show_content_editor' => 0
        ]);

        $contactTemplate = Template::firstOrCreate([
            'uid' => 'contact',
            'title' => 'Contact',
            'admin_only' => 1,
            'show_content_editor' => 0
        ]);

        /*=====================================================================
         *
         * PAGES
         *
         * ==================================================================*/

        $homePage = Homepage::firstOrCreate([
            'title' => 'Home',
            'published' => 1
        ]);
        $homePage->template()->associate($homeTemplate);
        $homePage->save();
        $homePage->metadata()->create();


        $contactPage = Page::firstOrCreate([
            'title' => 'Contact',
            'published' => 1
        ]);
        $contactPage->template()->associate($contactTemplate);
        $contactPage->save();
        $contactPage->metadata()->create();


        $samplePage = Page::firstOrCreate([
            'title' => 'Sample',
            'published' => 1
        ]);
        $samplePage->template()->associate($genericTemplate);
        $samplePage->save();
        $samplePage->metadata()->create();

        $privacyPage = Page::firstOrCreate([
            'title' => 'Privacy Policy',
            'published' => 1
        ]);
        $privacyPage->template()->associate($genericTemplate);
        $privacyPage->save();
        $privacyPage->metadata()->create();


        /*=====================================================================
         *
         * MAIN MENU
         *
         * ==================================================================*/

        $mainMenu = Menu::firstOrCreate([
            'title' => 'Main Menu',
        ]);


        $homeItem = MenuItem::firstOrNew([
            'title' => 'Home',
        ], [
            'destination' => 'homepage',
            'position' => 1,
        ]);
        $homeItem->linkable()->associate($homePage);
        $homeItem->menu()->associate($mainMenu);
        $homeItem->save();

        $sampleItem = MenuItem::firstOrNew([
            'title' => 'Sample',
        ], [
            'destination' => 'internal',
            'position' => 2,
        ]);
        $sampleItem->linkable()->associate($samplePage);
        $sampleItem->menu()->associate($mainMenu);
        $sampleItem->save();


        $contactItem = MenuItem::firstOrNew([
            'title' => 'Contact',
        ], [
            'destination' => 'internal',
            'position' => 3,
        ]);
        $contactItem->linkable()->associate($contactPage);
        $contactItem->menu()->associate($mainMenu);
        $contactItem->save();

        /*=====================================================================
         *
         * FOOTER MENU
         *
         * ==================================================================*/

        $footerMenu = Menu::firstOrCreate([
            'title' => 'Footer Menu',
        ]);

        $privacyItem = MenuItem::firstOrNew([
            'title' => 'Privacy Policy',
            'destination' => 'internal',
            'position' => 1,
        ]);
        $privacyItem->linkable()->associate($privacyPage);
        $privacyItem->menu()->associate($footerMenu);
        $privacyItem->save();
    }
}
