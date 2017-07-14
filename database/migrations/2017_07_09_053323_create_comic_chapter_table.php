<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comic_chapters', function(Blueprint $table){
            $table->increments('id');
            $table->integer('comic_id');
            $table->string('comic_title');
            $table->integer('comic_chapter');
            $table->string('comic_image');
            $table->integer('comic_image_size');
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
        Schema::dropIfExists('comic_chapters');
    }
}
