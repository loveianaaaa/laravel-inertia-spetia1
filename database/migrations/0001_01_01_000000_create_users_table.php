<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
//new class extends Migration → Membuat anonymous class yang mewarisi (extends) kelas Migration dari Laravel.                                                Migration → Kelas dasar yang digunakan dalam Laravel untuk mengelola migrasi database.
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            //adalah shorthand untuk menambahkan kolom id sebagai primary key.Secara default, Laravel akan membuat kolom
            // adalah bagian dari Laravel Migration yang digunakan untuk membuat kolom name dengan tipe data VARCHAR
            //$table->string('email'); → Membuat kolom email dengan tipe VARCHAR(255) secara default.                                                    ->unique(); → Menjadikan kolom email sebagai unique key, sehingga tidak boleh ada dua email yang sama dalam tabel.
            //$table->timestamp('email_verified_at'); → Membuat kolom dengan tipe data TIMESTAMP, yang menyimpan tanggal dan waktu.                        ->nullable(); → Memungkinkan nilai NULL, yang berarti email belum diverifikasi.
            //$table->string('password'); → Membuat kolom password dengan tipe data VARCHAR(255) (default untuk string di Laravel).
            // $table->rememberToken(); Membuat kolom remember_token dengan tipe data VARCHAR(100) secara default.
            //$table->timestamps(); secara otomatis menambahkan
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
