<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Default Admin Disdagin
        DB::table('users')->updateOrInsert(
            ['email' => 'disdagin@gmail.com'],
            [
                'name' => 'Admin Disdagin',
                'email_verified_at' => now(),
                'password' => bcrypt('disdagin2025'),
                'remember_token' => Str::random(10),
                'role' => 'admin',
                'updated_at' => now(),
            ]
        );

        // Akun Kepala Dinas
        DB::table('users')->updateOrInsert(
            ['email' => 'kadisdagin@gmail.com'],
            [
                'name' => 'Kepala Dinas',
                'email_verified_at' => now(),
                'password' => bcrypt('kadis123'),
                'remember_token' => Str::random(10),
                'role' => 'kadis',
                'updated_at' => now(),
            ]
        );
    }
}
