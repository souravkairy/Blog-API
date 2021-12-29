<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContactSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heading');
            $table->string('sub_heading');
            $table->string('address');
            $table->string('mobile_number');
            $table->string('email');
        });
        DB::table('contact_settings')->insert(
            array(
                'heading' => 'test',
                'sub_heading' => 'test',
                'address' => 'test',
                'mobile_number' => 'test',
                'email' => 'test',
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_settings');
    }
}
