<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Comic_chaptersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('comic_chapters')->insert([
            'comic_id' 			=> '1',
            'comic_title'		=> 'Spider Man',
            'comic_chapter' 	=> '1',
            'comic_image'		=> 'image.jpg',
            'comic_image_size'	=> '512',
            'chapter_title'		=> 'Spider Man',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);*/

        /*DB::table('comic_chapters')->insert([
            'comic_id' 			=> '1',
            'comic_title'		=> 'Spider Man',
            'comic_chapter' 	=> '2',
            'comic_image'		=> 'image2.jpg',
            'comic_image_size'	=> '512',
            'chapter_title'		=> 'Spider Man: Begins Part 1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_chapters')->insert([
            'comic_id' 			=> '1',
            'comic_title'		=> 'Spider Man',
            'comic_chapter' 	=> '3',
            'comic_image'		=> 'image3.jpg',
            'comic_image_size'	=> '512',
            'chapter_title'		=> 'Spider Man: Begins Part 2',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);*/
    }
}
