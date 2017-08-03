<?php

use Illuminate\Database\Seeder;

class ComicStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comic_status')->insert([
            'comic_status' 	=> 'Ongoing',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('comic_status')->insert([
            'comic_status' 	=> 'Completed',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

    }
}
