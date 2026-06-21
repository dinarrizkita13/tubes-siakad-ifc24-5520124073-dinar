<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Jadwal;
use App\Models\Krs;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $stats = [
                'dosen'      => Dosen::count(),
                'mahasiswa'  => Mahasiswa::count(),
                'matakuliah' => Matakuliah::count(),
                'jadwal'     => Jadwal::count(),
            ];
            return view('admin.dashboard', compact('stats'));
        }

        // Role mahasiswa
        $npm      = auth()->user()->npm;
        $krs      = Krs::with('matakuliah')->where('npm', $npm)->get();
        $totalSks = $krs->sum(fn($k) => $k->matakuliah->sks ?? 0);

        return view('mahasiswa.dashboard', compact('krs', 'totalSks'));
    }
}