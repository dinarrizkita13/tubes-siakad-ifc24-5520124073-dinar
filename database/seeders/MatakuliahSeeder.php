<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        Matakuliah::insert([
            ['kode_matakuliah' => 'IF001', 'nama_matakuliah' => 'Pemrograman Web II', 'sks' => 3],
            ['kode_matakuliah' => 'IF002', 'nama_matakuliah' => 'Basis Data', 'sks' => 3],
            ['kode_matakuliah' => 'IF003', 'nama_matakuliah' => 'Algoritma', 'sks' => 2],
        ]);
    }
}