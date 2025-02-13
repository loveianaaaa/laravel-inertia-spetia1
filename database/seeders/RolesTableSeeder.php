<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        //Role::create([...])Menggunakan Eloquent ORM untuk menambahkan peran ke tabel roles.                                                               'name' => 'admin'Menentukan nama peran, dalam hal ini admin yang biasanya memiliki akses penuh dalam sistem.
        //Role::create([...])Menggunakan Eloquent ORM untuk menambahkan role baru ke tabel roles.                                                           'name' => 'user'Menentukan nama peran, dalam hal ini user yang biasanya memiliki akses terbatas dibandingkan admin.
    }
}