<?php

use Illuminate\Database\Seeder;

class SliderCarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider_carousels')->insert([
            'slider_image' => 'slider_ironman.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('slider_carousels')->insert([
            'slider_image' => 'slider_hulk.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('slider_carousels')->insert([
            'slider_image' => 'slider_spiderman.jpg',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
