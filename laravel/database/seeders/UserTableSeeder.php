<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'guest',
            'email' => 'guest@gmail.com',
            'password' => Hash::make('guest'),
           ]);
    }
}
