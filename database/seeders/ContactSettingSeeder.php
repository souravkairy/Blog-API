<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_settings')->insert([
            'heading' => 'Feel free to message me',
            'sub_heading' => 'test',
            'address' => 'Technext Limited. 1st Floor, House 3, Road 2, Block F, Akhalia Ghat R/A, Sylhet - 3114',
            'mobile_number' => '+88 01717141905',
            'email' => 'rezahaque101.gmail.com',
        ]);
    }
}
