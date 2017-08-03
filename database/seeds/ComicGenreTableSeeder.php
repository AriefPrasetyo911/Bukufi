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

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Action',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Game',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Adventure',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Comedy',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Ninja',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'School',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Romance',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Samurai',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Crime',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'War',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Other-World',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Fantasy',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Robot',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Crime',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_genres')->insert([
            'comic_genre'   => 'Police',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
