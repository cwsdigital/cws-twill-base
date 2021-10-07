<?php


namespace Database\Seeders;

use A17\Twill\Services\Capsules\Manager;
use App\Twill\Capsules\Homepages\Models\Homepage;
use App\Twill\Capsules\Menus\Repositories\MenuItemRepository;
use App\Twill\Capsules\Menus\Repositories\MenuRepository;
use App\Twill\Capsules\Pages\Repositories\PageRepository;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $capsuleManager = new Manager();
        $menuRepository = app(MenuRepository::class);
        $menuItemRepository = app(MenuItemRepository::class);
        $pageRepository = app(PageRepository::class);

        if($capsuleManager->capsuleExists('menus')) {

            $mainMenu = $menuRepository->create([
                'title' => [
                    config('app.locale') => 'Main Menu',
                ],
                'published' => true,
            ]);

            $footerMenu = $menuRepository->create([
                'title' => [
                    config('app.locale') => 'Footer Menu',
                ],
                'published' => true,
            ]);

            if ($capsuleManager->capsuleExists('homepages')) {
                $homePage = Homepage::first();

                if ($homePage) {

                    $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'Home',
                        ],
                        'menu_id' => $mainMenu->id,
                        'linkable_id' => $homePage->id,
                        'linkable_type' => 'homepage',
                    ]);

                    $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'Home',
                        ],
                        'menu_id' => $footerMenu->id,
                        'linkable_id' => $homePage->id,
                        'linkable_type' => 'homepage',
                    ]);

                }
            }

            if ($capsuleManager->capsuleExists('pages')) {
                $aboutPage = $pageRepository->forSlug('about');

                if ($aboutPage) {
                    $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'About',
                        ],
                        'menu_id' => $mainMenu->id,
                        'linkable_id' => $aboutPage->id,
                        'linkable_type' => 'homepage',
                    ]);
                }

                $contactPage = $pageRepository->forSlug('contact');

                if ($contactPage) {
                    $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'About',
                        ],
                        'menu_id' => $mainMenu->id,
                        'linkable_id' => $contactPage->id,
                        'linkable_type' => 'homepage',
                    ]);
                }

                $privacyPage = $pageRepository->forSlug('privacy-policy');

                if ($privacyPage) {
                    $menuItemRepository->create([
                        'title' => [
                            config('app.locale') => 'About',
                        ],
                        'menu_id' => $mainMenu->id,
                        'linkable_id' => $privacyPage->id,
                        'linkable_type' => 'homepage',
                    ]);
                }
            }
        }

    }
}
