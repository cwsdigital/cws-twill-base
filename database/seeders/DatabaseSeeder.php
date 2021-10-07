<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HomepageSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(MenuSeeder::class);
    }
}
