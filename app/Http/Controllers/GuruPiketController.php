<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruPiket;

class GuruPiketController extends Controller
{
    public function index()
    {
        $guruPiket = GuruPiket::all();
        return view('admin.guruPiket.index', compact('guruPiket'));
    }

    public function create()
    {
        return view('admin.guruPiket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'hari_piket' => 'required|string|max:50',
        ]);

        GuruPiket::create($request->all());
        return redirect()->route('admin.guruPiket.index')->with('success', 'Guru Piket berhasil ditambahkan!');
    }

    public function edit(GuruPiket $guruPiket)
    {
        return view('admin.guruPiket.edit', compact('guruPiket'));
    }

    public function update(Request $request, GuruPiket $guruPiket)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'hari_piket' => 'required|string|max:50',
        ]);

        $guruPiket->update($request->all());
        return redirect()->route('admin.guruPiket.index')->with('success', 'Guru Piket berhasil diperbarui!');
    }

    public function destroy(GuruPiket $guruPiket)
    {
        $guruPiket->delete();
        return redirect()->route('admin.guruPiket.index')->with('success', 'Guru Piket berhasil dihapus!');
    }
    
}
