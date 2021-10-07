<?php


namespace Database\Seeders;


use A17\Twill\Services\Capsules\Manager;
use App\Twill\Capsules\Base\Models\Template;
use App\Twill\Capsules\Pages\Models\Page;
use App\Twill\Capsules\Pages\Repositories\PageRepository;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run()
    {

        $capsuleManager = new Manager();
        $pageRepository = app(PageRepository::class);

        if ($capsuleManager->capsuleExists('base')) {
            $genericTemplate = Template::firstOrCreate([
                'uid' => 'generic',
                'title' => 'Standard',
            ]);

            $contactTemplate = Template::firstOrCreate([
                'uid' => 'contact',
                'title' => 'Contact',
                'admin_only' => 1,
                'show_content_editor' => 0
            ]);

            if ($capsuleManager->capsuleExists('pages')) {

                $aboutPage = $pageRepository->forSlug('about');
                if(!$aboutPage) {
                    $samplePage = $pageRepository->create([
                        'title' => [
                            config('app.locale') => 'About',
                        ],
                        'published' => 1
                    ]);
                    $samplePage->template()->associate($genericTemplate);
                    $samplePage->save();
                }

                $contactPage = $pageRepository->forSlug('contact');
                if(!$contactPage) {
                    $contactPage = $pageRepository->create([
                        'title' => [
                            config('app.locale') => 'Contact',
                        ],
                        'published' => 1
                    ]);
                    $contactPage->template()->associate($contactTemplate);
                    $contactPage->save();
                }

                $privacyPage = $pageRepository->forSlug('privacy-policy');
                if(!$privacyPage) {
                    $privacyPage = $pageRepository->create([
                        'title' => [
                            config('app.locale') => 'Privacy Policy',
                        ],
                        'published' => 1
                    ]);
                    $privacyPage->template()->associate($genericTemplate);
                    $privacyPage->save();
                }
            }
        }
    }
}
