<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () { //Mendefinisikan route HTTP GET untuk URL / (halaman utama).                                                                   Saat pengguna mengakses beranda (/), Laravel akan mengeksekusi fungsi yang diberikan.                                                                      Fungsi anonim (Closure) yang akan dipanggil saat route diakses.
    
    return Inertia::render('Welcome', [ //Merender komponen frontend bernama Welcome yang ada di Vue.js atau React.                                    Menggunakan Inertia.js, yang menghubungkan Laravel (backend) dengan Vue atau React (frontend) tanpa perlu API REST.
        'canLogin' => Route::has('login'),//Memeriksa apakah route dengan nama login telah didefinisikan dalam routes/web.php.
        'canRegister' => Route::has('register'),//Memeriksa apakah route dengan nama register telah didefinisikan dalam                                    routes/web.php atau routes/auth.php.
        'laravelVersion' => Application::VERSION,//Mengambil versi Laravel saat ini yang sedang berjalan.
        'phpVersion' => PHP_VERSION,//Ini adalah konstanta bawaan PHP yang menyimpan versi PHP saat ini.
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // permissions route
    Route::resource('/permissions', PermissionController::class);
    // roles route
    Route::resource('roles', RoleController::class)->except('show');
    // users route
    Route::resource('/users', UserController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
//require Digunakan untuk memasukkan file lain ke dalam script PHP.                                                                                        __DIR__ adalah konstanta PHP yang berisi path direktori file saat ini.                                                                                                                                                            /auth.php menunjukkan bahwa file auth.php berada di direktori yang sama dengan file tempat kode ini ditulis.

