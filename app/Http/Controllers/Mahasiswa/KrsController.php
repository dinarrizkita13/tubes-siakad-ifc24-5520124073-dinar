<?php
namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Matakuliah;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index()
    {
        $npm = auth()->user()->npm;
        $krs = Krs::with('matakuliah')
                    ->where('npm', $npm)
                    ->get();
        $totalSks = $krs->sum(fn($k) => $k->matakuliah->sks ?? 0);

        return view('mahasiswa.krs.index', compact('krs', 'totalSks'));
    }

    public function create()
    {
        $npm = auth()->user()->npm;
        // Tampilkan matakuliah yang belum diambil
        $sudahAmbil  = Krs::where('npm', $npm)->pluck('kode_matakuliah');
        $matakuliah  = Matakuliah::whereNotIn('kode_matakuliah', $sudahAmbil)->get();

        return view('mahasiswa.krs.create', compact('matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
        ]);

        $npm = auth()->user()->npm;

        // Cek duplikat
        $exists = Krs::where('npm', $npm)
                     ->where('kode_matakuliah', $request->kode_matakuliah)
                     ->exists();

        if ($exists) {
            return back()->with('error', 'Mata kuliah sudah ada di KRS!');
        }

        Krs::create(['npm' => $npm, 'kode_matakuliah' => $request->kode_matakuliah]);
        return redirect()->route('mahasiswa.krs.index')->with('success', 'Mata kuliah berhasil ditambahkan ke KRS!');
    }

    public function destroy(string $id)
    {
        $krs = Krs::findOrFail($id);

        // Pastikan hanya bisa hapus KRS milik sendiri
        if ($krs->npm !== auth()->user()->npm) {
            abort(403);
        }

        $krs->delete();
        return redirect()->route('mahasiswa.krs.index')->with('success', 'Mata kuliah berhasil di-drop dari KRS!');
    }
}