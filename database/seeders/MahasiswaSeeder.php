<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        Mahasiswa::insert([
            ['npm' => '2024001001', 'nama' => 'Budi Santoso'],
            ['npm' => '2024001002', 'nama' => 'Dewi Lestari'],
        ]);
    }
}