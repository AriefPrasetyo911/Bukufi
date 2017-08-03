<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('secret'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        DB::table('users')->insert([
            'name' => 'Arief Budi ',
            'email' => 'arief@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
