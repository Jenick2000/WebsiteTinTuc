<?php

use Illuminate\Database\Seeder;

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
            'name' => 'jenick',// Str::random(10),
            'email' => 'jenick2000@gmail.com',
            'level' => 1,
            'password' => bcrypt('password'),
        ]);
    }
}
