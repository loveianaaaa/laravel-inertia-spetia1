<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
//Kelas PermissionsTableSeeder yang diperluas dari Seeder adalah bagian dari Laravel Database                                                              Seeder yang digunakan untuk mengisi tabel izin (permissions) dalam database.
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        //permission users
        Permission::create(['name' => 'users index', 'guard_name' => 'web']);
        Permission::create(['name' => 'users create', 'guard_name' => 'web']);
        Permission::create(['name' => 'users edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'users delete', 'guard_name' => 'web']);
        //Permission::create([...])Ini adalah metode Eloquent yang digunakan untuk membuat data baru di tabel permissions.                                'name' => 'users index'Menentukan nama izin yang dibuat, dalam hal ini izin untuk melihat daftar pengguna (users index).                     'guard_name' => 'web'Menentukan guard yang digunakan dalam autentikasi.
        //'users create'Menentukan nama izin, dalam hal ini izin untuk membuat pengguna
        //'users edit Menentukan nama izin, dalam hal ini izin untuk mengedit pengguna.
        //'users delete'Menentukan nama izin, dalam hal ini izin untuk menghapus pengguna.
        
        //permission roles
        Permission::create(['name' => 'roles index', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles create', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles delete', 'guard_name' => 'web']);

        //permission permissions
        Permission::create(['name' => 'permissions index', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions create', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions delete', 'guard_name' => 'web']);

       
    }
}