<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'email' => 'talehorucov123@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'about' => 'Blog saytıma xoş gəlmisiniz. İrad və Təklifləriniz üçün email poçt ünvanıma yaza bilərsiz.'
        ]);
    }
}
