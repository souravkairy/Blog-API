<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('heros')->insert([
            'heading' => 'Hello',
            'sub_heading' => 'Syed Rezwanul Haque Rubel',
            'text' => 'Managing Director, Technext Limited Alumni, Computer Science & Engineering, Shahjalal University of Science & Technology',
            'btn_link_one' => '#',
            'btn_link_two' => '#',
            'image' => 'image/rubel.jpg',
        ]);
    }
}
