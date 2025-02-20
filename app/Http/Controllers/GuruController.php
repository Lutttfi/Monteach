<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all(); // Ambil semua data guru dari database
        return view('admin.teacher', compact('guru')); // Kirim ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_teacher');
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

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.edit_teacher', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);
    
        // Ambil data guru berdasarkan ID
        $guru = Guru::findOrFail($id);
    
        // Update data guru
        $guru->update([
            'nama' => $request->nama
        ]);
    
        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Ambil data guru berdasarkan ID
        $guru = Guru::findOrFail($id);
            
        // Hapus guru dari database
        $guru->delete();
            
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
