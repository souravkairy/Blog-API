<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_links')->insert(
            array(
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'youtube' => '#',
                'instagram' => '#',
            )
        );
    }
}
