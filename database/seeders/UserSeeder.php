<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@local.com',
                'password' => Hash::make('admin'),
                'role' => 2,
                'status' => 1,
            ],
            [
                'name' => 'User',
                'email' => 'user@local.com',
                'password' => Hash::make('user'),
                'role' => 1,
                'status' => 1,
            ]
        ]);
    }
}