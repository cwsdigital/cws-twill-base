<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Str;

class Seed extends Command
{
    protected $signature = 'cws:base:seed';

    protected $description = 'Run migrations and seed base data';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->migrateDatabase();
        $this->seed();
    }

    public function migrateDatabase()
    {
        $this->call('config:clear');
        $this->call('cache:clear');

        // we use passthru to ensure full env/config is reloaded with new values
        passthru('php artisan migrate');
    }

    public function seed()
    {
        $this->call('db:seed');
    }
}
