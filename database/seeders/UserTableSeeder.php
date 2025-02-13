<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create user
        $user = User::create([ //Metode Eloquent ORM untuk menambahkan data ke tabel users.
            'name'      => 'Syahrizaldev', //menambahkan nama pengguna
            'email'     => '2223602.love@smkn-2sbg.sch.id', //Menentukan email pengguna, yang biasanya bersifat unik dalam sistem.
            'password'  => bcrypt('2223602'),//Mengenkripsi kata sandi menggunakan bcrypt() sebelum disimpan di database.
        ]);

        //get all permissions
        $permissions = Permission::all();
        //Mengambil semua data dari tabel permissions dalam bentuk koleksi Laravel (Collection).
        //$permissions Berisi daftar semua izin yang telah dibuat dalam sistem menggunakan Spatie Laravel Permission.

        //get role admin
        $role = Role::find(1);
        //Role::find(1)Mencari role berdasarkan ID 1 dalam tabel roles.Jika role ditemukan, objek Role akan dikembalikan.                                    Jika role tidak ditemukan, nilai yang dikembalikan adalah null.                                                                                      $role Variabel yang menyimpan hasil pencarian role.

        //assign permission to role
        $role->syncPermissions($permissions);
        //Menghapus semua izin yang sebelumnya dimiliki oleh role.                                                                                     Menambahkan daftar izin baru yang diberikan dalam $permissions.

        //assign role to user
        $user->assignRole($role);
        //Memberikan satu atau lebih peran (role) ke user.
    }
}