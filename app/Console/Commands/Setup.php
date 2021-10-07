<?php


namespace App\Console\Commands;


use Illuminate\Console\Command;

class Setup extends Command
{
    protected $signature = 'cws:base:setup';

    protected $description = 'Install and setup the base project';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->call('cws:base:install:twill');

        $this->call('cws:base:install:capsules');

        if( $this->confirm('Have you added the capsule config to config/twill.php?')) {
            $this->call('cws:base:seed');
        }

        $this->info('Your app is all setup and ready to develop!');
        $this->line('Frontend: ' . config('app.url'));
        $this->line('Admin: ' . env('ADMIN_APP_URL') . '/' . env('ADMIN_APP_PATH'));
    }
}
