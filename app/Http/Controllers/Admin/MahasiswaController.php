<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(10);
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm'  => 'required|unique:mahasiswa,npm|size:10',
            'nama' => 'required|string|max:50',
        ]);

        Mahasiswa::create($request->only('npm', 'nama'));
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    public function edit(string $npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, string $npm)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
        ]);

        Mahasiswa::findOrFail($npm)->update($request->only('nama'));
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil diupdate!');
    }

    public function destroy(string $npm)
    {
        Mahasiswa::findOrFail($npm)->delete();
        return redirect()->route('admin.mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}