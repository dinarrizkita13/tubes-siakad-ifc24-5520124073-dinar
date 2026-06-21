<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        Dosen::insert([
            ['nidn' => '0101010101', 'nama' => 'Dr. Ahmad Fauzi'],
            ['nidn' => '0202020202', 'nama' => 'Dr. Siti Rahayu'],
            ['nidn' => '0303030303', 'nama' => 'Bapak Eko Prasetyo'],
        ]);
    }
}