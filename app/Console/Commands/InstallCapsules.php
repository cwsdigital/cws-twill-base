<?php


namespace App\Console\Commands;


use Illuminate\Support\Str;

class InstallCapsules extends \Illuminate\Console\Command
{
    protected $signature = 'cws:base:install:capsules';
    protected $description = 'Install and setup twill capsules';

    public array $coreCapsules = [
        'Base' => 'cwsdigital/twill-capsule-base',
        'Menus' => 'cwsdigital/twill-capsule-menus',
        'Redirects' => 'cwsdigital/twill-capsule-redirects',
        'Homepages' => 'cwsdigital/twill-capsule-homepages',
        'Pages' => 'cwsdigital/twill-capsule-pages',
        'Enquiries' => 'cwsdigital/twill-capsule-enquiries',
    ];

    public array $availableCapsules = [
        'Articles' => 'cwsdigital/twill-capsule-articles',
        'Categories' => 'cwsdigital/twill-capsule-categories',
        'People' => 'cwsdigital/twill-capsule-people',
        //'Events'        => 'cwsdigital/twill-capsule-events',
    ];

    public $extraCapsules = [];

    public $enabledCapsules = [];


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->installCoreCapsules();

        $this->promptExtraCapsules();

        $this->installExtraCapsules();

        $this->finish();
    }

    public function installCoreCapsules()
    {
        foreach ($this->coreCapsules as $name => $repository) {
            $this->call('twill:capsule:install', [
                'capsule' => $repository,
                '--copy' => null
            ]);
            $this->enabledCapsules[$name] = $repository;
        }
    }

    public function promptExtraCapsules()
    {
        foreach ($this->availableCapsules as $name => $repository) {
            if ($this->confirm('Would you like to install the '.$name.' capsule?')) {
                $this->extraCapsules[$name] = $repository;
                $this->enabledCapsules[$name] = $repository;
            }
        }
    }

    public function installExtraCapsules()
    {
        foreach ($this->extraCapsules as $name => $repository) {
            $this->call('twill:capsule:install', [
                'capsule' => $repository,
                '--copy' => null
            ]);
        }
    }

    public function finish() {
        $this->info('Capsules installed!');

        $this->info('Add the following capsule config into your config/twill.php');

        $this->info("
            'capsules' => [
                    'list' => [");
        foreach($this->enabledCapsules as $capsuleName => $repository) {
            $this->info("
                        [
                            'name' => '{$capsuleName}',
                            'enabled' => true
                        ],");
        }
        $this->info("],
            ],
        ");

        $this->info('Add the following into your config/twill-navigation.php');
        foreach($this->extraCapsules as $capsuleName => $repository) {
            $navTitle = Str::studly($capsuleName);
            $this->info("
                '{$capsuleName}' => [
                    'title' => '{$navTitle}',
                    'module' => true
                ],");
        }
    }
}
