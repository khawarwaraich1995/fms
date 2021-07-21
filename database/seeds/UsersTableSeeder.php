<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'John Doe',
            'email' => 'khawar1@hwryk.com',
            'password' => Hash::make('password')
        ]);
    }
}
