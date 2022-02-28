<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seos')->insert([
            'meta_title' => 'test',
            'meta_description' => 'test',
            'canonical_link' => 'test',
            'site_name' => 'test',
        ]);
    }
}
