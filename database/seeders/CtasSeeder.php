<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CtasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ctas')->insert([
            'heading' => 'A father enjoying the remarkable childhood of his son',
            'sub_heading' => 'Sub heading',
            'image' => 'image/cta.jpg',
        ]);
    }
}
