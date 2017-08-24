<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Shahrizar Roslan Kumaran',
            'email' => 'shahrizar@bukufi.com',
            'password' => bcrypt('dragon&0326'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
