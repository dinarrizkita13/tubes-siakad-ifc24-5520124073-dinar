<?php
namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['matakuliah', 'dosen'])->get();
        return view('mahasiswa.jadwal.index', compact('jadwal'));
    }
}