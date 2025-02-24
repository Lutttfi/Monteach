<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\GuruPiket;

class TeacherAdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();
        return view('admin.guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.create_teacher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Guru::create([
            'nama' => $request->nama
        ]);

        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit_teacher', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);
    
        $guru = Guru::findOrFail($id);
        $guru->update([
            'nama' => $request->nama
        ]);
    
        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
            
        return redirect()->route('admin.guru.index')->with('success', 'Guru berhasil dihapus.');
    }

    public function guruIndex()
    {
    $guru = Guru::all(); // Ambil semua data guru dari database
    return view('guru.guru', compact('guru')); // Tampilkan di halaman guru
    }

    public function guruPiket()
{
    $guruPiket = GuruPiket::all(); // Ambil data dari database
    return view('guru.guruPiket', compact('guruPiket')); // Kirim ke view
}
}
