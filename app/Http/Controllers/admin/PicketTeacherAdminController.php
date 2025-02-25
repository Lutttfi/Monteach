<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GuruPiket;
use App\Models\Guru;

class PicketTeacherAdminController extends Controller
{
    public function index()
    {
        $guruPiket = GuruPiket::all();
        return view('admin.picketTeacher.index', compact('guruPiket'));
    }

    public function create()
{
    
    $guru = Guru::all();
    return view('admin.picketTeacher.create', compact('guru'));
}

public function store(Request $request)
{
    $request->validate([
        'guru_id' => 'required|exists:gurus,id'
    ]);

    GuruPiket::create([
        'guru_id' => $request->guru_id
    ]);

    return redirect()->route('admin.picketTeacher.index')->with('success', 'Data piket guru berhasil ditambahkan.');
}

public function edit(GuruPiket $guruPiket)
{
    $guru = Guru::all(); // Ambil semua data guru
    return view('admin.picketTeacher.edit', compact('guruPiket', 'guru'));
}

    public function update(Request $request, GuruPiket $guruPiket)
{
    $request->validate([
        'guru_id' => 'required|exists:gurus,id', // Validasi guru_id dari tabel gurus
    ]);

    $guruPiket->update([
        'guru_id' => $request->guru_id
    ]);

    return redirect()->route('admin.picketTeacher.index')->with('success', 'Guru Piket berhasil diperbarui!');
}



    public function destroy(GuruPiket $guruPiket)
    {
        $guruPiket->delete();
        return redirect()->route('admin.picketTeacher.index')->with('success', 'Guru Piket berhasil dihapus!');
    }
    
}
