<?php

use Illuminate\Database\Seeder;

class ComicGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comic_genres')->insert([
            'comic_genre' 	=> 'Superhero',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
