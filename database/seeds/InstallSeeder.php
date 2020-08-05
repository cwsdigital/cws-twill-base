<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Create generic template
        DB::table('templates')->insert([
            'uid'                   => 'generic',
            'title'                 => 'Standard',
            'admin_only'            => 0,
            'show_content_editor'   => 1,
        ]);

        // Create Homepage Template
        DB::table('templates')->insert([
            'uid'                   => 'home',
            'title'                 => 'Home',
            'admin_only'            => 1,
            'show_content_editor'   => 0,
        ]);

        // Create contact template
        DB::table('templates')->insert([
            'uid'                   => 'contact',
            'title'                 => 'contact',
            'admin_only'            => 1,
            'show_content_editor'   => 0,
        ]);

        // retrieve home template id
        $homeTemplateId = DB::table('templates')
                            ->where('uid', 'home')
                            ->value('id');

        // create a homepage entry
        DB::table('homepages')->insert([
            'title'         => 'Home',
            'published'     => 1,
            'template_id'   => $homeTemplateId
        ]);

        // retrieve home template id
        $contactTemplateId = DB::table('templates')
                            ->where('uid', 'contact')
                            ->value('id');

        // create a contact page
        DB::table('homepages')->insert([
            'title'         => 'Contact',
            'published'     => 1,
            'template_id'   => $contactTemplateId
        ]);
    }
}
