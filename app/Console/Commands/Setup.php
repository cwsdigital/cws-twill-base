<?php


namespace App\Console\Commands;


use Illuminate\Console\Command;

class Setup extends Command
{

    public string   $dbName;
    public string   $dbUser;
    public string   $dbPassword;
    public string   $appUrl;
    public bool     $requiresMigration = true;

    public array $coreCapsules = [
        'Base' => 'cwsdigital/twill-capsule-base',
        'Menus' => 'cwsdigital/twill-capsule-menus',
        'Redirects' => 'cwsdigital/twill-capsule-redirects',
        'Homepages' => 'cwsdigital/twill-capsule-homepages',
        'Pages' => 'cwsdigital/twill-capsule-pages',
    ];

    public array $availableCapsules = [
        'Articles' => 'cwsdigital/twill-capsule-articles',
        'Categories' => 'cwsdigital/twill-capsule-categories',
        'People' => 'cwsdigital/twill-capsule-people',
        //'Events'        => 'cwsdigital/twill-capsule-events',
    ];

    public $extraCapsules = [];

    protected $signature = 'cws:setup';

    protected $description = 'Install and setup the base project';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->promptDatabaseDetails();

        $this->setDatabaseDetails();

        $this->promptAppUrl();

        $this->setAppUrl();

        $this->installTwill();

        $this->installCoreCapsules();

        $this->installExtraCapsules();

        $this->installExtraCapsules();

        $this->migrateDatabase();

        $this->finish();

    }

    public function promptDatabaseDetails()
    {
        $this->dbName = $this->ask('What is the database name?');
        $this->dbUser = $this->ask('What is the database user?');
        $this->dbPassword = $this->secret('What is the database password?');
    }

    public function setDatabaseDetails()
    {
        $this->table(
            ['Key', 'Value'],
            [
                [
                    'key' => 'Database Name',
                    'value' => $this->dbName,
                ],
                [
                    'key' => 'Database User',
                    'value' => $this->dbUser,
                ],
                [
                    'key' => 'Database Password',
                    'value' => $this->dbPassword,
                ],
            ]
        );

        if ($this->confirm('Are these details correct?', true)) {
            $this->call('env:set',[
                'key' => 'db_database',
                'value' => $this->dbName]
            );
            $this->call('env:set', [
                'key' => 'db_username',
                'value' => $this->dbUser
            ]);
            $this->call('env:set', [
                'key' => 'db_password',
                'value' => $this->dbPassword
            ]);
        } else {
            $this->promptDatabaseDetails();
        }
    }

    public function promptAppUrl()
    {
        $this->appUrl = $this->ask('What is the app url?');
    }

    public function setAppUrl()
    {
        $this->call('env:set app_url '.$this->appUrl);
        $this->call('env:set admin_app_url '.$this->appUrl);
        $this->call('env:set admin_app_path admin');
    }

    public function installTwill()
    {
        $this->call('config:clear');
        $this->call('cache:clear');

        $this->call('twill:install');
    }

    public function installCoreCapsules()
    {
        foreach ($this->coreCapsules as $name => $repository) {
            $this->call('twill:capsule:install', [
                'capsule' => $repository,
                '--copy'
            ]);
        }
    }

    public function installExtraCapsules()
    {
        foreach ($this->extraCapsules as $name => $repository) {
            $this->call('twill:capsule:install', [
                'capsule' => $repository,
                '--copy'
            ]);
        }
    }

    public function migrateDatabase()
    {
        if ($this->confirm('Do you want to apply capsule migrations now?')) {
            $this->call('migrate');
            $this->requiresMigration = false;
        }
    }

    public function finish()
    {
        if ($this->requiresMigration) {
            $this->warn('Setup complete with pending migrations.');
            $this->line('Make any required changes to your migrations and then run artisan migrate');
            $this->line('Then visit your Twill install at:');
            $this->line($this->appUrl.'/admin');
        } else {
            $this->info('Setup complete!');
            $this->line('You can now visit your Twill install at:');
            $this->line($this->appUrl.'/admin');
        }
    }

    public function promptExtraCapsules()
    {
        foreach ($this->availableCapsules as $name => $repository) {
            if ($this->confirm('Would you like to install the '.$name.' capsule?')) {
                $this->extraCapsules[$name] = $repository;
            }
        }
    }

}
