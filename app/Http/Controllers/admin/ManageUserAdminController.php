<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManageUserAdminController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();

        return view('admin.manageUser.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::with('users')->get();
        return view('admin.manageUser.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:users,username', // tambahkan validasi unique agar username tidak duplikat
            'password' => 'required|min:6',
            'jabatan' => 'required|exists:roles,id', // validasi sesuai dengan ID role yang ada di database
        ]);
    
        // Simpan data ke database
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password), // Hash password sebelum menyimpan
            'role_id' => $request->jabatan, // Simpan role sesuai dengan ID yang dipilih
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.manageUser.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::with('users')->get();
        return view('admin.manageUser.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'jabatan' => 'required|exists:roles,id',
        ]);        
        $user = User::findOrFail($id);
        $user->update([
            'username' => $request->username,
            'role_id' => $request->jabatan,
        ]);

        return redirect()->route('admin.manageUser.index')->with('success', 'Pengguna berhasil diperbarui!');
}

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.manageUser.index')->with('success', 'Pengguna berhasil dihapus!');
    }

}
