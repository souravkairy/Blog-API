<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateHerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heading');
            $table->string('sub_heading');
            $table->string('image')->nullable();
            $table->text('text');
            $table->string('btn_link_one');
            $table->string('btn_link_two');
        });
        DB::table('heros')->insert(
            array(
                'heading' => 'test',
                'sub_heading' => 'test',
                'text' => 'test',
                'btn_link_one' => 'test',
                'btn_link_two' => 'test',
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
        Schema::dropIfExists('heros');
    }
}
