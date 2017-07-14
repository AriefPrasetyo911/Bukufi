<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function(Blueprint $table){
            $table->increments('id');
            $table->string('comic_title');
            $table->text('comic_image');
            $table->text('comic_description');
            $table->string('comic_author');
            $table->string('comic_genre');
            $table->integer('comic_release');
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
        Schema::dropIfExists('comics');
    }
}
