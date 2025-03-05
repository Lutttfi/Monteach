<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Ambil role ID dari tabel roles
        $adminRole = DB::table('roles')->where('name', 'admin')->value('id');
        $guruRole = DB::table('roles')->where('name', 'guru')->value('id');
        $siswaRole = DB::table('roles')->where('name', 'siswa')->value('id');

        DB::table('users')->insert([
            [
                'username' => 'Davis',
                'role_id' => $adminRole,
                'password' => Hash::make('passwordadmin'),
            ],
            [
                'username' => 'Dimas',
                'role_id' => $guruRole,
                'password' => Hash::make('passwordguru'),
            ],
            [
                'username' => 'Dandy',
                'role_id' => $siswaRole,
                'password' => Hash::make('passwordsiswa'),
            ],
        ]);
    }
}
