<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id');
            $table->text('comments');
            $table->tinyInteger('status');
        });
    }
    public function down()
    {
        Schema::dropIfExists('blog_comments');
    }
}
