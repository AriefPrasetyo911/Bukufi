<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBookmark extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_bookmarks', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('comic_title');
            $table->string('comic_chapter');
            $table->string('chapter_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comic_bookmarks');
    }
}
