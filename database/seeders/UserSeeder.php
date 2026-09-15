<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@mykaeltech.com'],
            ['name' => 'Mykael Ncube', 'password' => Hash::make('ChangeMe2026!'), 'is_admin' => true]
        );

        User::updateOrCreate(
            ['email' => 'demo@mykaeltech.com'],
            ['name' => 'Tendai Moyo', 'password' => Hash::make('Password2026!'), 'is_admin' => false]
        );
    }
}
