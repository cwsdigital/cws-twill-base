<?php


namespace Database\Seeders;

use A17\Twill\Services\Capsules\Manager;
use App\Twill\Capsules\Homepages\Models\Homepage;
use App\Twill\Capsules\Menus\Models\Menu;
use App\Twill\Capsules\Pages\Models\Page;
use App\Twill\Capsules\Menus\Repositories\MenuItemRepository;
use App\Twill\Capsules\Menus\Repositories\MenuRepository;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $capsuleManager = new Manager();
        $menuRepository = app(MenuRepository::class);
        $menuItemRepository = app(MenuItemRepository::class);

        if($capsuleManager->capsuleExists('menus')) {

            $mainMenu = Menu::forSlug('main-menu')->first();
            if(!$mainMenu ) {
                $mainMenu = $menuRepository->create([
                    'title' => [
                        config('app.locale') => 'Main Menu',
                    ],
                    'published' => true,
                ]);
            }

            $footerMenu = Menu::forSlug('footer-menu')->first();
            if(!$footerMenu) {
                $footerMenu = $menuRepository->create([
                    'title' => [
                        config('app.locale') => 'Footer Menu',
                    ],
                    'published' => true,
                ]);
            }

            if ($capsuleManager->capsuleExists('homepages')) {
                $homePage = Homepage::first();

                if ($homePage) {

                    $mainHome = $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'Home',
                        ],
                        'menu_id' => $mainMenu->id,
                    ]);

                    $footerHome = $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'Home',
                        ],
                        'menu_id' => $footerMenu->id,
                    ]);

                    $mainHome->linkable()->associate($homePage);
                    $mainHome->save();

                    $footerHome->linkable()->associate($homePage);
                    $footerHome->save();

                }
            }

            if ($capsuleManager->capsuleExists('pages')) {
                $aboutPage = Page::forSlug('about')->first();

                if ($aboutPage) {
                    $item = $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'About',
                        ],
                        'menu_id' => $mainMenu->id,
                    ]);

                    $item->linkable()->associate($aboutPage);
                }

                $contactPage = Page::forSlug('contact')->first();

                if ($contactPage) {
                    $item = $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'About',
                        ],
                        'menu_id' => $mainMenu->id,
                    ]);

                    $item->linkable()->associate($contactPage);
                }

                $privacyPage = Page::forSlug('privacy-policy')->first();

                if ($privacyPage) {
                    $item = $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'About',
                        ],
                        'menu_id' => $mainMenu->id,
                    ]);

                    $item->linkable()->associate($privacyPage);
                }
            }
        }

    }
}
