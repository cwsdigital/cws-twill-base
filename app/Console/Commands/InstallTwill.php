<?php
namespace App\Console\Commands;


use Illuminate\Console\Command;

class InstallTwill extends Command
{
    protected $signature = 'cws:base:install:twill';
    protected $description = 'Install and setup twill in the project';

    public string   $dbName;
    public string   $dbUser;
    public string   $dbPassword;
    public string   $appUrl;

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->promptDatabaseDetails();

        $this->promptAppUrl();

        $this->setAppUrl();

        $this->installTwill();
    }
    public function promptDatabaseDetails()
    {
        $this->dbName = $this->ask('What is the database name?');
        $this->dbUser = $this->ask('What is the database user?');
        $this->dbPassword = $this->secret('What is the database password?');

        $this->setDatabaseDetails();
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
            config(['database.connections.mysql.database' => $this->dbName]);

            $this->call('env:set', [
                'key' => 'db_username',
                'value' => $this->dbUser
            ]);
            config(['database.connections.mysql.username' =>  $this->dbUser]);

            $this->call('env:set', [
                'key' => 'db_password',
                'value' => $this->dbPassword
            ]);
            config(['database.connections.mysql.password' => $this->dbPassword]);
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
        $this->call('env:set',[
            'key' => 'app_url',
            'value' => $this->appUrl,
        ]);
        $this->call('env:set',[
            'key' => 'admin_app_url',
            'value' => $this->appUrl,
        ]);
        $this->call('env:set',[
            'key' => 'admin_app_path',
            'value' => 'admin',
        ]);

//        $this->call('cache:clear');
//        $this->call('config:clear');
    }

    public function installTwill()
    {
        // we use passthru to ensure full env/config is reloaded with new values
//        passthru('php artisan config:clear');
//        passthru('php artisan cache:clear');
        //passthru('php artisan config:cache');
        //passthru('php artisan twill:install');
        $this->call('twill:install');

    }

    public function finish() {
        $this->info('Twill successfully installed.');
    }
}
