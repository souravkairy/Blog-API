<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('canonical_link');
            $table->string('seo_image')->nullable();
            $table->string('site_name')->nullable();
        });
        DB::table('seos')->insert(
            array(
                'meta_title' => 'test',
                'meta_description' => 'test',
                'canonical_link' => 'test',
                'site_name' => 'test',
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
        Schema::dropIfExists('seos');
    }
}
