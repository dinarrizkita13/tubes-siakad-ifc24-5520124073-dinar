<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Krs;

class KrsController extends Controller
{
    public function index()
    {
        $krs = Krs::with(['mahasiswa', 'matakuliah'])->paginate(15);
        return view('admin.krs.index', compact('krs'));
    }
}