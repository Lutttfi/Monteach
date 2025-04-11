<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;

class TeacherAdminController extends Controller
{
    public function index()
    {
        $guru = Guru::paginate(10);
        return view('admin.teacher.index', compact('guru'));
    }

    public function create()
    {
        return view('admin.teacher.create_teacher');
    }

    public function store(Request $request)
    {
        // Bersihkan tanda petik sebelum validasi
        $namaBersih = str_replace("'", '', $request->nama);

        // Cek apakah nama sudah ada di database (versi bersih)
        $cekNama = Guru::where('nama', $namaBersih)->exists();
        if ($cekNama) {
            return redirect()->back()->withErrors(['nama' => 'Nama guru sudah digunakan.'])->withInput();
        }

        // Validasi format nama (boleh pakai petik, tapi nanti dibersihin)
        $request->validate([
            'nama' => ['required', 'regex:/^[a-zA-Z\s\-\']+$/']
        ], [
            'nama.required' => 'Nama guru wajib diisi.',
            'nama.regex' => 'Nama hanya boleh berisi huruf, spasi, tanda strip, dan tanda petik.'
        ]);

        // Simpan nama yang sudah dibersihkan
        Guru::create([
            'nama' => $namaBersih
        ]);

        return redirect()->route('admin.teacher.index')->with('success', 'Guru berhasil ditambahkan.');
    }


    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.teacher.edit_teacher', compact('guru'));
    }

    public function update(Request $request, string $id)
{
    $guru = Guru::findOrFail($id);

    // Bersihkan tanda petik sebelum validasi
    $namaBersih = str_replace("'", '', $request->nama);

    // Cek apakah nama sudah ada di database (versi bersih), kecuali untuk nama guru yang sedang diedit
    $cekNama = Guru::where('nama', $namaBersih)->where('id', '!=', $guru->id)->exists();
    if ($cekNama) {
        return redirect()->back()->withErrors(['nama' => 'Nama guru sudah digunakan.'])->withInput();
    }

    // Validasi format nama (boleh pakai petik, tapi nanti dibersihin)
    $request->validate([
        'nama' => ['required', 'regex:/^[a-zA-Z\s\-\']+$/']
    ], [
        'nama.required' => 'Nama guru wajib diisi.',
        'nama.regex' => 'Nama hanya boleh berisi huruf, spasi, tanda strip, dan tanda petik.'
    ]);

    // Update nama guru dengan nama yang sudah dibersihkan
    $guru->update([
        'nama' => $namaBersih
    ]);

    return redirect()->route('admin.teacher.index')->with('success', 'Guru berhasil diperbarui.');
}


    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.teacher.index')->with('success', 'Guru berhasil dihapus.');
    }
}
