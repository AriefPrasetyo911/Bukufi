<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(AdminsTableSeeder::class);
    	$this->call(Comic_chaptersTableSeeder::class);
    	$this->call(ComicsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ComicGenreTableSeeder::class);
        $this->call(ComicStatusSeeder::class);
    }
}
