<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Superadmin
        // Cek apakah username 'superadmin' ada? Jika tidak, buat baru.
        User::firstOrCreate(
            ['username' => 'superadmin'], 
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@triplay.com',
                'password' => Hash::make('superadmin123'),
                'role' => 'superadmin',
            ]
        );

        // 2. Akun Admin
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin Staff',
                'email' => 'admin@triplay.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );
        
        // 3. Akun User Biasa
        User::firstOrCreate(
            ['username' => 'user'],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );
    }
}