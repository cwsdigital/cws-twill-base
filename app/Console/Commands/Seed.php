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
        // we use passthru to ensure full env/config is reloaded with new values
        $this->call('cache:clear');
        $this->call('config:cache');
        passthru('php artisan migrate');
    }

    public function seed()
    {
        $this->call('db:seed');
    }
}
