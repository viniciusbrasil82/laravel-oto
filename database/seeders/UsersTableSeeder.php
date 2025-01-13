<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
        \DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user'),
            'remember_token' => Str::random(10),
        ]);
    }
}
