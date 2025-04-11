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
        $guruPiketRole = DB::table('roles')->where('name', 'guruPiket')->value('id');

        DB::table('users')->insert([
            [
                'username' => 'Admin',
                'role_id' => $adminRole,
                'password' => Hash::make('admin123'),
            ],
            // [
            //     'username' => 'Dimas',
            //     'role_id' => $guruRole,
            //     'password' => Hash::make('guru123'),
            // ],
            // [
            //     'username' => 'Dandy',
            //     'role_id' => $siswaRole,
            //     'password' => Hash::make('siswa123'),
            // ],
            // [
            //     'username' => 'Rina',
            //     'role_id' => $guruPiketRole,
            //     'password' => Hash::make('piket123'),
            // ],
            // [
            //     'username' => 'Iben',
            //     'role_id' => $guruPiketRole,
            //     'password' => Hash::make('piket123'),
            // ],
        ]);
    }
}
