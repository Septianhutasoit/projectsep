<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'email' => 'admin@klinik.com',
        ], [
            'name' => 'Septian hts',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'tanggal_lahir' => '2006-09-08',
            'daerah' => 'Siborongborong', // ✅ Tambahkan ini
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => User::ROLE_ADMIN,
        ]);
    }
}
