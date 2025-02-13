<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {//Membuat tabel baru bernama cache jika belum ada.
            $table->string('key')->primary();//Kolom key bertipe string sebagai Primary Key (unik).
            $table->mediumText('value');//Kolom value bertipe text untuk menyimpan data cache.
            $table->integer('expiration');//Kolom expiration bertipe integer untuk menyimpan waktu kadaluwarsa                                               cache dalam format UNIX timestamp.
        });

        Schema::create('cache_locks', function (Blueprint $table) {//Membuat tabel baru bernama cache_locks jika belum ada.
            $table->string('key')->primary();//Kolom key bertipe string sebagai Primary Key (unik), digunakan untuk menyimpan                               nama kunci yang sedang dikunci (lock).
            $table->string('owner');//Kolom owner menyimpan identitas pemilik lock, biasanya berupa string unik yang                             merepresentasikan proses atau thread yang memegang lock.
            $table->integer('expiration');//Kolom expiration bertipe integer untuk menyimpan waktu kadaluwarsa                                                 lock dalam format UNIX timestamp.

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');//Mengecek apakah tabel cache ada di database.
        Schema::dropIfExists('cache_locks');//Mengecek apakah tabel cache_locks ada di database.                                                             Jika ada, maka tabel akan dihapus.                                                                                                                    Jika tidak ada, perintah akan diabaikan tanpa err
    }
};
