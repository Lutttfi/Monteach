<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::all();
        return view('admin.mapel.index', compact('mapels'));
    }

    public function create()
    {
        return view('admin.mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mapel' => 'required|unique:mapels,nama_mapel', // Pastikan validasi unique di sini
        ], [
            'nama_mapel.unique' => 'Nama mapel sudah terdaftar, silakan pilih nama yang lain.', // Pesan error untuk duplikat
        ]);

        // Hapus tanda petik satu dan dua dari input
        $namaMapel = str_replace(["'", '"'], '', $request->nama_mapel);

        // Simpan ke database
        Mapel::create([
            'nama_mapel' => $namaMapel,
        ]);

        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil ditambahkan.');
    }

    public function edit(Mapel $mapel)
    {
        return view('admin.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'nama_mapel' => 'required|unique:mapels,nama_mapel,' . $mapel->id, // Validasi unique dengan pengecualian untuk mapel yang sedang diedit
        ], [
            'nama_mapel.unique' => 'Nama mapel sudah terdaftar, silakan pilih nama yang lain.', // Pesan error untuk duplikat
        ]);

        // Hapus tanda petik dari input
        $namaMapel = str_replace(["'", '"'], '', $request->nama_mapel);

        // Update data
        $mapel->update([
            'nama_mapel' => $namaMapel,
        ]);

        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil diperbarui.');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('admin.mapel.index')->with('success', 'Mapel berhasil dihapus.');
    }
}
