<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
        	'book_image'		=> 'game-of-throne.jpg',
            'book_file'         => 'file.epub',
        	'book_title' 		=> 'A-Game-of-Thrones',
        	'book_description' 	=> 'The worldwide bestseller book by George R.R Martin',
        	'book_author'		=> 'George-R.R-Martin',
        	'book_publisher'	=> 'publisher',
        	'book_release'		=> '2015',
        	'created_at' => new DateTime,
            'updated_at' => new DateTime,
        	]);

        DB::table('books')->insert([
        	'book_image'		=> 'canva-purple-paint-strokes-abstract-art-creativity-book-cover.jpg',
            'book_file'         => 'file.epub',
        	'book_title' 		=> 'The-World-of-Abstract-Art',
        	'book_description' 	=> 'The World of Abstract Art Book',
        	'book_author'		=> 'Emily-Robins',
        	'book_publisher'	=> 'Packt',
        	'book_release'		=> '2015',
        	'created_at' => new DateTime,
            'updated_at' => new DateTime,
        	]);

        DB::table('books')->insert([
        	'book_image'		=> 'famous-books-sledge.jpg',
            'book_file'         => 'file.epub',
        	'book_title' 		=> 'With-The-Old-Breed-at-Peleliu-and-Okinawa',
        	'book_description' 	=> 'With The Old Breed at Peleliu and Okinawa Book',
        	'book_author'		=> 'E.-B.-Sledge',
        	'book_publisher'	=> 'Publisher',
        	'book_release'		=> '2013',
        	'created_at' => new DateTime,
            'updated_at' => new DateTime,
        	]);

        DB::table('books')->insert([
        	'book_image'		=> 'book-2.png',
            'book_file'         => 'file.epub',
        	'book_title' 		=> 'Papercraft',
        	'book_description' 	=> 'Learn cool papercraft Book',
        	'book_author'		=> 'Mandy-Cooper',
        	'book_publisher'	=> 'Apress',
        	'book_release'		=> '2011',
        	'created_at' => new DateTime,
            'updated_at' => new DateTime,
        	]);

        DB::table('books')->insert([
            'book_image'        => 'lotr.jpg',
            'book_file'         => 'file.epub',
            'book_title'        => 'The-Lord-of-The-Rings',
            'book_description'  => 'The Lord of The Rings Series',
            'book_author'       => 'J.-R.-R.-Tolkien',
            'book_publisher'    => 'Apress',
            'book_release'      => '2011',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
            ]);

        DB::table('books')->insert([
            'book_image'        => 'umberto-eco-famous-books.jpg',
            'book_file'         => 'file.epub',
            'book_title'        => 'The-Name-of-The-Rose',
            'book_description'  => 'The Name of The Rose Book',
            'book_author'       => 'Umberto-Eco',
            'book_publisher'    => 'Creative-Media',
            'book_release'      => '2011',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
            ]);
    }
}
