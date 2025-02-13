<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {// Mendefinisikan perintah custom bernama inspire yang bisa dijalankan melalui terminal 
    $this->comment(Inspiring::quote());//Berasal dari Laravel, fungsi ini akan mengembalikan kutipan inspiratif acak.
})->purpose('Display an inspiring quote')->hourly();//Ini adalah metode yang memberikan deskripsi singkat tentang perintah.
