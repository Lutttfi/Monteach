<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManageUserAdminController extends Controller
{
    public function index()
    {
        $users = User::with('role')
        ->where('role_id', '!=', 1) // exclude admin
        ->paginate(5);

        return view('admin.manageUser.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::with('users')->get();
        return view('admin.manageUser.create', compact('roles'));
    }

    public function store(Request $request)
{
    // Bersihkan tanda petik dari username
    $usernameBersih = str_replace(["'", '"'], '', $request->username);

    // Tambahkan usernameBersih ke dalam data yang akan divalidasi
    $request->merge(['username' => $usernameBersih]);

    // Validasi input setelah username dibersihkan
    $request->validate([
        'username' => 'required|unique:users,username',
        'password' => 'required|min:6',
        'jabatan' => 'required|exists:roles,id',
    ], [
        'username.unique' => 'Nama pengguna sudah terpakai. Pilih username lain.',
    ]);

    // Simpan ke database
    $user = User::create([
        'username' => $usernameBersih,
        'password' => Hash::make($request->password),
        'role_id' => $request->jabatan,
    ]);

    event(new Registered($user));

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

        $usernameBersih = str_replace(["'", '"'], '', $request->username);

        $user = User::findOrFail($id);
        $user->update([
            'username' => $usernameBersih,
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
