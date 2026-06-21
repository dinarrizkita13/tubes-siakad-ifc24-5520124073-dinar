<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name'     => 'Admin SIAKAD',
            'email'    => 'admin@siakad.com',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        // Mahasiswa
        User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@mahasiswa.com',
            'password' => Hash::make('password'),
            'role'     => 'mahasiswa',
            'npm'      => '2024001001',
        ]);
    }
}