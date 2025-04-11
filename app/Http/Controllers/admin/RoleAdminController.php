<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;


class RoleAdminController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(5);
        return view('admin.manageUser.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.manageUser.role.createRole');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required',
        ]);

        $jabatanBersih = str_replace(["'", '"'], '', $request->jabatan);

        $role = Role::create([
            'name' => $jabatanBersih,
        ]);

        return redirect()->route('admin.role.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function edit($id)
{
    $role = Role::findOrFail($id);  // Ambil role berdasarkan ID
    return view('admin.manageUser.role.edit', compact('role'));  // Kirim data role ke view
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required',
        ]);

        $role = Role::findOrFail($id);

        $jabatanBersih = str_replace(["'", '"'], '', $request->jabatan);

        $role->update([
            'name' => $jabatanBersih,
        ]);

        return redirect()->route('admin.role.index')->with('success', 'Jabatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('admin.role.index')->with('success', 'Jabatan berhasil dihapus!');
    }
}
