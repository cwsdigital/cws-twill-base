<?php


namespace Database\Seeders;


use A17\Twill\Services\Capsules\Manager;
use App\Twill\Capsules\Base\Models\Template;
use App\Twill\Capsules\Homepages\Models\Homepage;
use App\Twill\Capsules\Homepages\Repositories\HomepageRepository;
use Illuminate\Database\Seeder;

class HomepageSeeder extends Seeder
{
    public function run()
    {
        $capsuleManager = new Manager();
        $homepageRepository = app(HomepageRepository::class);

        if ($capsuleManager->capsuleExists('base') && $capsuleManager->capsuleExists('home')) {

            $template = Template::firstOrCreate([
                'uid' => 'home',
                'title' => 'Home',
                'admin_only' => 1,
                'show_content_editor' => 1,
            ]);

            $homePage = Homepage::first();

            if(!$homepage) {
                return $homepageRepository->create([
                    'title' => [
                        config('app.locale') => 'Home',
                    ],
                    'template_id' => $template->id,
                    'published' => true,
                ]);
            }
        }
    }
}
