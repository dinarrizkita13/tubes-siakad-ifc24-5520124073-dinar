<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['matakuliah', 'dosen'])->paginate(10);
        return view('admin.jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $dosen      = Dosen::all();
        $matakuliah = Matakuliah::all();
        return view('admin.jadwal.create', compact('dosen', 'matakuliah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
            'nidn'            => 'required|exists:dosen,nidn',
            'kelas'           => 'required|size:1|alpha',
            'hari'            => 'required|string',
            'jam'             => 'required',
        ]);

        Jadwal::create($request->only('kode_matakuliah', 'nidn', 'kelas', 'hari', 'jam'));
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $jadwal     = Jadwal::findOrFail($id);
        $dosen      = Dosen::all();
        $matakuliah = Matakuliah::all();
        return view('admin.jadwal.edit', compact('jadwal', 'dosen', 'matakuliah'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
            'nidn'            => 'required|exists:dosen,nidn',
            'kelas'           => 'required|size:1|alpha',
            'hari'            => 'required|string',
            'jam'             => 'required',
        ]);

        Jadwal::findOrFail($id)->update($request->only('kode_matakuliah', 'nidn', 'kelas', 'hari', 'jam'));
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        Jadwal::findOrFail($id)->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
    }
}