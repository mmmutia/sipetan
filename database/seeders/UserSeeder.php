<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'name' => 'Admin SIPETAN',
            'level' => '1',
            'email' => 'sipetan@gmail.com',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(60),
        ]);
    }
}
